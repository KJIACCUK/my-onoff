<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 15.08.2018
 * Time: 15:58
 */
use yii\helpers\Url;

$this->title = $detail->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/images/bg-01.jpg');">
    <h2 class="ltext-106 cl0 txt-center">
        <?=$this->title?>
    </h2>
</section>

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Главная
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="<?=Url::toRoute('/partners/solutions')?>" class="stext-109 cl8 hov-cl1 trans-04">
            Разделы решения
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="<?=Url::toRoute(['/partners/solutions-section', 'id'=>$detail->sections_id])?>" class="stext-109 cl8 hov-cl1 trans-04">
            Решения по разделу
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
				<?=$detail->title?>
			</span>
    </div>
</div>

<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <!--  -->
                    <div class="wrap-pic-w how-pos5-parent">
                        <img src="/images/solutions/<?=$detail->img?>" alt="IMG-BLOG">

                        <div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									<?=date("d", strtotime($detail->updated_at)); ?>
								</span>

                            <span class="stext-109 cl3 txt-center">
									<?=date("m.Y", strtotime($detail->updated_at))?>
								</span>
                        </div>
                    </div>

                    <div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">By</span> Admin
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									<?=$detail->updated_at?>
                                    <span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>ООО "ОНОФФ"</span>
							</span>

                        <h4 class="ltext-102 cl2 p-b-26">
                            <?=$detail->title?>
                        </h4>

                        <p class="stext-117 cl6">
                            <?=$detail->description?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>