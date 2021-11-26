<?php


namespace app\assets;


use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/alte/bootstrap.min.css',
        'css/alte/style.min.css',
    ];
    public $js = [
        'js/jquery-1.11.3.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}