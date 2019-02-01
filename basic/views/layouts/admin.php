<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<body class="animsition">

<!-- Header -->
<header class="header-v3">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">

                <!-- Logo desktop -->
                <a href="<?=Url::toRoute('/admin/order/index')?>" class="logo">
                    <img src="<?=Yii::getAlias('/images/onoff.png')?>" alt="Логотип компании"> <!---->
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="<?=Url::home()?>">Основной сайт</a>
                        </li>

                        <li>
                            <a href="<?=Url::toRoute('/admin/order/index')?>">Заказы</a>
                        </li>

                        <li>
                            <a href="<?=Url::toRoute('/admin/post/index')?>">Новости</a>
                        </li>

                        <li>
                            <a href="">Каталог</a>
                            <ul class="sub-menu">
                                <li><a href="<?=Url::toRoute('/admin/manufacturer/index')?>">Брэнд</a></li>
                                <li><a href="<?=Url::toRoute('/admin/categories/index')?>">Категории</a></li>
                                <li><a href="<?=Url::toRoute('/admin/subsection/index')?>">Подразделы категорий</a></li>
                                <li><a href="<?=Url::toRoute('/admin/products/index')?>">Товары</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="">Для Партнёров</a>
                            <ul class="sub-menu">
                                <li><a href="<?=Url::toRoute('/admin/sections/index')?>">Разделы</a></li>
                                <li><a href="<?=Url::toRoute('/admin/help/index')?>">Помощь по продуктам</a></li>
                                <li><a href="<?=Url::toRoute('/admin/documentation/index')?>">Документация </a></li>
                                <li><a href="<?=Url::toRoute('/admin/solutions/index')?>">Решения | Cases</a></li>
                                <li><a href="<?=Url::toRoute('/admin/software/index')?>">Software & Firmware</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?=Url::toRoute('/admin/messages/index')?>">Сообщения</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
<!--                    <div class="flex-c-m h-full">-->
<!--                        <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-modal-search">-->
<!--                            <i class="zmdi zmdi-search"></i>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="flex-c-m h-full p-lr-19">
                        <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="<?=Url::toRoute('/admin/order/index')?>"><img src="<?=Yii::getAlias('/images/onoff.png')?>" alt="IMG-LOGO"></a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="<?=Url::toRoute('/admin/order/index')?>">Главная</a>
                <span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
            </li>

            <li>
                <a href="<?=Url::home()?>">Основной сайт</a>
            </li>

            <!-- <li>
                <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
            </li> -->

            <li>
                <a href="<?=Url::toRoute('/admin/post/index')?>">Новости</a>
            </li>

            <li>
                <a href="<?=Url::toRoute('/admin/categories/index')?>">Категории</a>
            </li>

            <li>
                <a href="<?=Url::toRoute('/admin/products/index')?>">Товары</a>
            </li>

            <li>
                <a href="<?=Url::toRoute('/admin/messages/index')?>">Сообщения</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>

</header>
<!-- Sidebar -->
<aside class="wrap-sidebar js-sidebar">
    <div class="s-full js-hide-sidebar"></div>

    <div class="sidebar flex-col-l p-t-22 p-b-25">
        <div class="flex-r w-full p-b-30 p-r-27">
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
            <ul class="sidebar-link w-full">
                <li class="p-b-13">
                    <a href="<?=Url::home()?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Главная
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute('/site/catalog')?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Каталог продукции
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['/site/catalog', 'id'=>'1'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Умный дом
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['/site/catalog', 'id'=>'2'])?>"" class="stext-102 cl2 hov-cl1 trans-04">
                        Домофония и СКУД
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['/site/catalog', 'id'=>'3'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Мультирум
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['/site/catalog', 'id'=>'4'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Освещение
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['/site/catalog', 'id'=>'5'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Видеонаблюдение
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['/site/catalog', 'id'=>'6'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Климатконтроль (ОВиК)
                    </a>
                </li>

                <hr>
                <li class="p-b-13">
                    <a href="<?=Url::toRoute('/partners/help-products')?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Помощь по продуктам
                    </a>
                </li>
                <li class="p-b-13">
                    <a href="<?=Url::toRoute('/partners/documentation')?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Документация
                    </a>
                </li>
                <li class="p-b-13">
                    <a href="<?=Url::toRoute('/partners/solutions')?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Решения (Cases)
                    </a>
                </li>
                <li class="p-b-13">
                    <a href="<?=Url::toRoute('/partners/software')?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Software & Firmware
                    </a>
                </li>
            </ul>

            <!-- <div class="sidebar-gallery w-full p-tb-30">
                <span class="mtext-101 cl5">
                    @ CozaStore
                </span> -->

            <!-- <div class="flex-w flex-sb p-t-36 gallery-lb"> -->
            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-01.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-02.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-03.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-04.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-05.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-06.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-07.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-08.jpg');"></a>
            </div> -->

            <!-- item gallery sidebar -->
            <!-- <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery"
                style="background-image: url('images/gallery-09.jpg');"></a>
            </div>
        </div>
    </div> -->

            <div class="sidebar-gallery w-full">
                <hr>
                <p class="stext-108 cl6 p-t-10 text-justify">
                    ONOFF является компанией, оказывающей услуги в сфере консультирования, проектирования, программирования, монтажа и ввода в эксплуатацию объектов различной степени сложности, построенных на интеллектуальных системах.
                </p>
            </div>
        </div>
    </div>
</aside>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-t-92 p-b-80" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        <?=$this->title?>
    </h2>
</section>
<div class="bg0 p-t-50 p-b-85">
<div class="container">
<?=$content?>
</div>
</div>
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-20">
                <h4 class="stext-301 cl0 p-b-15">
                    Категории
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Каталог продукции
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Умный дом
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Домофония и СКУД
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Мультирум
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Освещение
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Видеонаблюдение
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Климатконтроль | ОВиК
                        </a>
                    </li>
                </ul>
            </div>

            <!-- <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Help
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Track Order
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Returns
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Shipping
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div> -->

            <div class="col-sm-8 col-lg-6 p-b-20">
                <h4 class="stext-301 cl0 p-b-15">
                    Адрес
                </h4>

                <p class="stext-107 cl7 "><!--size-201-->
                    220033, Беларусь, г. Минск, ул. Фабричная, д. 22, офис 316,
                    УНП192569921
                    р/с BY74BLBB30120192569921001001
                    в ОАО "Белинвестбанк" SWIFT BLBBBY2X,
                    адрес банка: г. Минск, Партизанский пр-кт 6а.
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-vk"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-20">
                <h4 class="stext-301 cl0 p-b-15">
                    Контактная информация
                </h4>

                <p>vel: +375 (29) 15 43 239</p>
                <p>life: +375 (33) 30 77 299</p>
                <p>E-mail: info@onoff.by</p>

                <!-- <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Subscribe
                        </button>
                    </div>
                </form> -->
            </div>
        </div>

        <div class="p-t-30">
            <!-- <div class="flex-c-m flex-w p-b-18">
                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
                </a>
            </div> -->

            <p class="stext-107 cl6 txt-center">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены
            </p>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="/images/icons/icon-close.png" alt="CLOSE">
            </button>

            <div class="modal-order-detail">

            </div>
        </div>
    </div>
</div>

<!-- Modal2 -->
<div class="wrap-modal2 js-modal2 p-t-60 p-b-20">
    <div class="overlay-modal2 js-hide-modal2"></div>

    <div class="container">
        <div class="bg0 p-t-50 p-b-40 p-lr-15-lg how-pos3-parent col-md-12">
            <button class="how-pos3 hov3 trans-04 js-hide-modal2">
                <img src="/images/icons/icon-close.png" alt="CLOSE">
            </button>

            <div class="modal-order-ok">

            </div>
        </div>
    </div>
</div>

<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>

<script>
    $('.parallax100').parallax100();
</script>

<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>

<script>
    $('.js-addwish-b2').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>

<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>

</body>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


