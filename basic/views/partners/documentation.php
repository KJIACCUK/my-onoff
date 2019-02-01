<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 09.08.2018
 * Time: 22:42
 */
use yii\helpers\Url;
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        Разделы документации
    </h2>
</section>

<!-- Banner -->
<div class="sec-banner bg0 p-t-30 p-b-210">

    <div class="container">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                Все разделы
            </button>
            <?php foreach ($categories as $category):?>
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 a<?=$category->id?>" data-filter=".<?=$category->id?>">
                    <?=$category->name?>
                </button>
            <?php endforeach;?>
        </div>
    </div>

    <div class="container">
        <div class="row isotope-grid">
            <?php foreach ($sections as $section):?>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto isotope-item <?=$section->name?>">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="/images/categories/category.jpg" alt="IMG-BANNER">

                        <a href="<?=Url::toRoute(['documentation-section', 'id'=>$section->id])?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?=$section->categories->name?>
								</span>

                                <span class="block1-info stext-101 trans-04">
                                    <?=$section->subsection?>
								</span>
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
</div>