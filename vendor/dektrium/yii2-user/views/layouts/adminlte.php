<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
AdminAsset::register($this);

//use app\assets\AppAsset;
//AppAsset::register($this);
?>




<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title>Кабинет</title>
    <?php $this->head() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


</head>
<?php $this->beginBody() ?>
<body class="hold-transition skin-blue sidebar-mini">

<?// Yii::$app->session->setFlash('success', "Вы успешно подписались на рассылку."); ?>
<?// Yii::$app->session->setFlash('error', "Такой Email уже существует."); ?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Error!</h4>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('danger')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Error!</h4>
        <?= Yii::$app->session->getFlash('danger') ?>
    </div>
<?php endif; ?>

    <script src='/tinymce/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '.mytextarea',
            height: 100,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample',
                'fontawesome noneditable'
            ],
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | fontawesome',
            content_css: ['https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'],
            noneditable_noneditable_class: 'fa',
            extended_valid_elements: 'span[*]'
        });
        tinymce.init({
            selector: '.mytextarea1',
            height: 100,
            menubar: true,
            plugins: [
                'textcolor colorpicker',
            ],
            toolbar: 'bold italic strikethrough forecolor backcolor',
        });
    </script>
    <div class="wrapper">

        <!-- Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="/admin/" class="logo">
                <img class="jd-logo" style="max-height: 50px;max-width: 230px" src="/images/logo_ecta.png" alt="logo">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" id="top-panel">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>
        <!-- /.Header -->

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <!--                <li class="header">MAIN MENU</li>-->

                    <li><a href="/user/settings/profile">Профиль</a></li>
                    <li><a href="/user/settings/account">Аккаунт</a></li>
                    <li><a href="/user/settings/networks">Соц. сети</a></li>


                    <? if(\Yii::$app->user->identity->role === 1){ ?>
                        <li>----------------</li>
                        <li><a href="/user/admin/index">Пользователи</a></li>
<!--                        <li><a href="/admin/pages">Дополнительные страницы</a></li>-->
                        <li><a href="/dirlist">Справочники</a></li>
                        <li><a href="/dogovor/index?sort=-date">Договор</a></li>
                        <li><a href="/dogovor/custom_pay">Оплата реестра</a></li>
                        <li><a href="/admin/export">Экспорт 1С</a></li>
                        <li><a href="/admin/premium">Страховые платежи</a></li>
                        <li><a href="/promo/index">Промо-коды</a></li>
                        <li><a href="/admin/api_help">API. Справка</a></li>
                    <? } ?>
                    <? if(\Yii::$app->user->identity->role === 2){ ?>
                        <li>----------------</li>
                        <li><a href="/dogovor/index?sort=-date">Договор</a></li>
                        <li><a href="/dogovor/custom_pay">Оплата реестра</a></li>
                    <? } ?>
                    <li>----------------</li>
                    <li><a href="/" target="_blank">На главную</a></li>
                    <li><?
                        echo Html::beginForm(['/site/logout'], 'post');
                        echo Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn logout']
                        );
                        echo Html::endForm(); ?>
                    </li>
                    <li style="margin-top: 20px;"><img src="/images/liqpayLogo.png" alt="liqpay" id="liqpay" style="max-width: 100px"></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- /.Left side column -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?= $content //тут лежит весь контент страницы?>

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                <span>Created by </span>
                <a href="http://uaitlab.com/"><img src="/images/logo_new.png" alt="uaitlab logo" height="30px"></a>
            </div>
            <!--         Default to the left -->
            <strong>Copyright &copy; 2016-<?= date('Y')?> <a href="//uaitlab.com/" target="_blank">UaItLab</a>.</strong> All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>