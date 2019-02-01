<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ImageUpload;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $this->saveImage($model);

            if($model->save())
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function saveImage($model){
        $file = UploadedFile::getInstance($model, 'img');
        $name_img = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
        $file->saveAs(Yii::getAlias('@web') . 'images/posts/' . $name_img);

        $model->img = $name_img;
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $search = $this->findModel($id);
        if(!empty($search->img)){
            unlink(Yii::getAlias('@web') . 'images/posts/' . $search->img);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSetImage($id){

        $model = new ImageUpload;
        if(Yii::$app->request->isPost){
            $post = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'img');

            if($post->saveImage($model->uploadFile($file, $post->img))){
                return $this->redirect('index');
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
