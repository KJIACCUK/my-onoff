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

    <?= $form->field($model, 'sections_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Sections::find()
        ->select(['x.id, concat(xx.name," | ",x.subsection) as section'])
        ->from('sections x')->leftJoin('categories xx', 'xx.id = x.name')
        ->where(['x.parent_id'=>'4'])->asArray()->all(),
        'id', 'section'), ['prompt' => '']) ?>

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
