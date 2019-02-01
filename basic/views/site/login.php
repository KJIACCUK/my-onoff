<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = 'Вход в профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
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
        <span class="stext-109 cl4">
				<?=$this->title?>
			</span>
    </div>
</div>

<div class="bg0 p-t-75 p-b-85">
<div class="container">
<div class="site-login">
    <div class="row">
        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
            <div class="bor10 p-lr-40 p-t-40 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username')->textInput(['placeholder'=>'Введите логин']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Введите пароль']) ?>
                <div class="form-group p-t-25">
                    <?= Html::submitButton('Войти', ['class' => 'flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer', 'name' => 'login-button']) ?>
                </div>
            <div class="p-t-10 text-center" style="color:#999;margin:1em 0">
                <hr>
                <?= Html::a('Регистрация профиля', ['/site/signup'], ['class'=>'cl8'])?> | <?= Html::a('Сбросить пароль', ['/user/request-password-reset-token'], ['class'=>'cl8']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>