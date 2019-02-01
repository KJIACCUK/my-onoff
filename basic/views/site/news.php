<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 13.07.2018
 * Time: 21:34
 */
use yii\helpers\Url;
$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        <?=$this->title?>
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <!-- item blog -->
                    <?php foreach ($posts as $post):?>
                        <div class="p-b-63">
                            <a href="<?=Url::toRoute(['site/news-detail', 'id'=>$post->id])?>" class="hov-img0 how-pos5-parent">
                                <img src="<?=Url::toRoute('/images/posts') .'/'. $post->img?>" class="" alt="IMG-BLOG">
                                <div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										<?=date("d", strtotime($post->updated_at)); ?>
									</span>
                                    <span class="stext-109 cl3 txt-center">
										<?=date("m.Y", strtotime($post->updated_at))?>
									</span>
                                </div>
                            </a>
                            <div class="p-t-20">
                                <h4 class="p-b-15">
                                    <a href="<?=Url::toRoute(['site/news-detail', 'id'=>$post->id])?>" class="ltext-102 cl2 hov-cl1 trans-04">
                                        <?=$post->title?>
                                    </a>
                                </h4>
<!--                                <p class="stext-117 cl6">-->
<!--                                    --><?//= \yii\helpers\StringHelper::truncate($post->description, 180, '...') ?>
<!--                                </p>-->
                                <div class="flex-w flex-sb-m">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> Admin
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>
										<span>ООО "ОНОФФ СТОР"</span>
									</span>
                                    <a href="<?=Url::toRoute(['site/news-detail', 'id'=>$post->id])?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                        ЧИТАТЬ НОВОСТЬ
                                        <i class="fa fa-long-arrow-right m-l-9"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                    <!-- Pagination -->
<!--                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">-->
<!--                        <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">-->
<!--                            1-->
<!--                        </a>-->
<!---->
<!--                        <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">-->
<!--                            2-->
<!--                        </a>-->
<!--                    </div>-->
                </div>
            </div>
            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Категории товаров
                        </h4>
                        <ul>
                            <?php foreach ($categories as $category):?>
                                <li class="bor18">
                                    <a href="<?=Url::toRoute(['/site/catalog','id'=>$category->id])?>" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                        <?=$category->name?>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="p-t-65">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Рекомендуемые товары
                        </h4>
                        <ul>
                            <?php foreach ($products as $product):?>
                                <li class="flex-w flex-t p-b-30">
                                    <a href="<?=Url::toRoute('/site/catalog')?>" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
                                        <img src="/images/products/<?=$product->img?>" alt="PRODUCT" width="90px" height="100px">
                                    </a>
                                    <div class="size-215 flex-col-t p-t-8">
                                        <a href="<?=Url::toRoute('/site/catalog')?>" class="stext-116 cl8 hov-cl1 trans-04">
                                            <?=$product->name?>
                                        </a>
                                        <span class="stext-116 cl6 p-t-20">
											<?=$product->eur?>EUR | <?=round($product->eur*$courses->EUR_out,2)?>BYN | <?=round($product->eur*$courses->EUR_out*$courses->RUB_out*10,2)?>RUB
										</span>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>