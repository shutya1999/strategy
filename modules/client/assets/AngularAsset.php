<?php
namespace app\modules\client\assets;
use yii\web\AssetBundle;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AngularAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower';
    public $js = [
        'angular/angular.min.js',
        'angular-route/angular-route.min.js',
        'angular-resource/angular-resource.min.js'
    ];
}