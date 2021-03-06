<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Подраздел | Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg p-b-30">
    <a href="<?=Url::toRoute('/admin/categories/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Категории
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <a href="<?=Url::toRoute('/admin/subsection/index')?>" class="stext-109 cl8 hov-cl1 trans-04">
        Подразделы
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
				<?=$this->title?>
			</span>
</div>
<div class="post-create col-sm-12 bor10">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
