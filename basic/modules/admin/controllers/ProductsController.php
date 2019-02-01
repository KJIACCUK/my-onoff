<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use app\models\ProductsSearch;
use app\models\ImageUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post())) {

            $this->saveImage($model);

            $model->user_id = Yii::$app->user->id;
            if ($model->validate() && $model->save())
            return $this->redirect(['index']);

        }else
        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
//            $search = Products::findOne($id);
//            if(!empty($search->img) ){
//                unlink(Yii::getAlias('@web') . 'images/products/' . $search->img);
//            }
//
//            $this->saveImage($model);

            if($model->validate() && $model->save())
            return $this->redirect('index');
        }

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function saveImage($model){
        $file = UploadedFile::getInstance($model, 'img');
        $name_img = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
        $file->saveAs(Yii::getAlias('@web') . 'images/products/' . $name_img);

        $model->img = $name_img;
    }

    public function actionSetImage($id){

        $model = new ImageUpload;
        if(Yii::$app->request->isPost){
            $product = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'img');

            if($product->saveImage($model->uploadFile($file, $product->img))){
                return $this->redirect('index');
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $search = $this->findModel($id);
        if(!empty($search->img)){
            unlink(Yii::getAlias('@web') . 'images/products/' . $search->img);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
