<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Брэнд';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-sm-12">
    <div class="col-sm-3 p-b-10">
        <?= Html::a('Создать брэнд', ['create'], ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
    </div>
</div>
<div class="m-t-30 m-b-70">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute'=>'',
                'headerOptions' => ['width' => '30'],
                'value' => function($data) {
                    return Html::a('<i class="fa fa-cogs fa-lg" aria-hidden="true"></i>',['update','id'=>$data->id],
                        [
                            'class' => 'modal-response-resumes',
                            'title' => 'Редактировать брэнд',
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
                            'title' => 'Удалить брэнд',
                        ]
                    );
                },
                'format'=>'html',
            ],
        ],
    ]); ?>
</div>
