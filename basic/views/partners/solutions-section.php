<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 15.08.2018
 * Time: 15:43
 */
use yii\helpers\Url;
$this->title = $section->categories->name .' | '. $section->subsection;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        <?=$this->title?>
    </h2>
</section>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Главная
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="<?=Url::toRoute('/partners/solutions')?>" class="stext-109 cl8 hov-cl1 trans-04">
            Решения
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
				<?=$this->title?>
		</span>
    </div>
</div>

<div class="container">
    <div class="col-md-8 col-lg-9 p-b-80">
        <div class="p-r-45 p-r-0-lg">
            <!-- item blog -->
            <?php foreach ($solutions as $sol):?>
                <div class="p-b-63">
                    <div class="p-t-20">
                        <h4 class="p-b-15">
                            <a href="<?=Url::toRoute(['/partners/solution-detail', 'id'=>$sol->id])?>" class="ltext-102 cl2 hov-cl1 trans-04">
                                <?=$sol->title?>
                            </a>
                        </h4>

                        <div class="flex-w flex-sb-m">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> Admin
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>
                                        <span>
                                            <?=$sol->updated_at?>
                                            <span class="cl12 m-l-4 m-r-6">|</span>
                                        </span>
										<span>ООО "ОНОФФ"</span>
									</span>

                            <a href="<?=Url::toRoute(['/partners/solution-detail', 'id'=>$sol->id])?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                Перейти к просмотру
                                <i class="fa fa-long-arrow-right m-l-9"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

        </div>
    </div>
</div>

