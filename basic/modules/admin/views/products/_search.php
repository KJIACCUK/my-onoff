<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="contact-img-area-admin">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Запчасти</h2>
                    <p><a href="<?=Yii::$app->request->referrer?>">Вернутся назад</a> | Запчасти</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'id') ?>

        <?= $form->field($model, 'category_id') ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'price') ?>

        <?= $form->field($model, 'img') ?>

        <?php // echo $form->field($model, 'description') ?>

        <?php // echo $form->field($model, 'user_id') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
