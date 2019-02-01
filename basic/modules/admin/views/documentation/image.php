<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Изменить картинку';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg p-b-30">
    <a href="<?=Url::toRoute('/admin/order/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Заказы
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <a href="<?=Url::toRoute('/admin/documentation/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Документация
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
				<?=$this->title?>
			</span>
</div>

<div class="post-form bor10">
    <div class="categories-form p-l-20 p-r-20 p-t-20 p-b-20">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
</div>
