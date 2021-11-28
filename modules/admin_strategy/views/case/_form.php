<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\admin_strategy\models\Cases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-12">
    <div class="cases-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'product_id')->textInput() ?>

        <!--    --><?//= $form->field($model, 'preview')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'file_preview')->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'initialPreview' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
                'initialPreviewAsData' => true,
                'maxFileSize'=>20000, //maxFileSize - Kb 20 метров
                'showCaption' => false,
                'showUpload' => false
//                'uploadUrl' => Url::to(['/site/file-upload']),
            ]
        ]);
        ?>

        <?= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 's_desc_ua')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 's_desc_ru')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 's_desc_en')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'active')->textInput() ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

<!--        --><?//= $form->field($model, 'text_ua')->widget(CKEditor::class,[
//            'editorOptions' => [
//                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//                'inline' => false, //по умолчанию false
//            ],
//        ]);
//        ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
