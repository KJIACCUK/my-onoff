<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Update Order: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
    <div class="row">
        <div class="col-md-12 text-center"><h1>Заказ №<?= $model->id; ?></h1></div>
        <div class="col-md-8 col-md-offset-2">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        </div>
    </div>