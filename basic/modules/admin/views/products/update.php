<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Редактировать товар';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg p-b-30">
    <a href="<?=Url::toRoute('/admin/order/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Заказы
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <a href="<?=Url::toRoute('/admin/products/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Товары
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
				<?=$this->title?>
			</span>
</div>

<section class="admin-main-container">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><h1><?= $model->name ?></h1></div>

        <div class="col-md-8 col-md-offset-2 bor10">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>

    </div>
</div>
</section>
