<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Редактировать новость';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg p-b-30">
    <a href="<?=Url::toRoute('/admin/order/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Заказы
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <a href="<?=Url::toRoute('/admin/post/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Новости
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
        <?=$this->title?>
    </span>
</div>
<div class="post-update col-sm-12 bor10">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
