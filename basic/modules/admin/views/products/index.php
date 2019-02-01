<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
    <br class="row">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="col-sm-12">
        <div class="col-sm-3 p-b-10">
            <?= Html::a('Добавить товар', ['create'], ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
        </div>
</div>

<div class="m-t-30 m-b-70">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'category_id',
                [
                    'attribute'=>'category_id',
                    'value'=>function($data){
                        return isset($data->subsection->title) ? ($data->subsection->categories->name .' | '. $data->subsection->title): 'категории нет';
                    }
                ],
                'name',
                [
                    'attribute'=>'eur',
                    'headerOptions' => ['width' => '50'],
                ],
               // 'img',
                [
                    'format' => 'html',
                    'attribute'=> 'img',
                    'headerOptions' => ['width' => '110'],
                    'value'=>function($data){
                        return Html::img($data->getImage(),['width'=>100]);
                    }
                ],
                //'description:ntext',
                //'user_id',

                [
                    'attribute'=>'',
                    'headerOptions' => ['width' => '30'],
                    'value' => function($data) {
                        return Html::a('<i class="fa fa-picture-o fa-lg" aria-hidden="true"></i>',['set-image','id'=>$data->id],
                            [
                                'class' => 'modal-response-resumes',
                                'title' => 'Изменить картинку',
                            ]
                        );
                    },
                    'format'=>'html',
                ],

                [
                    'attribute'=>'',
                    'headerOptions' => ['width' => '30'],
                    'value' => function($data) {
                        return Html::a('<i class="fa fa-cogs fa-lg" aria-hidden="true"></i>',['update','id'=>$data->id],
                            [
                                'class' => 'modal-response-resumes',
                                'title' => 'Редактировать товар',
                            ]
                        );
                    },
                    'format'=>'html',
                ],

                [
                    'attribute'=>'',
                    'headerOptions' => ['width' => '30'],
                    'value' => function($data) {
                        return Html::a('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>',['delete','id'=>$data->id],
                            [
                                'class' => 'modal-response-resumes',
                                'title' => 'Удалить товар',
                            ]
                        );
                    },
                    'format'=>'html',
                ],
            ],
        ]); ?>
    </div>
    </div>