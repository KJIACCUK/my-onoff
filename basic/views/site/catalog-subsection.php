<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 13.07.2018
 * Time: 21:44
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
$this->title = $section->categories->name.' | '.$section->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92 img-section" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        <?php if(isset($section)):?><?=$section->categories->name?> | <?=$section->title?><?php endif;?>
    </h2>
</section>
<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <?php if($section->sections_id == 1):?>
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10 menu-mob">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 menu-line" data-filter="*">
                    Все производители
                </button>
                <?php foreach ($manufacturer as $manufactur):?>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 a<?=$manufactur->id?> menu-line" data-filter=".<?=$manufactur->id?>">
                        <?=$manufactur->name?>
                    </button>
                <?php endforeach;?>
            </div>
        </div>
        <?php else:?>
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                    Главная
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
                <a href="<?=Url::toRoute('/site/catalog')?>" class="stext-109 cl8 hov-cl1 trans-04">
                    Каталог
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
                <span class="stext-109 cl4">
                    <?=$this->title?>
                </span>
            </div>
        <?php endif;?>

        <div class="row isotope-grid">
            <?php foreach($products as $product):?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?=$product->manufacturer_id?>">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0 " style="height: 340px">
                            <img src="/images/products/<?=$product->img?>" alt="IMG-PRODUCT" style="width: 95%">
                            <button class="bg2 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 btn-modal-detail" data-id="<?=$product->id?>">
                                Подробнее
                            </button>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 js-show-modal1 btn-modal-detail" data-id="<?=$product->id?>">
                                    <?=$product->name?>
                                </a>
                                <span class="stext-105 cl3">
									<?=$product->eur?>EUR | <?=round($product->eur * $courses->EUR_out, 2)?>BYN | <?=round($product->eur * $courses->EUR_out*$courses->RUB_out*10,2)?>RUB
								</span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="<?=Url::toRoute(['/cart/add-to-cart', 'id'=>$product->id])?>" data-id="<?=$product->id?>" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 add-to-cart cl8 bubbly-button">
                                    <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                                    <!--                                <img class="icon-heart1 dis-block trans-04" src="/images/icons/icon-heart-01.png" alt="ICON">-->
                                    <!--                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/images/icons/icon-heart-02.png" alt="ICON">-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>
<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>
    <div class="container modal-detail">
    </div>
</div>