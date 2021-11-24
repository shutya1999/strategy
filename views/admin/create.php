<?php


use dektrium\user\widgets\Login;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Kronabroker admin';
?>

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Импорт данных из xls</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <h4>Внимание!</h4>
                    <p>В xls файле должна быть одна вкладка с таблицей относящейся к взрослым или детям с колонками строго как в образце. <a href="/uploads/page1.xls">Взрослые</a> и <a href="/uploads/page2">Дети</a></p>
                    <p>Любые изменения структуры файла (добавление/удаление колонок, добавление строк в заголовок таблицы, изменение любых надписей в первой строке) приведет к ошибкам при импорте.</p>
                    <p>В колонках после "Цінова категорія" обозначать "отмеченные" ячейки только знаком "+". Любые другие значки и пробелы будут восприниматься как "неотмеченное" поле.</p>
                    <p>Колонки B,C,D,E,F,G должны быть обязательно заполнены. Максимальная длинна 512 символов.</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h1>Дорослі</h1>
                            <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>

                            <?= $form->field($modelImport,'fileImport')->fileInput()->hint('Для импорта доступны файлы формата: ods, xls, xlsx')->label('Импорт xls файла') ?>
                            <?= $form->field($modelImport,'checkbox')->checkbox()->hint('Если чекбокс отмечен, база данных будет очищена перед импортированием таблицы')->label('Записать начисто? - ') ?>

                            <?= Html::submitButton('Import',['class'=>'btn btn-primary', 'name' => 'page1']);?>

                            <?php ActiveForm::end();?>
                        </div>
                        <div class="col-md-4">
                            <h1>Діти амбулаторія стаціонар</h1>
                            <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>

                            <?= $form->field($modelImport,'fileImport')->fileInput()->hint('Для импорта доступны файлы формата: ods, xls, xlsx')->label('Импорт xls файла') ?>
                            <?= $form->field($modelImport,'checkbox')->checkbox(['label' => 'Записать начисто?'])->hint('Если чекбокс отмечен, база данных будет очищена перед импортированием таблицы') ?>

                            <?= Html::submitButton('Import',['class'=>'btn btn-primary', 'name' => 'page2']);?>

                            <?php ActiveForm::end();?>
                        </div>
                    </div>

                </div><!-- /.box-body -->
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Создать запись вручную</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <a class="btn btn-default" href="/admin/instcreate">Взрослое</a>
                    <a class="btn btn-default" href="/admin/instcreatejr">Детское</a>

                </div><!-- /.box-body -->
            </div>

        </div>
    </div>
</div>
