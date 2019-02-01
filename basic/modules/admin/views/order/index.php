<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider
 <h1><?= Html::encode($this->title) ?></h1>
<p>
<?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
</p>
 */

$this->title = 'Обработка заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="m-t-30 m-b-70">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'created_at',
//                'updated_at',
                'name',
                'phone',
                'email',
                [
                    'attribute'=>'user_id',
                    'value'=>function($data){
                        return isset($data->user->username) ? $data->user->username : 'не зарегистрирован';
                    },
                ],
                'qty',
                'sum_eur',
                'sum_byn',
                'sum_rub',
                [
                    'attribute'=>'status',
                    'value'=>function($data){
                        return $data->status == '0' ? '<span class="text-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Новый</span>' : ($data->status == '1' ? '<span class="text-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Принят</span>' : '<span class="text-danger"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Отменён</span>');
                    },
                    'format'=>'html',
                ],
//                [
//                    'attribute'=>'',
//                    'headerOptions' => ['width' => '30'],
//                    'value' => function($data) {
//                        return Html::a('<i class="fa fa-hand-o-left fa-lg" aria-hidden="true"></i>',['view','id'=>$data->id],
//                            [
//                                'class' => 'modal-response-resumes',
//                                'title' => 'Просмотреть заказ',
//                            ]
//                        );
//                    },
//                    'format'=>'html',
//                ],
                [
                    'attribute'=>'',
                    'headerOptions' => ['width' => '30'],
                    'value' => function($data) {
                        return Html::a('<i class="fa fa-hand-o-left fa-lg" aria-hidden="true"></i>',['modal-order','id'=>$data->id],
                            [
                                'class' => 'modal-order',
                                'title' => 'Просмотреть заказ',
                            ]
                        );
                    },
                    'format'=>'html',
                ],

                [
                    'attribute'=>'',
                    'headerOptions' => ['width' => '30'],
                    'value' => function($data) {
                        return Html::a('<i class="fa fa-thumb-tack fa-lg" aria-hidden="true"></i>',['modal-ok','id'=>$data->id],
                            [
                                'class' => 'modal-ok',
                                'title' => 'Обработать заказ',
                            ]
                        );
                    },
                    'format'=>'html',
                ],

//                [
//                    'attribute'=>'',
//                    'headerOptions' => ['width' => '30'],
//                    'value' => function($data) {
//                        return Html::a('<i class="fa fa-cogs fa-lg" aria-hidden="true"></i>',['update','id'=>$data->id],
//                            [
//                                'class' => 'modal-response-resumes',
//                                'title' => 'Редактировать новость',
//                            ]
//                        );
//                    },
//                    'format'=>'html',
//                ],

                [
                    'attribute'=>'',
                    'headerOptions' => ['width' => '30'],
                    'value' => function($data) {
                        return Html::a('<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>',['delete','id'=>$data->id],
                            [
                                'class' => 'modal-response-resumes',
                                'title' => 'Удалить новость',
                            ]
                        );
                    },
                    'format'=>'html',
                ],
            ],
        ]); ?>
</div>