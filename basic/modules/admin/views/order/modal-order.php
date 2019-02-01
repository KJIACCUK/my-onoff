<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container p-b-30 p-l-30 p-r-30">

    <div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg p-b-30 col-sm-12">
        <a href="<?=Url::toRoute('/admin/order/index')?>" class="stext-110 cl8 hov-cl1 trans-04">
            Заказы
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-110 cl4">
        <?=$this->title?>
    </span>
    </div>

    <div class="bor10 m-t-50">
        <div class="p-t-25 p-b-10 p-l-20 p-r-20">
    <table class="table table-bordered">
        <thead>
        <tr>
<!--            <td>№ заказа</td>-->
            <td>Дата заказа</td>
<!--            <td>Заказчик</td>-->
            <td>УНН | УНП</td>
            <td>Форма собственности</td>
            <td>Название юр. лица</td>
            <td>Общее количество</td>
            <td>Общая сумма EUR</td>
            <td>Общая сумма BYN</td>
            <td>Общая сумма RUB</td>
            <td>Email(почта)</td>
            <td>Телефон</td>
            <td>Статус заказа</td>
        </tr>
        </thead>

        <tbody>
        <tr>
<!--            <td>--><?//=$model->id?><!--</td>-->
            <td><?=$model->created_at?></td>
<!--            <td>--><?//=$model->user_id?><!--</td>-->
            <td><?=$model->unn_unp?></td>
            <td><?=$model->type_ownership?></td>
            <td><?=$model->name_ur?></td>
            <td><?=$model->qty?></td>
            <td><?=$model->sum_eur?></td>
            <td><?=$model->sum_byn?></td>
            <td><?=$model->sum_rub?></td>
            <td><?=$model->email?></td>
            <td><?=$model->phone?></td>
            <td><?php if($model->status == '0'):?><span class="text-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Активен</span> <?php elseif($model->status == '1'):?><span class="text-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Принят</span><?php else:?><span class="text-danger"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Отменён</span><?php endif;?></td>
        </tr>
        </tbody>
    </table>


<?php $items = $model->orderItems;?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за ед. EUR</td>
            <td>Цена за ед. BYN</td>
            <td>Цена за ед. RUB</td>
            <td>Цена EUR</td>
            <td>Цена BYN</td>
            <td>Цена RUB</td>
<!--            <td>Сумма</td>-->
            <td></td>
        </tr>
        </thead>

        <p class="text-center p-t-30 p-b-15">Содержание заказа</p>
        <tbody>
        <?php foreach($items as $item): ?>
            <tr>
                <td class="sop-cart an-shop-cart"><a href="<?= Url::to(['/admin/products/view', 'id' => $item->product_id]) ?>"><?= $item['name'] ?></a></td>
                <td><?= $item['qty_item'] ?></td>
                <td><?=$item['eur']?></td>
                <td><?=$item['byn']?></td>
                <td><?=$item['rub']?></td>
<!--                <td>--><?//= $item['price'] ?><!--</td>-->
                <td><?= $item['sum_item_eur']?></td>
                <td><?= $item['sum_item_byn']?></td>
                <td><?= $item['sum_item_rub']?></td>
                <td class="sop-icon1"><a href="<?=Url::to(['/admin/order/delete-product', 'id'=>$item->id])?>"><i class="fa fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
        </div>
    </div>
</div>