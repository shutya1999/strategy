<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 27.11.2021
 * Time: 10:13
 */

namespace app\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin/bootstrap-icons.css',
        'adminlte/dist/css/adminlte.min.css',
        'adminlte/plugins/fontawesome-free/css/all.min.css',
        'adminlte/dist/css/custom.css',
    ];
    public $js = [
//        'js/jquery-1.11.3.min.js',
//        'adminlte/plugins/jquery/jquery.min.js',
        'adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'adminlte/dist/js/adminlte.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}