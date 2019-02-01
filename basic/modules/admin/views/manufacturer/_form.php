<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */
/* @var $form yii\widgets\ActiveForm */
/*<?= $form->field($model, 'parent_id')->textInput() ?>*/
?>

<div class="categories-form p-l-20 p-r-20 p-t-20 p-b-20">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>'Введите название категории']) ?>
        <div class="form-group col-md-12 text-center">
        <?= Html::submitButton('Сохранить', ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
