<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 27.07.2016
 * Time: 14:02
 */

use yii\helpers\Html;
?>

<?php foreach ($langs as $lang):?>
    <? if($current->url == $lang->url){

    }else{
        echo Html::a($current->short, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl(), ['class' => 'mx-3']);
    } ?>
<?php endforeach;?>
