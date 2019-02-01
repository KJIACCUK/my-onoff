<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
/*->textInput()*/
?>

<div class="products-form p-t-20 p-l-20 p-b-20 p-r-20">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

<!--    --><?//= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Categories::find()->all(),
//        'id', 'name'),['prompt' => '']) ?>


    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Subsection::find()
        ->select(['x.id, concat(xx.name," | ",x.title) as section'])
        ->from('subsection x')->leftJoin('categories xx', 'xx.id = x.sections_id')->asArray()->all(),
        'id', 'section'), ['prompt' => '']) ?>

    <?= $form->field($model, 'manufacturer_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Manufacturer::find()->asArray()->all(),
        'id', 'name'), ['prompt' => '']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>'Введите название товара']) ?>

    <?= $form->field($model, 'eur')->textInput(['placeholder'=>'EUR']) ?>

    <?php if(Yii::$app->request->url == '/admin/products/create'):?>
    <?= $form->field($model, 'img')->fileInput() ?>
    <?php endif;?>

<!--    --><?//= $form->field($model, 'description')->textarea(['rows' => 6, 'placeholder'=>'Введите описание товара']) ?>
    <?=
    $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);
    ?>

<!--    <div class="form-group">-->
        <div class="form-group col-md-12 text-center">
        <?= Html::submitButton('Сохранить', ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
