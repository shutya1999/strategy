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
class AdminnewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/alte/style.min.css?003',
    ];
    public $js = [
        'js/alte/jquery-3.2.1.min.js',
        'js/alte/popper.min.js',
        'js/alte/bootstrap4.min.js',
        'js/alte/perfect-scrollbar.jquery.min.js',
        'js/alte/sidebarmenu.js',
        'js/alte/custom.js',
        'js/jquery-ui.min.js',
        'js/jquery.inputmask.bundle.min.js', //https://github.com/RobinHerbots/Inputmask
//        'js/uploader/javascript.js',
        'js/alte/main.js',
    ];

    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
