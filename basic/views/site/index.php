<?php

/* @var $this yii\web\View */

$this->title = 'Интеллектуальные системы';
use yii\helpers\Url;
?>
<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1 rs2-slick1">
        <div class="slick1">
            <div class="item-slick1 bg-overlay1" style="background-image: url(/images/slide-01.jpg);" data-thumb="images/thumb-01.jpg" data-caption="Видеонаблюдение">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Системы видеонаблюдения. Системы видеоаналитики.
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                СВН (CCTV)
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="<?=Url::toRoute(['/site/section', 'id' => 5])?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Смотреть здесь
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url(/images/slide-02.jpg);" data-thumb="images/thumb-02.jpg" data-caption="Домофония и СКУД">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									IP-домофония. Системы контроля и управления доступом.
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                IP-домофония. СКУД(PACS)
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="<?=Url::toRoute(['/site/section', 'id'=> 2])?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Смотреть здесь
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1 bg-overlay1" style="background-image: url(/images/slide-03.jpg);" data-thumb="images/thumb-03.jpg" data-caption="Умный дом">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Автоматизированные системы управления зданием.
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                УМНЫЙ ДОМ
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="<?=Url::toRoute(['/site/section', 'id'=>1])?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Смотреть здесь
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-slick1-dots p-lr-10"></div>
    </div>
</section>

<!-- Banner -->
<div class="sec-banner bg0">
    <div class="flex-w flex-c-m">
        <?php foreach ($categories as $category):?>
        <div class="size-202 m-lr-auto respon4">
            <!-- Block1 -->
            <div class="block1 wrap-pic-w">
                <img src="/images/categories/<?=$category->img?>" alt="IMG-BANNER">
                <a href="<?=Url::toRoute(['/site/section', 'id'=>$category->id])?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                    <div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								<?=$category->name?>
							</span>
<!--                        <span class="block1-info stext-102 trans-04">-->
<!--								Spring 2018-->
<!--							</span>-->
                    </div>
                    <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                            Перейти
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<!-- Blog -->
<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Новости
            </h3>
        </div>
        <div class="row">
            <?php foreach ($posts as $post):?>
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="<?=Url::toRoute(['/site/news-detail','id'=>$post->id])?>">
                                <img src="images/posts/<?=$post->img?>" alt="IMG-BLOG" width="370px" height="240px">
                            </a>
                        </div>
                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
								<span class="m-r-3">
									<span class="cl4">
									</span>
									<span class="cl5">ООО "ОНОФФ СТОР"</span>
								</span>
                                <span>
									<span class="cl4">
									</span>
									<span class="cl5">
										<?=$post->created_at?>
									</span>
								</span>
                            </div>

                            <h4 class="p-b-12">
                                <a href="<?=Url::toRoute(['/site/news-detail','id'=>$post->id])?>" class="mtext-108 cl2 hov-cl1 trans-04">
                                    <?=$post->title?>
                                </a>
                            </h4>
<!--                            <p class="stext-108 cl6">-->
<!--                                --><?//= \yii\helpers\StringHelper::truncate($post->description, 30, '...') ?>
<!--                            </p>-->
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
