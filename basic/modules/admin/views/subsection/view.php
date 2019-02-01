<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="bread-crumb flex-w p-l-25 p-r-15 p-lr-0-lg">
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

<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Картинка', ['set-image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'img',
            'title',
            'description:ntext',
            'user_id',
        ],
    ]) ?>

</div>
