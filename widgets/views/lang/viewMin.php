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
    <?= Html::a('<img src="'.$lang->img_url.'" style="height:32px" />', '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
<?php endforeach;?>
