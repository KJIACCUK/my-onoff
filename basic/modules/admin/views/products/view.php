<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="admin-main-container">
    <div class="container">
        <div class="row">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg p-b-30 col-sm-12">
                <a href="<?=Url::toRoute('/admin/order/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
                    Заказы
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <a href="<?=Url::toRoute('/admin/products/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
                    Товары
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <span class="stext-109 cl4">
				<?=$this->title?>
			</span>
            </div>

        <div class="adm-content">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                //'category_id',
                [
                    'attribute'=>'category_id',
                    'value'=>isset($model->categories->name) ? $model->categories->name : 'категории нет',
                ],
                'name',
                'byn', 'rur', 'usd',
                'img',
                'description:html',
                //'user_id',
                [
                    'attribute'=>'user_id',
                    'value'=>isset($model->user->username) ? $model->user->username : 'не зарегистрирован',
                ],
            ],
        ]) ?>
        </div>
    </div>
</div>
</section>