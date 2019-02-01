<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ResetPassword */
$this->title = 'Новый пароль';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        <?=$this->title?>
    </h2>
</section>
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Главная
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="<?=Url::toRoute('/site/login')?>" class="stext-109 cl8 hov-cl1 trans-04">
            Вход в профиль
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
				<?=$this->title?>
			</span>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-offset-3 bor10 m-t-50 m-b-70 p-t-20 p-b-20 p-l-20 p-r-20">
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <div class="form-group">
                        <?= Html::submitButton( 'Сохранить', ['class' => 'flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>