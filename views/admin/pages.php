<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Страницы';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-index">

    <div class="content">
        <div class="row">
            <?if(!isset($_GET['com'])){?>
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Страницы на сайте</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>
                            <?= Html::a('Создать страницу', ['pages?com=create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <form action="" method="post">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'id',
                                ['label' => 'Ссылка', 'attribute' => 'url', 'value' => function($dat){return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/page/'.$dat->url;}],
                                'title',
                                'description',
                                ['label' => 'Редактировать', 'format' => 'raw', 'value' => function($dat){return '<a class="btn btn-info" href="/admin/pages?com=edit&id='.$dat->id.'">Редактировать</a>';}],
                                ['label'=>'Удлить', 'format' => 'raw', 'value' => function($dat){return '<input type="checkbox" name="item[]" value="'.$dat->id.'">';}]
//                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                            <input class="btn btn-danger pull-right" type="submit" name="pageDel" value="Удалить отмеченные">
                        </form>
                    </div><!-- /.box-body -->
                </div>

            </div>
            <?}?>
            <?if(isset($_GET['com']) and $_GET['com'] == 'create'){?>
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Создание новой страницы</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>
                                <?= Html::a('Назад', ['pages'], ['class' => 'btn btn-info']) ?>
                            </p>

                            <form class="form-horizontal" action="" method="post">

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="pages-title">Название. (мета-тег Title) Будет использован как текст ссылки</label>
                                    <div class="col-lg-9"><input id="pages-title" class="form-control" name="title"></div>
                                    <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="pages-description">Описание. (мета-тег Description)</label>
                                    <div class="col-lg-9"><input id="pages-description" class="form-control" name="descr"></div>
                                    <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="pages-url">Фраза или слово для формирования ссылки на страницу (будет переведено в транслит)</label>
                                    <div class="col-lg-9"><input id="pages-url" class="form-control" name="url"></div>
                                    <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="pages-text">Содержимое страницы</label>
                                    <div class="col-lg-9"><input id="pages-text" class="form-control mytextarea" name="text"></div>
                                    <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                                    </div>
                                </div>

                                <input type="hidden" name="lang" value="ru">
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                        <button type="submit" class="btn btn-block btn-success" name="pageNew">Сохранить</button>                        <br>
                                    </div>
                                </div>


                                <div class="inf">
                                    <p><i class="fa fa-info-circle" aria-hidden="true"></i>Кликните по изображению ниже, чтоб вставить его в текст.</p>
                                </div>
                                <div class="img-list-bottom">
                                    <?php
                                    $dir = \yii::$app->basePath.'/web/images/uploaded/'; // Папка с изображениями
                                    $files = scandir($dir); // Берём всё содержимое директории
                                    foreach($files as $file){
                                        if (($file != ".") && ($file != "..")){
                                            $info = getimagesize($dir.$file);
                                            $path = '/images/uploaded/'.$file; // Получаем путь к картинке
                                            echo '<div class="img-box">';
                                            echo "<div class='img'><img src='$path'/></div><br><hr>"; // Вывод превью картинки
                                            echo '</div>';
                                        }
                                    }
                                    echo '<div class="clear"></div>';
                                    ?>
                                </div>

                            </form>
                        </div><!-- /.box-body -->
                    </div>

                </div>
            <?}?>

            <?if(isset($_GET['com']) and $_GET['com'] == 'edit' and isset($_GET['id'])){?>
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Создание новой страницы</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>
                                <?= Html::a('Назад', ['pages'], ['class' => 'btn btn-info']) ?>
                            </p>

                            <form class="form-horizontal" action="" method="post">

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="pages-title">Название. (мета-тег Title) Будет использован как текст ссылки</label>
                                    <div class="col-lg-9"><input id="pages-title" class="form-control" name="title" value="<?= $dataPage->title ?>"></div>
                                    <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="pages-description">Описание. (мета-тег Description)</label>
                                    <div class="col-lg-9"><input id="pages-description" class="form-control" name="descr" value="<?= $dataPage->description ?>"></div>
                                    <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="pages-text">Содержимое страницы</label>
                                    <div class="col-lg-9"><input id="pages-text" class="form-control mytextarea" name="text" value="<?= str_replace('"','&quot;',$dataPage->text); ?>"></div>
                                    <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                                    </div>
                                </div>

                                <input type="hidden" name="lang" value="ru">
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                        <button type="submit" class="btn btn-block btn-success" name="pageEdit">Сохранить</button>                        <br>
                                    </div>
                                </div>


                                <div class="inf">
                                    <p><i class="fa fa-info-circle" aria-hidden="true"></i>Кликните по изображению ниже, чтоб вставить его в текст.</p>
                                </div>
                                <div class="img-list-bottom">
                                    <?php
                                    $dir = \yii::$app->basePath.'/web/images/uploaded/'; // Папка с изображениями
                                    $files = scandir($dir); // Берём всё содержимое директории
                                    foreach($files as $file){
                                        if (($file != ".") && ($file != "..")){
                                            $info = getimagesize($dir.$file);
                                            $path = '/images/uploaded/'.$file; // Получаем путь к картинке
                                            echo '<div class="img-box">';
                                            echo "<div class='img'><img src='$path'/></div><br><hr>"; // Вывод превью картинки
                                            echo '</div>';
                                        }
                                    }
                                    echo '<div class="clear"></div>';
                                    ?>
                                </div>

                            </form>
                        </div><!-- /.box-body -->
                    </div>

                </div>
            <?}?>

        </div>
    </div>

</div>
