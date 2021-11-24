<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 27.07.2016
 * Time: 14:02
 */

use yii\helpers\Html;
?>
<?= '<ul>' ?>
<?php foreach ($langs as $lang):?>
    <?= '<li>'.Html::a('<img src="'.$lang->img_url.'">', '/'.$lang->url.Yii::$app->getRequest()->getLangUrl(), ['class' => 'uppercase']).'</li>' ?>
<?php endforeach;?>
<?= '</ul>' ?>