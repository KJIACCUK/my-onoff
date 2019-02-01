<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="p-t-20 p-r-40 p-b-20 p-l-40">
        <?= $form->field($model, 'status')->dropDownList([ '0' => 'Активен', '1' => 'Принят', '2' => 'Отменён' ]) ?>
    </div>
    <!--    <div class="form-group">-->
    <div class="form-group col-md-12 text-center">
        <?= Html::submitButton('Ответить', ['class' => ' stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
    </div>
    <?php ActiveForm::end(); ?>