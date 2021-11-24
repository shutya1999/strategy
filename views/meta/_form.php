<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Meta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_og')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_og')->textInput(['maxlength' => true]) ?>

    <div class="col-md-6">
        <?= $form->field($model, 'img')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'maxFileSize'=>10000, //maxFileSize - Kb
                'showCaption' => false,
                'showRemove' => true,
                'showUpload' => false,
                'browseOnZoneClick' => true,
            ]
        ]); ?>
    </div>
    <div class="col-md-6">
        <div>
            <img src="/uploads/<?= $model->img ?>" style="max-width: 100%">
        </div>
    </div>
    <div class="clearfix"></div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
