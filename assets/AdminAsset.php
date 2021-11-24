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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/bootstrap.min.css',
//        'css/site.css',
        'css/jquery-ui.min.css',
        'css/alte/bootstrap-theme.min.css',
        'css/alte/font-awesome.css',
        'css/alte/ionicons.min.css',
        'css/alte/AdminLTE.min.css',
        'css/alte/skin-green.css',
        'css/uploader/style.css',
//        "css/daterangepicker.css",
//        'fpdf/fpdf.css',
        'css/alte/main.css?002',

    ];
    public $js = [
//        'js/alte/jquery-2.2.3.min.js',
        'js/jquery-ui.min.js',
//        "js/moment.min.js",
//        "js/daterangepicker.min.js",
//        'js/jquery-3.3.1.slim.min.js',
//        'js/popper.min.js',
//        'js/bootstrap.min.js',
        'js/jquery.inputmask.bundle.min.js', //https://github.com/RobinHerbots/Inputmask
        'js/alte/bootstrap.min.js',
        'js/alte/bootstrap-filestyle.min.js',
        'js/uploader/javascript.js',
        'js/alte/main.js',
        'js/alte/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
