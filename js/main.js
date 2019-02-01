
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });
                
        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
        
    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }    
    });

    $('.js-show-search').on('click',function(){
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }    
    });




    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });
    
    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });

    $('.js-hide-modal2').on('click',function(){
        $('.js-modal2').removeClass('show-modal2');
    });

    /*==================================================================
     */
    $(".add-to-cart").on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id'),
            col = $('#col').val();
        $.ajax({
            url: '/cart/add',
            data: {id: id, col: col},
            type: 'GET',
            success: function () {
                $.ajax({
                    url: '/cart/count-cart',
                    type: 'GET',
                    success: function (res) {
                        if(res > '0') $('.js-show-cart').attr('data-notify', res);
                    },
                    error: function () {
                        alert('Message error!!!');
                    }
                });
            },
            error: function () {
                alert('Message error!!!');
            }
        });
    });

    /*----------------------
    clear all Modal Cart
    -------------------------- */
    $(".clear-cart").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/cart/modal-clear',
            type: 'GET',
            success: function (res) {
                $('.js-show-cart').attr('data-notify', '-');
                showCart(res);
            },
            error: function () {
                alert('Message error!!!');
            }
        });
    });

    /*---------------------------------
    cart modal
     */
    $('.js-show-cart').on('click',function(e){
        $('.js-panel-cart').addClass('show-header-cart');
        e.preventDefault();
        $.ajax({
            url: '/cart/show-modal-cart',
            type: 'GET',
            success: function (res) {
                showCart(res);
                $.ajax({
                    url: '/cart/count-cart',
                    type: 'GET',
                    success: function (res) {
                        if(res == 0) {
                            $('.js-show-cart').attr('data-notify', '-');
                        }else{
                            $('.js-show-cart').attr('data-notify', res);
                        }
                    },
                    error: function () {
                        alert('Message error!!!');
                    }
                });
            },
            error: function () {
                alert('Message error!!!');
            }
        });
    });

    function showCart(cart){
         if (cart.length){
            $('.js-cart-scroll').html(cart);
         }
    }

    /*---------------------------------------------
    add +1(-1) Cart
     -------------------------------------------------------------*/
    $('.cart-plus-add').on('click', function(e){
       e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/add',
            data: {id: id},
            type: 'GET',
            success: function () {
                $.ajax({
                    url: '/cart/count-cart',
                    type: 'POST',
                    success: function (res) {
                        $('.all-products').html(res);
                    }
                });
                $.ajax({
                    url: '/cart/count-sum',
                    type: 'POST',
                    success: function (res) {
                        $('.all-sum-byn').html(res);
                    }
                });
                // $.ajax({
                //     url: '/cart/count-sum-byn',
                //     type: 'POST',
                //     success: function (res) {
                //         $('.all-sum-byn').html(res);
                //     }
                // });
                // $.ajax({
                //     url: '/cart/count-sum-rur',
                //     type: 'POST',
                //     success: function (res) {
                //         $('.all-sum-rur').html(res);
                //     }
                // });
                // $.ajax({
                //     url: '/cart/count-sum-usd',
                //     type: 'POST',
                //     success: function (res) {
                //         $('.all-sum-usd').html(res);
                //     }
                // });
            },
            error: function () {
                alert('Message error!!!');
            }
        });
    });

    $('.cart-minus-add').on('click', function(e){
       e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/clear-single-cart',
            data: {id: id},
            type: 'GET',
            success: function () {
                $.ajax({
                    url: '/cart/count-cart',
                    type: 'POST',
                    success: function (res) {
                        $('.all-products').html(res);
                    }
                });
                $.ajax({
                    url: '/cart/count-sum',
                    type: 'POST',
                    success: function (res) {
                        $('.all-sum-byn').html(res);
                    }
                });
                // $.ajax({
                //     url: '/cart/count-sum-byn',
                //     type: 'POST',
                //     success: function (res) {
                //         $('.all-sum-byn').html(res);
                //     }
                // });
                // $.ajax({
                //     url: '/cart/count-sum-rur',
                //     type: 'POST',
                //     success: function (res) {
                //         $('.all-sum-rur').html(res);
                //     }
                // });
                // $.ajax({
                //     url: '/cart/count-sum-usd',
                //     type: 'POST',
                //     success: function (res) {
                //         $('.all-sum-usd').html(res);
                //     }
                // });
            },
            error: function () {
                alert('Message error!!!');
            }
        });
    });
    /*-----------------------------------------------------------------*/


    /*-----------------------------
    hide block help contact
     */
    //$('.help-block').hide();

    /*-----------------------------
    modal detail product
     */
    $('.btn-modal-detail').on('click', function(e){
       e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/site/modal-detail',
            data: {id: id},
            type: 'GET',
            success: function (res) {
                if(res.length){
                    $('.modal-detail').html(res);
                }
            },
            error: function () {
                alert('Message error!!!');
            }
        });
    });

    $('body').on('click', '.modal-order', function(e){
        e.preventDefault();
        var id = $(this).closest('tr').data('key');
        $.ajax({
            type: 'GET',
            url: 'modal-order',
            data: {id: id},
            success:function(res){
                $('.modal-order-detail').html(res);
                $('.js-modal1').addClass('show-modal1');
            }});
    });

    $('body').on('click', '.modal-ok', function(e){
        e.preventDefault();
        //$('.js-modal2').addClass('show-modal2');
        var id = $(this).closest('tr').data('key');
        $.ajax({
            type: 'GET',
            url: 'modal-ok',
            data: {id: id},
            success:function(res){
                $('.modal-order-ok').html(res);
                $('.js-modal2').addClass('show-modal2');
            }});
    });

})(jQuery);