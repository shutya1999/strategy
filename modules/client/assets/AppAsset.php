<?php
namespace app\modules\client\assets;
use yii\web\AssetBundle;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AppAsset extends AssetBundle
{
    public $depends = [
        'app\modules\client\assets\AngularAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}