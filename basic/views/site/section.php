<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        <?=$categories->name?>
    </h2>
</section>
<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <h3 class="mtext-111 cl2 p-b-16"><?=$categories->name?></h3>
                </div>
            </div>
            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <a href="<?=Url::toRoute(['/site/catalog', 'id'=>$categories->id])?>"><img src="/images/about-01.jpg" alt="IMG"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>