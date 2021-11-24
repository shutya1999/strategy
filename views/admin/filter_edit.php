<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Редактировать: ' . $attribute->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $attribute->name, 'url' => ['view', 'id' => $attribute->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <div class="product-form">

                            <?php $model = ActiveForm::begin(); ?>

                            <h2>Аттрибут</h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Название которое пришло по API (не для изменения)</label>
                                        <input type="text" class="form-control" value="<?= $attribute->name ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group field-product-name_ua">
                                        <label class="control-label" for="product-name_ua">Название атрибута, украинское</label>
                                        <input type="text" id="product-name_ua" class="form-control" name="attribute_name_ua" value="<?= $attribute->name_ua ?>" maxlength="255" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group field-product-name_ru">
                                        <label class="control-label" for="product-name_ru">Название атрибута, русское</label>
                                        <input type="text" id="product-name_ru" class="form-control" name="attribute_name_ru" value="<?= $attribute->name_ru ?>" maxlength="255" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group field-product-url_ua">
                                        <label class="control-label" for="product-url_ua">url украинский (сгенерируется автоматически)</label>
                                        <input type="text" id="product-url_ua" class="form-control" name="attribute_url_ua" value="<?= $attribute->url_ua ?>" maxlength="255" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group field-product-url_ru">
                                        <label class="control-label" for="product-url_ru">url русский (сгенерируется автоматически)</label>
                                        <input type="text" id="product-url_ru" class="form-control" name="attribute_url_ru" value="<?= $attribute->url_ru ?>" maxlength="255" aria-invalid="false">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Примечание которое пришло по API (не для изменения)</label>
                                        <input type="text" class="form-control" value="<?= $attribute->note ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group field-product-note_ua">
                                        <label class="control-label" for="product-note_ua">Примечание, украинское</label>
                                        <input type="text" id="product-note_ua" class="form-control" name="attribute_note_ua" value="<?= $attribute->note_ua ?>" maxlength="255" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group field-product-note_ru">
                                        <label class="control-label" for="product-note_ru">Примечание, руское</label>
                                        <input type="text" id="product-note_ru" class="form-control" name="attribute_note_ru" value="<?= $attribute->note_ru ?>" maxlength="255" aria-invalid="false">
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group field-menu_show">
                                        <label><input type="checkbox" name="menu_show" <?= $attribute->menu_show?'checked':'' ?>> Показывать в колонке с фильтрами</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group field-page_show">
                                        <label><input type="checkbox" name="page_show" <?= $attribute->page_show?'checked':'' ?>> Показывать на странице товара в списке характеристик</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.box-body -->
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name'=>'submit_filter']) ?>
                </div>


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <div class="product-form">
                            <h2>Значения этого аттрибута</h2>
                            <? foreach ($attributeVals as $item){ ?>
                                <input type="hidden" name="id[]" value="<?= $item->id ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Название которое пришло по API (не для изменения)</label>
                                            <input type="text" class="form-control" value="<?= $item->name ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group field-product-name_ua">
                                            <label class="control-label" for="product-name_ua">Название атрибута, украинское</label>
                                            <input type="text" id="product-name_ua" class="form-control" name="name_ua[]" value="<?= $item->name_ua ?>" maxlength="255" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group field-product-url_ua">
                                            <label class="control-label" for="product-url_ua">url, украинский</label>
                                            <input type="text" id="product-url_ua" class="form-control" name="url_ua[]" value="<?= $item->url_ua ?>" maxlength="255" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group field-product-name_ru">
                                            <label class="control-label" for="product-name_ru">Название атрибута, русское</label>
                                            <input type="text" id="product-name_ru" class="form-control" name="name_ru[]" value="<?= $item->name_ru ?>" maxlength="255" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group field-product-url_ru">
                                            <label class="control-label" for="product-url_ru">url, украинский</label>
                                            <input type="text" id="product-url_ru" class="form-control" name="url_ru[]" value="<?= $item->url_ru ?>" maxlength="255" aria-invalid="false">
                                        </div>
                                    </div>

                                    <div class="col-md-12"></div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Примечание которое пришло по API (не для изменения)</label>
                                            <input type="text" class="form-control" value="<?= $item->note ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group field-product-note_ua">
                                            <label class="control-label" for="product-note_ua">Примечание, украинское</label>
                                            <input type="text" id="product-note_ua" class="form-control" name="note_ua[]" value="<?= $item->note_ua ?>" maxlength="255" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group field-product-note_ru">
                                            <label class="control-label" for="product-note_ru">Примечание, руское</label>
                                            <input type="text" id="product-note_ru" class="form-control" name="note_ru[]" value="<?= $item->note_ru ?>" maxlength="255" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group field-noindex">
                                            <label><input type="checkbox" name="noindex[<?= $item->id ?>]" <?= $item->noindex?'checked':'' ?>> не индексировать </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </div>
                            <?}?>
                        </div>

                    </div><!-- /.box-body -->
                </div>


                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name'=>'submit_filter']) ?>
                </div>

                <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
</div>
