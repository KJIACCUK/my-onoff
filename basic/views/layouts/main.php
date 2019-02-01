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
                <a href="<?=Url::home()?>" class="logo">
                    <img src="<?=Yii::getAlias('/images/onoff.png')?>" alt="Логотип компании"> <!---->
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="<?=Url::home()?>">Главная</a>
                        </li>

                        <li>
                            <a href="<?=Url::toRoute('site/about')?>">О компании</a>
                        </li>

                        <li>
                            <a href="<?=Url::toRoute('site/catalog')?>">Каталог</a>
                        </li>

                        <li>
                            <a href="<?=Url::toRoute('site/news')?>">Новости</a>
                        </li>

                        <li>
                            <a href="<?=Url::toRoute('site/contact')?>">Контакты</a>
                        </li>

                        <?php if(Yii::$app->user->can('admin') || Yii::$app->user->can('manager')):?>
                        <li>
                            <a href="<?=Url::toRoute('/admin/order/index')?>">Управление сайтом</a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
<!--                    <div class="flex-c-m h-full p-r-24">-->
<!--                        <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-modal-search">-->
<!--                            <i class="zmdi zmdi-search"></i>-->
<!--                        </div>-->
<!--                    </div>-->
                    <?php if(Yii::$app->request->url <> '/cart/shopping-cart'):?>
                    <div class="flex-c-m h-full p-r-25 bor6">
                        <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?= Yii::$app->params['form'] ? Yii::$app->params['form'] : '-'?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                    <?php endif;?>

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
            <a href="<?=Url::home()?>"><img src="<?=Yii::getAlias('/images/onoff.png')?>" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
            <div class="flex-c-m h-full p-r-5">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?= Yii::$app->params['form'] ? Yii::$app->params['form'] : '-'?>">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>
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
                <a href="<?=Url::home()?>">Главная</a>
<!--                <span class="arrow-main-menu-m">-->
<!--						<i class="fa fa-angle-right" aria-hidden="true"></i>-->
<!--					</span>-->
            </li>

            <li>
                <a href="<?=Url::toRoute('site/catalog')?>">Каталог</a>
            </li>

            <li>
                <a href="<?=Url::toRoute('site/news')?>">Новости</a>
            </li>

            <li>
                <a href="<?=Url::toRoute('site/contact')?>">Контакты</a>
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

    <div class="sidebar flex-col-l p-t-25 p-b-25">
        <div class="flex-r w-full p-b-30 p-r-27">
            <?php if(!Yii::$app->user->isGuest):?>
            <div class="fs-20 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar col-sm-10 p-t-8 text-center">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?=Yii::$app->user->identity->username?> | <a href="<?=Url::toRoute('/site/logout')?>"><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </div>
            <?php endif;?>

            <?php if(Yii::$app->user->isGuest):?>
            <div class="fs-18 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar col-sm-10 p-t-7 text-center">
                <a href="<?=Url::toRoute('/site/login')?>" class="cl8">Вход</a> | <a href="<?=Url::toRoute('/site/signup')?>" class="cl8">Регистрация</a>
            </div>
            <?php endif;?>
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
                    <a href="<?=Url::toRoute(['site/section', 'id'=>'1'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Умный дом
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['site/section', 'id'=>'2'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Домофония и СКУД
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['site/section', 'id'=>'3'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Мультирум
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['site/section', 'id'=>'4'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Освещение
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['site/section', 'id'=>'5'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Видеонаблюдение
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?=Url::toRoute(['site/section', 'id'=>'6'])?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Климатконтроль (ОВиК)
                    </a>
                </li>

                <?php if (!Yii::$app->user->isGuest):?>
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
                <?php endif;?>
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
<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-62 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Корзина товаров
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
<!--            --------------------------------------------------------------------------------------------------->
            <ul class="header-cart-wrapitem w-full js-cart-scroll"></ul>

            <div class="header-cart-buttons flex-w w-full">
                <a href="<?=Url::toRoute('/cart/shopping-cart')?>" class="flex-c-m stext-101 cl0 size-102-2 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">Оформить</a>
                <button class="flex-c-m stext-101 cl0 size-102-2 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10 clear-cart" type="button">Очистить </button>
            </div>

        </div>
    </div>
</div>
<?=$content?>
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
                        <a href="<?=Url::toRoute('/site/catalog')?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Каталог продукции
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?=Url::toRoute(['site/section', 'id'=>'1'])?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Умный дом
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?=Url::toRoute(['site/section', 'id'=>'2'])?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Домофония и СКУД
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?=Url::toRoute(['site/section', 'id'=>'3'])?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Мультирум
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="<?=Url::toRoute(['site/section', 'id'=>'4'])?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Освещение
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="<?=Url::toRoute(['site/section', 'id'=>'5'])?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Видеонаблюдение
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="<?=Url::toRoute(['site/section', 'id'=>'6'])?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Климатконтроль | ОВиК
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-8 col-lg-6 p-b-20">
                <h4 class="stext-301 cl0 p-b-15">
                    Адрес
                </h4>

                <p class="stext-107 cl7"><!--size-201-->220033, Беларусь, г. Минск, ул. Фабричная, д. 22, офис 316,</p>
                    <p class="stext-107 cl7">УНП 192569921</p>
                    <p class="stext-107 cl7">р/с BY74BLBB30120192569921001001</p>
                    <p class="stext-107 cl7">в ОАО "Белинвестбанк" SWIFT BLBBBY2X, адрес банка: г. Минск, Партизанский пр-кт 6а.</p>

                <div class="p-t-27">
                    <a href="" class="fs-20 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-vk"></i>
                    </a>

                    <a href="https://facebook.com/onoffhome" class="fs-20 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/onoff_store_llc" class="fs-20 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

<!--                    <a href="#" class="fs-20 cl7 hov-cl1 trans-04 m-r-16">-->
<!--                        <i class="fa fa-linkedin"></i>-->
<!--                    </a>-->
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-20">
                <h4 class="stext-301 cl0 p-b-15">
                    Контактная информация
                </h4>

                <p>vel: +375 (29) 15 43 239</p>
                <p>life: +375 (33) 30 77 299</p>
                <p>E-mail: info@onoff.by</p>
            </div>
        </div>

        <div class="p-t-30">
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
