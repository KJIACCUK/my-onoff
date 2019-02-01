<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */
$this->title = 'Изменение пароля';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Смена пароля в личном кабинете.'
]);
?>
<header class="site-header-vacancies page-header bg-img" style="background-image: url(<?=Yii::getAlias('@web/img/banner/banner-1.jpg')?>">
    <div class="container">
        <h2 class="text-center">Изменение пароля</h2>

    </div>
</header>
<div class="container">
    <div class="row">
        <p class="lead text-center">Для смены пароля заполните следующие поля:</p>
        <div class="site-signup">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 ">
                    <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                    <?= $form->field($model, 'oldPassword')->passwordInput(['placeholder'=>'Введите пароль'])?>
                    <?= $form->field($model, 'newPassword')->passwordInput(['placeholder'=>'Введите новый пароль'])?>
                    <?= $form->field($model, 'retypePassword')->passwordInput(['placeholder'=>'Повторите новый пароль'])?>
                    <div class="form-group text-center">
                        <?= Html::submitButton('Изменить', ['class' => 'btn btn-default btn-red ', 'name' => 'change-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>