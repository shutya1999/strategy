<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.11.2018
 * Time: 13:05
 */
?>

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Локализация надписей на сайте (кнопки, меню и т.д.)</h3>
                    <p><?= htmlentities('&shy;'); ?> - переносит слишком длинное слово на новую строку и вставляет знак переноса</p>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <? foreach ($local as $item){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post" class="form-inline">
                                    <input class="hidden-id" type="hidden" name="id" value="<?= $item->id; ?>">
                                    <p>Variable name = <?= $item->var ?> <span class="rezult" style="font-weight: 900;display: none;"> OK</span></p>
                                    <label>Language - <span style="color: red; font-size: large;">RU</span> </label>
                                    <input class="text1-area form-control" name="TextData1" value="<?= str_replace('"','&quot;',$item->ru); ?>" style="width: 30%;">
                                    <label style="margin-left: 60px">Language - <span style="color: red; font-size: large;">UA</span> </label>
                                    <input class="text2-area form-control" name="TextData2" value="<?= str_replace('"','&quot;',$item->ua); ?>" style="width: 30%;">

                                    <!-- ЕСЛИ ВДРУГ ПОЯВИТСЯ АНГЛИЙСКИЙ -->
<!--                                    <label style="margin-left: 60px">Language - <span style="color: red; font-size: large;">EN</span> </label>-->
<!--                                    <input class="text3-area form-control" name="TextData3" value="--><?//= $item->en; ?><!--">-->

                                    <button class="btn-light-blue admin-local-ajax" name="editLocalAjax" style="margin-left: 60px">Сохранить</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    <?}?>
                </div><!-- /.box-body -->
            </div>


        </div>
    </div>
</div>

