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
<div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg p-b-30 col-sm-12">
    <a href="<?=Url::toRoute('/admin/order/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Заказы
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>
    <span class="stext-109 cl4">
        <?=$this->title?>
    </span>
</div>

    <div class="m-t-50">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>№ заказа</td>
                <td>Заказчик</td>
                <td>УНН | УНП</td>
                <td>Форма собственности</td>
                <td>Название юр. лица</td>
                <td>Дата заказа</td>
                <td>Общее количество</td>
                <td>Общая сумма</td>
                <td>Email(почта)</td>
                <td>Телефон</td>
                <td>Статус заказа</td>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td><?=$model->id?></td>
                <td><?=$model->user_id?></td>
                <td><?=$model->unn_unp?></td>
                <td><?=$model->type_ownership?></td>
                <td><?=$model->name_ur?></td>
                <td><?=$model->created_at?></td>
                <td><?=$model->qty?></td>
                <td><?=$model->sum?></td>
                <td><?=$model->email?></td>
                <td><?=$model->phone?></td>
                <td><?php if(!$model->status):?><span class="text-danger">Активен</span> <?php else:?><span class="text-success">Завершён</span><?php endif;?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <?php $items = $model->orderItems;?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Наименование</td>
                <td>Количество</td>
                <td>Цена</td>
                <td>Сумма</td>
                <td></td>
            </tr>
            </thead>

            <p class="text-center p-t-30 p-b-15">Содержание заказа</p>
            <tbody>
            <?php foreach($items as $item): ?>
                <tr>
                    <td class="sop-cart an-shop-cart"><a href="<?= Url::to(['/shopping/singleproduct', 'id' => $item->product_id]) ?>"><?= $item['name'] ?></a></td>
                    <td><?= $item['qty_item'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['sum_item']?></td>
                    <td class="sop-icon1"><a href="<?=Url::to(['/admin/order/delete-product', 'id'=>$item->id])?>"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="m-t-20 m-b-20">
        <div class="col-sm-3 col-sm-offset-4">
            <?= Html::a('Обработать', ['update', 'id' => $model->id], ['class' => 'flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04 modal']) ?>
        </div>
    </div>