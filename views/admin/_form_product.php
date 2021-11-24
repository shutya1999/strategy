<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label>Название которое пришло по API (не для изменения)</label>
        <input type="text" class="form-control" value="<?= $model->name ?>">
    </div>
    <?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>
            <?//= $form->field($model, 'url_ua')->textInput(['maxlength' => true])->label('url для украинской страницы (сгенерируется автоматически)') ?>
            <div class="form-group field-product-url_ua">
                <label class="control-label" for="product-url_ua">url для украинской страницы (сгенерируется автоматически)</label>
                <input type="text" id="product-url_ua" class="form-control" name="url_ua" value="<?= $model->url_ua ?>" maxlength="255" aria-invalid="false">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
            <?//= $form->field($model, 'url_ru')->textInput(['maxlength' => true])->label('url для русской страницы (сгенерируется автоматически)') ?>
            <div class="form-group field-product-url_ru">
                <label class="control-label" for="product-url_ru">url для русской страницы (сгенерируется автоматически)</label>
                <input type="text" id="product-url_ru" class="form-control" name="url_ru" value="<?= $model->url_ru ?>" maxlength="255" aria-invalid="false">
                <div class="help-block"></div>
            </div>
        </div>

        <div class="col-md-12">
            <h3>Размеры</h3>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'length')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'width')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'height')->textInput() ?>
        </div>


        <div class="col-md-12">
            <h3>Цены</h3>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'shopprice')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'discountprice')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'discountenddate')->input('date') ?>
        </div>


        <div class="col-md-12">
            <h3>Описание</h3>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'text_ua')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'text_ru')->textarea(['rows' => 6]) ?>
        </div>


        <div class="col-md-12">
            <h3>Мета теги</h3>
        </div>
        <div class="col-md-6">
            <?//= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?>
            <?//= $form->field($model, 'des_ua')->textInput(['maxlength' => true]) ?>
            <div class="form-group field-product-title_ua">
                <label class="control-label" for="product-title_ua">Мета тег Title (украинский)</label>
                <input type="text" id="product-title_ua" class="form-control" name="title_ua" value="<?= $model->title_ua ?>" maxlength="255">
                <div class="help-block"></div>
            </div>
            <div class="form-group field-product-des_ua">
                <label class="control-label" for="product-des_ua">Мета тег Description (украинский)</label>
                <input type="text" id="product-des_ua" class="form-control" name="des_ua" value="<?= $model->des_ua ?>" maxlength="255" aria-invalid="false">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-md-6">
            <?//= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?//= $form->field($model, 'des_ru')->textInput(['maxlength' => true]) ?>
            <div class="form-group field-product-title_ua">
                <label class="control-label" for="product-title_ru">Мета тег Title (русский)</label>
                <input type="text" id="product-title_ru" class="form-control" name="title_ru" value="<?= $model->title_ru ?>" maxlength="255">
                <div class="help-block"></div>
            </div>
            <div class="form-group field-product-des_ua">
                <label class="control-label" for="product-des_ru">Мета тег Description (русский)</label>
                <input type="text" id="product-des_ru" class="form-control" name="des_ru" value="<?= $model->des_ru ?>" maxlength="255" aria-invalid="false">
                <div class="help-block"></div>
            </div>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'active')->checkbox([
                'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>'
            ])?>
        </div>
    </div>

    <?//= $form->field($model, 'flmodel')->textInput() ?>
    <?//= $form->field($model, 'originalgoods_ref')->textInput() ?>
    <?//= $form->field($model, 'storagemeasures_ref')->textInput() ?>
    <?//= $form->field($model, 'salemeasures_ref')->textInput() ?>
    <?//= $form->field($model, 'code')->textInput() ?>
    <?//= $form->field($model, 'rootinventorygroup_ref')->textInput() ?>
    <?//= $form->field($model, 'inventorygroup_ref')->textInput() ?>
    <?//= $form->field($model, 'trademarkregions_ref')->textInput() ?>
    <?//= $form->field($model, 'trademarkregionsname')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
