<?php

namespace app\modules\admin\controllers;

use app\models\User;
use Yii;
use app\modules\admin\models\Order;
use app\modules\admin\models\OrderItems;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
            'pagination'=>['pageSize'=>10],
            'sort'=>['defaultOrder'=>[
                'status'=> SORT_ASC]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
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
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        foreach ($this->findModelItems($id) as $model){
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }

    protected function findModelItems($id)
    {
        if (($model = OrderItems::find()->where(['order_id'=>$id])->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }

    public function actionDeleteProduct($id){
        $models= OrderItems::find()->where(['id'=>$id])->one();
        $models->delete();
        return $this->redirect(Yii::$app->request->referrer);

    }

    public function actionModalOrder($id)
    {
        $this->layout = false;
        $model = $this->findModel($id);
        return $this->render('modal-order', ['model' => $model,]);
    }

    public function actionModalOk($id){
        $this->layout = false;
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /*------------------------------------------------------------------------*/
            if($model->status == 1) {
                $order = OrderItems::find()->where(['order_id' => $model->id])->all();
                $pdf_content = $this->render('order-pdf', compact('model', 'order'));
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->WriteHTML($pdf_content);
                $treaty = "Договор №" . $id . ".pdf";
                $mpdf->Output("documentation/" . $treaty, "F");
                /*------------------------------------------------------------------------*/
                Yii::$app->mailer->compose('invoice', ['imageResponse' => 'images/onoff.jpg',])
                    ->attach('documentation/' . $treaty)
                    ->setFrom([Yii::$app->params['supportEmail'] => 'ONOFF'])
                    ->setTo($model->email)
                    ->setSubject('Информация о заказе №'.$model->id.' | ONOFF')
                    ->send();
            }
            /*------------------------------------------------------------------------*/
            return $this->redirect(['index']);
        }
        return $this->render('modal-ok', ['model' => $model,]);
    }

    public function actionModalOrderPdf($id)
    {

    }
}
