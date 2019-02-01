<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подразделы | Категории';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-12">
    <div class="col-sm-3 p-b-10">
        <?= Html::a('Создать', ['create'], ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
    </div>
</div>
<div class="m-t-30 m-b-70">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            [
//                'format' => 'html',
//                'label'=> 'Картинка',
//                'headerOptions' => ['width' => '100'],
//                'value'=>function($data){
//                    return Html::img($data->getImage(),['width'=>80]);
//                }
//            ],
            [
                'attribute'=>'sections_id',
                'value'=>function($data){
                    return isset($data->categories->name) ? $data->categories->name : 'раздела нет';
                }
            ],
            'title',
//            [
//                'attribute'=>'',
//                'headerOptions' => ['width' => '30'],
//                'value' => function($data) {
//                    return Html::a('<i class="fa fa-picture-o fa-lg" aria-hidden="true"></i>',['set-image','id'=>$data->id],
//                        [
//                            'class' => 'modal-response-resumes',
//                            'title' => 'Изменить картинку',
//                        ]
//                    );
//                },
//                'format'=>'html',
//            ],

            [
                'attribute'=>'',
                'headerOptions' => ['width' => '30'],
                'value' => function($data) {
                    return Html::a('<i class="fa fa-cogs fa-lg" aria-hidden="true"></i>',['update','id'=>$data->id],
                        [
                            'class' => 'modal-response-resumes',
                            'title' => 'Редактировать',
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
                            'title' => 'Удалить',
                        ]
                    );
                },
                'format'=>'html',
            ],

        ],
    ]); ?>
</div>