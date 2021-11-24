<?php
use dektrium\user\widgets\Login;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>



<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Контактнвые данные</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <form class="form-horizontal" action="" method="post">

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pages-title">Адрес</label>
                            <div class="col-lg-9">
                                <input id="pages-title" class="form-control" name="adr" value="<?= $data[0]->text ?>">
                            </div>
                            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pages-title">Электронная почта</label>
                            <div class="col-lg-9">
                                <input id="pages-title" class="form-control" name="email" value="<?= $data[1]->text ?>">
                            </div>
                            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pages-title">Телефон 1</label>
                            <div class="col-lg-9">
                                <input id="pages-title" class="form-control" name="tel1" value="<?= $data[2]->text ?>">
                            </div>
                            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pages-title">Телефон 2</label>
                            <div class="col-lg-9">
                                <input id="pages-title" class="form-control" name="tel2" value="<?= $data[3]->text ?>">
                            </div>
                            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pages-title">Facebook</label>
                            <div class="col-lg-9">
                                <input id="pages-title" class="form-control" name="tel3" value="<?= $data[4]->text ?>">
                            </div>
                            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pages-title">Twitter</label>
                            <div class="col-lg-9">
                                <input id="pages-title" class="form-control" name="tel4" value="<?= $data[5]->text ?>">
                            </div>
                            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pages-title">Youtube</label>
                            <div class="col-lg-9">
                                <input id="pages-title" class="form-control" name="tel5" value="<?= $data[6]->text ?>">
                            </div>
                            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button type="submit" class="btn btn-block btn-success" name="contactsEdit">Сохранить</button>                        <br>
                            </div>
                        </div>



                    </form>

                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
