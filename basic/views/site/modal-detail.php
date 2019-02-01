<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 02.08.2018
 * Time: 15:55
 */
?>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/main.js"></script>

<div class="bg0 p-t-60 p-b-20 p-lr-15-lg how-pos3-parent">
    <button class="how-pos3 hov3 trans-04 js-hide-modal1">
        <img src="/images/icons/icon-close.png" alt="CLOSE">
    </button>
    <div class="row">
        <div class="col-md-6 col-lg-5 p-b-30">
            <div class="p-l-60 p-r-30 p-lr-0-lg">
                <div class="wrap-slick3 flex-sb flex-w">
<!--                    <div class="wrap-slick3-dots"></div>-->
<!--                    <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>-->
                    <div class="gallery-lb">
                        <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                            <div class="wrap-pic-w pos-relative">
                                <img src="/images/products/<?=$product->img?>" alt="IMG-PRODUCT">
                                <!-- <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="/images/products/<?=$product->img?>">
                                    <i class="fa fa-expand"></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-7 p-b-30">
            <div class="p-r-40 p-l-25 p-t-5 p-lr-0-lg">
                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                    <?=$product->name?>
                </h4>
                <p class="stext-102 cl3 p-t-10">
                   <?=$product->description?>
                </p>
                <div class="mtext-108 cl2 p-t-20">
                    Цена: <?=$product->eur?>EUR | <?=round($product->eur * $courses->EUR_out, 2)?>BYN | <?=round($product->eur * $courses->EUR_out*$courses->RUB_out*10,2)?>RUB
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="p-r-15">
                <div class="flex-w flex-r-m p-b-10">
                    <div class="flex-w flex-m w-full-sm"> <!--size-204 -->
                        <div class="wrap-num-product flex-w m-r-20 m-tb-10 modal-mob">
                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>
                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1" id = "col">
                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>
                        <a href="" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail add-to-modal-cart modal-mob" data-id ="<?=$product->id?>">
                            Добавить в корзину
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });
</script>
<script>
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });
</script>
<script>
    $(".add-to-modal-cart").on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id'),
            col = $('#col').val();
        $.ajax({
            url: '/cart/add-modal',
            data: {id: id, col: col},
            type: 'GET',
        });
    });
</script>
