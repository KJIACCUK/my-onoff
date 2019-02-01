<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        <?=$this->title?>
    </h2>
</section>
<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <?php $form = ActiveForm::begin(['id' => 'messages', 'fieldConfig' => ['options' => ['tag' => false]]]); ?>
            <h4 class="mtext-105 cl2 txt-center p-b-30">
                Отправить сообщение
            </h4>
            <!-- email -->
            <div class="m-b-20 how-pos4-parent">
                <?= $form->field($model, 'emailNew')->textInput(['autofocus' => true, 'class' =>'form-control stext-111 cl2 plh3 size-116 p-l-62 p-r-30', 'placeholder' => 'Ваш Email | почта', 'required' => true])->label(false)?>
                <img class="how-pos4 pointer-none" src="/images/icons/icon-email.png" alt="ICON">
            </div>
            <!-- message -->
            <div class="m-b-30">
                <?= $form->field($model, 'messageNew')->textarea(['class' =>'form-control stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25', 'placeholder' => 'Как мы можем Вам помочь?', 'required' => true])->label(false)?>
            </div>
            <!-- submit button -->
                <?= Html::submitButton('Отправить', ['class' => 'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer']) ?>
            <!-- contact form end -->
            <?php ActiveForm::end(); ?>
            </div>
            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>
                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Адрес
							</span>
                        <p class="stext-115 cl6 size-213 p-t-18">
                            220033, Беларусь, г. Минск, ул. Фабричная, д. 22, офис 316,
                            УНП192569921
                            р/с BY74BLBB30120192569921001001
                            в ОАО "Белинвестбанк" SWIFT BLBBBY2X,
                            адрес банка: г. Минск, Партизанский пр-кт 6а.
                        </p>
                    </div>
                </div>
                <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>
                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Телефон | Факс
							</span>
                        <p class="stext-115 cl1 size-213 p-t-18">vel:+375(29)15-43-239</p>
                        <p class="stext-115 cl1 size-213 p-t-18">life: +375(33)30-77-299</p>
                    </div>
                </div>
                <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>
                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Почта
							</span>
                        <p class="stext-115 cl1 size-213 p-t-18">
                            E-mail: info@onoff.by
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Map -->
<div class="map">
    <div class="size-304" id="google_map" data-map-x="53.8856254" data-map-y="27.5904037" data-pin="/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="14"></div>
</div>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>
<!--===============================================================================================-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQI40zn5fKKQpLbuONueZBKHFhsdnlZG4"></script>