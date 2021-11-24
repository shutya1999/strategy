<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use app\models\Lang;
use app\models\Local;
use app\widgets\WLang;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$lang = Lang::getCurrent();
$localArr = Local::find()->all();
$lang_id = $lang->url;
$local = [];
foreach ($localArr as $item){
    $local[$item->var] = $item->$lang_id;
}

$this->title = $name;
?>

<style>
    #footer-bottom, #footer{
        display: none;
    }
</style>
<div class="site-error h-100">

    <div class="d-table h-100 w-100">
        <div class="d-table-row">
            <div class="d-table-cell text-center">
                <div class="content">
                    <h5><?= $local['txt404-01'] ?></h5>
                    <h1>404</h1>
                    <p><?= $local['txt404-02'] ?></p>
                    <a href="<?= \Yii::$app->urlManager->createUrl(['/']) ?>" class="btn-light-blue"><?= $local['txt404-03'] ?></a>
                </div>
            </div>
        </div>
    </div>

</div>

