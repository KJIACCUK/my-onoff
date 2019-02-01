<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 01.08.2018
 * Time: 9:36
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Корзина
    </h2>
</section>

<!-- Shoping Cart -->
<div class="bg0 p-t-90 p-b-110">
    <div class="container">
        <div class="row">
            <?php if (!empty($session['cart'])):?>
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1 text-center">Товар</th>
                                <th class="column-2 text-center"></th>
                                <th class="column-3 text-center">Цена EUR</th>
                                <th class="column-4 text-center">Цена BYN</th>
                                <th class="column-5 text-center">Цена RUB</th>
                                <th class="column-6 text-center">Количество</th>
<!--                                <th class="column-5">Цена общ.</th>-->
                            </tr>

                            <?php foreach ($session['cart'] as $id =>$item): ?>
                            <tr class="table_row">
                                <td class="column-1">
                                    <a href="<?=Url::toRoute(['/cart/clear-cart-single', 'id'=>$item['id']])?>">
                                    <div class="how-itemcart1 ">
                                        <img src="/images/products/<?=$item['img']?>" alt="IMG">
                                    </div>
                                    </a>
                                </td>
                                <td class="column-2"><?=$item['name']?></td>
                                <td class="column-3 text-center"><?=$item['eur']?></td>
                                <td class="column-4 text-center"><?= round($item['eur']*$courses->EUR_out,2)?></td>
                                <td class="column-5 text-center"><?= round($item['eur']*$courses->EUR_out*$courses->RUB_out*10,2)?></td>
                                <td class="column-6 text-center">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m cart-minus-add" data-id="<?=$item['id']?>">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?=$item['col']?>" readonly min="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m cart-plus-add" data-id="<?=$item['id']?>">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
<!--                                <td class="column-5">--><?//=$item['byn']?><!--</td>-->
<!--                                <td class="column-5">--><?//=$item['rur']?><!--</td>-->
<!--                                <td class="column-5">--><?//=$item['usd']?><!--</td>-->
                            </tr>
                            <?php endforeach;?>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
<!--                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">-->

                            <a href="<?=Url::toRoute('/site/catalog')?>" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-7">
                                Каталог товаров
                            </a>
                        </div>

                        <a href="<?=Url::toRoute('cart/cart-clear-all')?>" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Очистить корзину
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Общия информация заказа
                    </h4>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-210">
								<span class="mtext-101 cl2">
									Всего товаров:
								</span>
                        </div>
                        <div class="size-208 p-t-1">
								<span class="mtext-110 cl2 all-products"><?=$session['cart.col']?></span>
                        </div>

                        <div class="size-total">
								<span class="mtext-101 cl2">
									Итого:
								</span>
                        </div>
                        <div class="p-t-1">
                            <span class="mtext-110 cl2 all-sum-byn"><?=$session['cart.sumeur']?>EUR | <?= round($session['cart.sumeur']*$courses->EUR_out,2)?>BYN | <?= round($session['cart.sumeur']*$courses->EUR_out*$courses->RUB_out*10,2)?>RUB</span>
                        </div>
                        <div class="size-208 p-t-1">
                            <span class="mtext-110 cl2 all-sum-usd"></span>
                        </div>
                    </div>
                    <hr>
                    <?php $form = ActiveForm::begin() ?>
                    <div class="p-b-15">
                        <?= $form->field($order, 'name')->textInput(['placeholder'=>'Введите ФИО'])?>
                        <?= $form->field($order, 'email')->textInput(['placeholder'=>'Введите E-mail'])?>
                        <?= $form->field($order, 'phone')->textInput(['placeholder'=>'Введите телефон', 'class'=>'form-control'])?>
                    </div>
                    <?php if(!Yii::$app->user->isGuest):?>
                    Для юридических лиц:<hr>
                    <?= $form->field($order, 'unn_unp')->textInput(['placeholder'=>'Введите УНН | УНП'])?>
                    <?= $form->field($order, 'type_ownership')->textInput(['placeholder'=>'Введите форму собственности'])?>
                    <?= $form->field($order, 'name_ur')->textInput(['placeholder'=>'Введите название юр. лица'])?>
                    <?php endif;?>

                    <?= Html::submitButton('Подтвердить заказ', ['class'=>'flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer']) ?>

                   <?php ActiveForm::end();?>
                </div>
            </div>
            <?php else:?>
                <?php if(Yii::$app->session->hasFlash('success')): ?>
                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto text-center">
                        <div class="bor10 p-t-40 p-r-15 p-b-40 p-l-15">
                        <div class="alert alert-success alert-dismissible" role="alert">
<!--                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                        <p>В ближайшое время наши менеджеры обработают его.</p>
                        <a href="<?=Url::toRoute('/site/catalog')?>" class="cl8"><b>Вернуться в каталог</b></a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(Yii::$app->session->hasFlash('error')): ?>
                    <div class="col-md-12 text-center">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo Yii::$app->session->getFlash('error'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(!Yii::$app->session->hasFlash('success') && (!Yii::$app->session->hasFlash('error'))):?>
                            <div class="col-md-12 text-center">
                                <div class="m-b-30">
                                    <img src="<?=Yii::getAlias('/images/cart/empty.png')?>" alt="Корзина" />
                                </div>
                                <h5 class="ltext-202"> Перейдите в <a href="<?=Url::toRoute('site/catalog')?>">каталог</a>  и добавьте товары.</h5>
                            </div>
                <?php endif;?>

            <?php endif;?>
        </div>
    </div>
</div>