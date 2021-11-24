<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\bootstrap\Modal;
//use dosamigos\fileupload\FileUploadUI;

use yii\grid\GridView;
use yii\data\ActiveDataProvider;

?>
<style>
    .gallery-box .img:hover{
        background: #e8e8e8;
    }
</style>
<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Загрузка фото на сайт</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div class="inf">
                        <p><i class="fa fa-info-circle" aria-hidden="true"></i> Формат файлов: <strong>gif, png, jpg/jpeg</strong>. Размер файлов не более <strong>10 Мб.</strong></p>
                    </div>
                    <!-- Область предпросмотра -->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="uploaded-holder">
                                <div id="dropped-files">
                                    <!-- Кнопки загрузить и удалить, а также количество файлов -->
                                    <div id="upload-button">
                                        <center>
                                            <span>0 files</span>
                                            <!-- Прогресс бар загрузки -->
                                            <div id="loading">
                                                <div id="loading-bar">
                                                    <div class="loading-color"></div>
                                                </div>
                                                <div id="loading-content"></div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Область предпросмотра -->

                    <div class="row">
                        <div class="col-md-4">
                            <form action="" method="POST" ENCTYPE="multipart/form-data" >
                                <label for="input_file_01">Select files.</label>
                                <input type="file" name="send_file[]" class="filestyle"  data-buttonName="btn-primary" id="uploadbtn" multiple>

                                <button class="btn-adm btn btn-primary send_file" id="input_file_01" type="submit" name="send_file">Upload</button>
                            </form>
                        </div>
                        <div class="col-md-8  gallery-box">
                            <h4>Изображения в папке назначения</h4>
                            <div class="row">
                                <?php

                                $dir = \yii::$app->basePath.'/web/images/uploaded/'; // Папка с изображениями
                                $files = scandir($dir); // Берём всё содержимое директории
                                foreach($files as $file){
                                    if (($file != ".") && ($file != "..")){
                                        $path = '/images/uploaded/'.$file; // Получаем путь к картинке
                                        echo '<div class="col-md-3">';
                                        echo '<a class="btn del">Delete</a><br>';
                                        echo "<div class='img'><img data-id='' src='$path' alt='' width='100%'/></div><br><hr>"; // Вывод превью картинки
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- HTML-код модального окна -->
                    <div id="myModalBox" class="modal fade">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Заголовок модального окна -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <!-- Основное содержимое модального окна -->
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <img src="" alt="">
                                        <hr>
                                        <p>Size: <span id="img-size"></span></p>
                                        <a id="img-link" href="" target="_blank">Open in new tab</a>
                                    </div>
                                </div>
                                <!-- Футер модального окна -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- jQuery File Upload
                    <hr>
                    <input id="fileupload" type="file" name="files[]" multiple>
                    <div id="progress">
                        <div class="bar" style="width: 0%;height: 18px;background: green;"></div>
                    </div>-->
                    <!-- end - jQuery File Upload -->

                </div><!-- /.box-body -->
            </div>

        </div>
    </div>
</div>
