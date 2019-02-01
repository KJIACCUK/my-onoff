<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Разделы | Для Партнеров';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-12">
    <div class="col-sm-3 p-b-10">
        <?= Html::a('Создать раздел', ['create'], ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
    </div>
</div>
    <div class="m-t-30 m-b-70">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute'=>'parent_id',
                    'headerOptions' => ['width' => '300'],
                    'value'=>function($data){
                        return $data->parent_id == '0' ? '<span class="text-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Не определён</span>' :
                                ($data->parent_id == '1' ? '<span class="text-success">Помощь по продуктам</span>' :
                                ( $data->parent_id == '2' ? '<span class="text-success">Документация</span>' :
                                ($data->parent_id == '3' ? '<span class="text-success">Решения | Cases</span>' : '<span class="text-success">Software & Firmware</span>')));
                    },
                    'format'=>'html',
                ],
//                'name',
                [
                    'attribute'=>'name',
                    'value'=>function($data){
                        return isset($data->categories->name) ? $data->categories->name : 'не зарегистрирован';
                    },
                ],
                'subsection',
                [
                    'attribute'=>'',
                    'headerOptions' => ['width' => '30'],
                    'value' => function($data) {
                        return Html::a('<i class="fa fa-cogs fa-lg" aria-hidden="true"></i>',['update','id'=>$data->id],
                            [
                                'class' => 'modal-response-resumes',
                                'title' => 'Редактировать раздел',
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
                                'title' => 'Удалить раздел',
                            ]
                        );
                    },
                    'format'=>'html',
                ],
            ],
        ]); ?>
    </div>
