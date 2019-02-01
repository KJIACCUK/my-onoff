<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 26.07.2018
 * Time: 21:50
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\Messages;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;


class MessagesController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Messages::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}