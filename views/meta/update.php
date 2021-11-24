<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Meta */

$this->title = 'Редактировать мета теги на странице '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Metas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meta-update">
<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//    ]) ?>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <div class="meta-form">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
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
                                <? if($model->img){ ?>
                                    <div class="col-md-6">
                                        <div><img src="/uploads/<?= $model->img ?>" style="max-width: 100%;"></div>
                                    </div>
                                <?}?>
                            </div>
                            <div class="nav-tabs-custom mt-5">
                                <ul class="nav nav-tabs">
                                    <? foreach ($lang as $item){ ?>
                                        <li class="<? if($item->default == '1'){echo 'active';} ?>"><a href="#tab_<?= $item->id ?>" data-toggle="tab" aria-expanded="<? if($item->default == 1){echo 'true';}else{echo 'false';} ?>"><?= $item->name ?></a></li>
                                    <?}?>
                                </ul>
                                <div class="tab-content">
                                    <? foreach ($lang as $item){ ?>
                                        <? foreach ($data as $itemData){ ?>
                                            <? if($itemData->lang == $item->url){ ?>
                                                <div class="tab-pane <? if($item->default == '1'){echo 'active';} ?>" id="tab_<?= $item->id?>">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="com">Комментарий (не обязательно)</label>
                                                            <input type="text" class="form-control" id="com" value="<?= str_replace('"','&quot;',$itemData->comment); ?>" name="comment[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="meta1">Мета тег Title</label>
                                                            <input type="text" class="form-control" id="meta1" value="<?= str_replace('"','&quot;',$itemData->title); ?>" name="title[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="meta2">Мета тег Description</label>
                                                            <input type="text" class="form-control" id="meta2" value="<?= str_replace('"','&quot;',$itemData->des); ?>" name="des[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="meta3">Мета тег Title Opengraph</label>
                                                            <input type="text" class="form-control" id="meta3" value="<?= str_replace('"','&quot;',$itemData->title_og); ?>" name="title_og[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="meta4">Мета тег Description Opengraph</label>
                                                            <input type="text" class="form-control" id="meta4" value="<?= str_replace('"','&quot;',$itemData->des_og); ?>" name="des_og[]">
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="id[]" value="<?= $itemData->id ?>">
                                                    <input type="hidden" name="lang[]" value="<?= $item->url ?>">
                                                    <button type="submit" class="btn-light-blue" name="meta">Сохранить</button>
                                                </div>
                                            <?}?>
                                        <?}?>
                                    <?}?>
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>

</div>
