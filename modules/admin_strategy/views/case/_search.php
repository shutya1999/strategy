<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin_strategy\models\CasesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cases-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'preview') ?>

    <?= $form->field($model, 'title_ua') ?>

    <?= $form->field($model, 's_desc_ua') ?>

    <?php // echo $form->field($model, 'title_ru') ?>

    <?php // echo $form->field($model, 's_desc_ru') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 's_desc_en') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
