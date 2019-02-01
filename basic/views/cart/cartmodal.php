<?php
use yii\helpers\Url;
?>
<?php if (!empty($session['cart'])):?>

        <?php foreach ($session['cart'] as $id =>$item): ?>
        <li class="header-cart-item flex-w flex-t m-b-12">
            <a href="" class="clear-single-cart" data-id="<?=$item['id']?>">
            <div class="header-cart-item-img">
                <img src="/images/products/<?=$item['img']?>" alt="IMG">
            </div>
            </a>

            <div class="header-cart-item-txt p-t-8">
                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04"><?= $item['name']?></a>
                <span class="header-cart-item-info"><?= $item['col']?> x <?= $item['eur']?>EUR | <?= round($item['eur']*$courses->EUR_out,2)?>BYN | <?= round($item['eur']*$courses->EUR_out*$courses->RUB_out*10,2)?>RUB</span>
            </div>
        </li>
        <?php endforeach; ?>

<!--    <div class="header-cart-total w-full p-t-40">Общее кол-во: --><?//=$session['cart.col']?><!--</div>-->
<!--    <div class="header-cart-total w-full p-tb-5">Общая сумма бел.: --><?//=$session['cart.sumbyn']?><!--</div>-->
<!--    <div class="header-cart-total w-full p-tb-5">Общая сумма рос.: --><?//=$session['cart.sumrur']?><!--</div>-->
<!--    <div class="header-cart-total w-full p-tb-5">Общая сумма $ : --><?//=$session['cart.sumusd']?><!--</div>-->

<?php else:?>
    <p align="center"><i class="fa fa-cart-plus" aria-hidden="true"></i> Ваша корзина пуста. Перейдите в <a href="<?=Url::toRoute('/site/catalog')?>">каталог</a> и добавьте товары. </p>
<?php endif;?>

<script>
    $('.clear-single-cart').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/clear-modal-cart-single',
            data: {id: id},
            type: 'GET',
            success: function (res) {
                if (res.length) {
                    $('.js-cart-scroll').html(res);
                }
            },
            error: function () {
                alert('Message error!!!');
            }
        });

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
    });
</script>