<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 16.01.2019
 * Time: 19:58
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\Manufacturer;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ManufacturerController extends Controller
{
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

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => Manufacturer::find(),//->with('categories'),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Manufacturer();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save())
                return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

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

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Manufacturer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}