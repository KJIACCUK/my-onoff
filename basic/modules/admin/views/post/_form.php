<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form p-l-20 p-r-20 p-t-20 p-b-20">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(Yii::$app->request->url == '/admin/post/create'):?>
    <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>
    <?php endif;?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <div class="form-group col-md-12 text-center">
        <?= Html::submitButton('Сохранить', ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
