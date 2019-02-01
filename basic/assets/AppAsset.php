<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/material-design-iconic-font.min.css',
        'css/icon-font.min.css',
        'css/animate.css',
        'css/hamburgers.min.css',
        'css/animsition.min.css',
        'css/select2.min.css',
        'css/daterangepicker.css',
        'css/slick.css',
        'css/magnific-popup.css',
        'css/perfect-scrollbar.css',
        'css/util.css',
        'css/main.css',
    ];
    public $js = [
        'js/animsition.min.js',
        'js/bootstrap.min.js',
        'js/select2.min.js',
        'js/moment.min.js',
        'js/slick.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/perfect-scrollbar.min.js',
//        'js/jquery-3.2.1.min.js',
        'js/daterangepicker.js',
        'js/parallax100.js',
        'js/isotope.pkgd.min.js',
        'js/sweetalert.min.js',
        'js/popper.min.js',
        'js/map-custom.js',
        'js/slick-custom.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
