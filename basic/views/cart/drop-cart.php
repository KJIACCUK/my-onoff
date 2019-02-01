<?php if (!empty($_SESSION['cart'])):?>
    <div class="total-amount  clearfix">
        <span class="floatleft">Кол-во товаров в корзине: <span class="drop-cart-view"><?=$_SESSION['cart.col']?></span></span>
        <span class="floatleft">Общая сумма корзины: <span class="drop-cart-view"><?=$_SESSION['cart.sum']?>$</span></span>
    </div>
<?php else:?>
    <h7 align="center"><i class="fa fa-trash-o" aria-hidden="true"></i>
        Корзина пуста..</h7>
<?php endif;?>



