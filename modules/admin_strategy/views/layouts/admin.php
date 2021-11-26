<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminnewAsset;

AdminnewAsset::register($this);

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
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php $this->beginBody() ?>
    <body class="skin-purple fixed-layout">
    <? // Yii::$app->session->setFlash('success', "Вы успешно подписались на рассылку."); ?>
    <? // Yii::$app->session->setFlash('error', "Такой Email уже существует."); ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable"
             style="position: fixed;z-index: 99;width: 320px;left: calc(50% - 160px);top: 0;">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i>Saved!</h4>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable"
             style="position: fixed;z-index: 99;width: 320px;left: calc(50% - 160px);top: 0;">
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

    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/admin/">
                        <span><img src="/img/footer/logo-footer.svg" class="light-logo" alt="homepage"
                                   style="max-width: 90%;"/></span>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item"><a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                                href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <li class="nav-item"><a
                                    class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                                    href="javascript:void(0)"><i class="icon-menu"></i></a></li>
                        <li class="nav-item"></li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                                aria-expanded="false"><span class="hide-menu">Администратор</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/ru/user/settings/account/"><i class="ti-settings"></i> Аккаунт</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="/admin/products/" aria-expanded="false">
                                <i class="ti-widgetized"></i>
                                <span class="hide-menu">Продукты</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">--- SEO</li>
                        <li>
                            <a class="waves-effect waves-dark" href="/admin/meta/" aria-expanded="false">
                                <i class="ti-split-v-alt"></i>
                                <span class="hide-menu">Мета теги</span>
                            </a>
                        </li>

                        <li>
                            <?
                            echo Html::beginForm(['/site/logout'], 'post', ['style' => 'padding: 10px 35px 10px 15px']);
                            echo Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn d-block w-100 p-0 waves-effect waves-dark']
                            );
                            echo Html::endForm(); ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <?= $content //тут лежит весь контент страницы ?>
            </div>
        </div>

        <footer class="footer">
            <span>Created by </span>
            <a href="http://uaitlab.com/" target="_blank" rel="nofollow"><img src="/img/logo-uaitlab-dark.png"
                                                                              alt="uaitlab logo" height="30px"></a>
        </footer>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>