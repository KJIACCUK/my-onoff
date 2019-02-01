<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="admin-main-container">
<div class="container">
    <div class="col-md-12 text-center"><h1><?= Html::encode($this->title) ?></h1></div>

    <div class="col-md-12 text-center">
        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить эту категорию?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="adm-content">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

</div>
</section>
