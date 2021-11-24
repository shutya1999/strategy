<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\WLang;
use app\assets\AdminAsset;
AdminAsset::register($this);

//AppAsset::register($this);
?>



<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html style="height: auto; min-height: 100%;">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title>Adminpage</title>
    <?php $this->head() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Ubuntu:400,500,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <style>.cke{visibility:hidden;}</style>
</head>

<?php $this->beginBody() ?>
<body class="skin-green sidebar-mini" style="height: auto; min-height: 100%;">
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
        // image_list: [
        //     {title: 'Dog', value: 'https://boygeniusreport.files.wordpress.com/2016/11/puppy-dog.jpg'},
        //     {title: 'Cat', value: 'https://i.kinja-img.com/gawker-media/image/upload/s--HqfzgkTd--/c_scale,f_auto,fl_progressive,q_80,w_800/wp2qinp6fu0d8guhex9v.jpg'}
        // ],
        // images_upload_url : '/admin/mceupload',
        // automatic_uploads: false,
        content_css: ['https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css','http://ibis/flaticon/flaticon.css','http://ibis/flaticon/bicon.css'],
//        noneditable_noneditable_class: 'fa',
        //extended_valid_elements: 'span[*]'
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

<div class="wrapper" style="height: auto; min-height: 100%;">

    <header class="main-header">
        <!-- Logo -->
        <a href="/admin/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>I</b>T</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>МКГ "Живое Дело"</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/user1-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Администратор</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <!-- font awesome icons https://fontawesome.com/v4.7.0/icons/ -->
            <ul class="sidebar-menu tree" data-widget="tree">

                <li class="header">Главное меню</li>

                <li class="treeview ">
                    <a href="/otrasli/">
                        <i class="fa fa-tasks"></i>
                        <span>Управление сайтом</span>
                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>
                    <ul class="treeview-menu">
                        <li class="sub-menu">
                            <a href="/meta/index"><i class="fa fa-file-text-o"></i> Мета-теги</a>
                        </li>
                        <li class="sub-menu">
                            <a href="/admin/local"><i class="fa fa-file-text-o"></i> Языковые переменные</a>
                        </li>
                        <li class="sub-menu">
                            <a href="/redirect/index"><i class="fa fa-file-text-o"></i> Перенаправление</a>
                        </li>
                    </ul>
                </li>


                <li class="treeview ">
                    <a href="/otrasli/">
                        <i class="fa fa-tasks"></i>
                        <span>Заявки и регистрации</span>
                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>
                    <ul class="treeview-menu">
                        <li class="sub-menu">
                            <a href="/sub/index"><i class="fa fa-file-text-o"></i> Подписка на новости</a>
                        </li>
                        <li class="sub-menu">
                            <a href="/feedback/index"><i class="fa fa-file-text-o"></i> Обратная связь</a>
                        </li>
                        <li class="sub-menu">
                            <a href="/subproject/index"><i class="fa fa-file-text-o"></i> Заявки на тренинги и др.</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="/admin/contacts"><i class="fa fa-file-text-o"></i> Контакты (тел., email)</a>
                </li>
                <li>
                    <a href="/history/index"><i class="fa fa-file-text-o"></i> История</a>
                </li>
                <li>
                    <a href="/team/index"><i class="fa fa-file-text-o"></i> Команда</a>
                </li>
                <li>
                    <a href="/trener/index"><i class="fa fa-file-text-o"></i> Тренеры</a>
                </li>
                <li>
                    <a href="/achievement/index"><i class="fa fa-file-text-o"></i> Достижения/награды</a>
                </li>
                <li>
                    <a href="/client/index"><i class="fa fa-file-text-o"></i> Клиенты</a>
                </li>


                <li class="treeview ">
                    <a href="/otrasli/">
                        <i class="fa fa-tasks"></i>
                        <span>Проекты</span>
                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>
                    <ul class="treeview-menu">
                        <li class="sub-menu">
                            <a href="/proj/index"><i class="fa fa-file-text-o"></i> Меню Проекты</a>
                        </li>
                        <li class="sub-menu">
                            <a href="/project/index?go=trening"><i class="fa fa-file-text-o"></i> Тренинги</a>
                        </li>
                        <li class="sub-menu">
                            <a href="/project/index?go=couching"><i class="fa fa-file-text-o"></i> Коучинги</a>
                        </li>
                        <li class="sub-menu">
                            <a href="/learn/index"><i class="fa fa-file-text-o"></i> Корпоративное обучение</a>
                        </li>
                    </ul>
                </li>


                <li><a href="/callback/index">
                        <i class="fa fa-file-text-o"></i> Отзывы</a>
                </li>
                <li><a href="/brend/index">
                        <i class="fa fa-file-text-o"></i> Бренды</a>
                </li>
                <li><a href="/schedule/index">
                        <i class="fa fa-file-text-o"></i> График мероприятий</a>
                </li>
                <li><a href="/news/index">
                        <i class="fa fa-file-text-o"></i> Прес-центр(новости)</a>
                </li>
                <li><a href="/tags/index">
                        <i class="fa fa-file-text-o"></i> Прес-центр(теги)</a>
                </li>

                <li>-------</li>

                <li><a href="/site/logout" data-method="post">
                        <i class="fa fa-sign-out"></i> Выйти</a>
                </li>
                <li><a href="/">
                        <i class="fa fa-sign-out"></i> На главную</a>
                </li>


<!---->
<!--                <li class="treeview ">-->
<!--                    <a href="/service/">-->
<!--                        <i class="fa fa-wrench"></i>-->
<!--                        <span>Услуги (кейс)</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/service/">-->
<!--                                <i class="fa fa-list-ol"></i> Список</a>-->
<!--                        </li>-->
<!--                        <li><a href="/service/create">-->
<!--                                <i class="fa fa-plus"></i> Добавить</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!---->
<!--                <li class="treeview ">-->
<!--                    <a href="/skill/">-->
<!--                        <i class="fa fa-sign-language"></i>-->
<!--                        <span>Скилы (кейс)</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/skill/">-->
<!--                                <i class="fa fa-list-ol"></i> Список</a>-->
<!--                        </li>-->
<!--                        <li><a href="/skill/create">-->
<!--                                <i class="fa fa-plus"></i> Добавить</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!---->
<!--                <li class="treeview ">-->
<!--                    <a href="/blog/index">-->
<!--                        <i class="fa fa-newspaper-o"></i>-->
<!--                        <span>Новости</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/blog/index">-->
<!--                                <i class="fa fa-list-ol"></i> Список</a>-->
<!--                        </li>-->
<!--                        <li><a href="/blog/create">-->
<!--                                <i class="fa fa-plus"></i> Добавить</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!---->
<!--                <li class="treeview ">-->
<!--                    <a href="/team/index">-->
<!--                        <i class="fa fa-users"></i>-->
<!--                        <span>Команда</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/team/index">-->
<!--                                <i class="fa fa-list-ol"></i> Список</a>-->
<!--                        </li>-->
<!--                        <li><a href="/team/create">-->
<!--                                <i class="fa fa-plus"></i> Добавить</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!---->
<!---->
<!--<li>-----------------------------</li>-->
<!---->
<!--                <li class="treeview ">-->
<!--                    <a href="/adm/personas/">-->
<!--                        <i class="fa fa-users"></i>-->
<!--                        <span>Персони</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/adm/personas/list/">-->
<!--                                <i class="fa fa-list-ol"></i> Перелік</a>-->
<!--                        </li>            <li><a href="/adm/personas/add/">-->
<!--                                <i class="fa fa-plus"></i> Додати</a>-->
<!--                        </li>            <li><a href="/adm/personas/edit/">-->
<!--                                <i class="fa fa-edit"></i> Редагування</a>-->
<!--                        </li>          </ul>-->
<!--                </li>-->
<!--                <li class="treeview ">-->
<!--                    <a href="/adm/projects/">-->
<!--                        <i class="fa fa-folder-open"></i>-->
<!--                        <span>Проекти</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/adm/projects/list/">-->
<!--                                <i class="fa fa-list-ol"></i> Перелік</a>-->
<!--                        </li>            <li><a href="/adm/projects/add/">-->
<!--                                <i class="fa fa-plus"></i> Додати</a>-->
<!--                        </li>            <li><a href="/adm/projects/edit/">-->
<!--                                <i class="fa fa-edit"></i> Редагування</a>-->
<!--                        </li>          </ul>-->
<!--                </li>-->
<!--                <li class="treeview ">-->
<!--                    <a href="/adm/events/">-->
<!--                        <i class="fa fa-map-signs"></i>-->
<!--                        <span>Події</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/adm/events/list/">-->
<!--                                <i class="fa fa-list-ol"></i> Перелік</a>-->
<!--                        </li>            <li><a href="/adm/events/add/">-->
<!--                                <i class="fa fa-plus"></i> Додати</a>-->
<!--                        </li>            <li><a href="/adm/events/edit/">-->
<!--                                <i class="fa fa-edit"></i> Редагування</a>-->
<!--                        </li>          </ul>-->
<!--                </li>-->
<!---->
<!--                <li class="treeview ">-->
<!--                    <a href="/adm/reports/">-->
<!--                        <i class="fa fa-bar-chart"></i>-->
<!--                        <span>Звіти</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="/adm/reports/list/">-->
<!--                                <i class="fa fa-list-ol"></i> Перелік</a>-->
<!--                        </li>            <li><a href="/adm/reports/add/">-->
<!--                                <i class="fa fa-plus"></i> Додати</a>-->
<!--                        </li>            <li><a href="/adm/reports/edit/">-->
<!--                                <i class="fa fa-edit"></i> Редагування</a>-->
<!--                        </li>            <li><a href="/adm/reports/stats/">-->
<!--                                <i class="fa fa-area-chart"></i> Статистика</a>-->
<!--                        </li>          </ul>-->
<!--                </li>-->
<!--                <li class="active">-->
<!--                    <a href="/adm/moderators/">-->
<!--                        <i class="fa fa-user-secret"></i>-->
<!--                        <span>Модераторы</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="header">----------</li>        <li class="treeview">-->
<!--                    <a href="/adm/settings/">-->
<!--                        <i class="fa fa-gears"></i>-->
<!--                        <span>Додаткове</span>-->
<!--                        <span class="pull-right-container"><span class="fa fa-angle-left pull-right"></span></span>          </a>-->
<!--                    <ul class="treeview-menu" style="display: none;">-->
<!--                        <li><a href="/adm/settings/dictionaries-list-vars/">-->
<!--                                <i class="fa fa-list"></i> додаткові довідники</a>-->
<!--                        </li>            <li><a href="/adm/settings/system-vars/">-->
<!--                                <i class="fa fa-gear"></i> Технічні параметри</a>-->
<!--                        </li>          </ul>-->
<!--                </li>-->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->


    <!-- Content Header (Page header) -->
    <div class="content-wrapper" style="min-height: 838px;">
        <?= $content //тут лежит весь контент страницы?>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.8
        </div>
        <strong>Copyright © <?= date('Y')?> <a href="https://uaitlab.com">UAitLAB</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class=""><a href="#control-sidebar-home-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane active" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <div class="icheckbox_square-green checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="pull-right" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <div class="icheckbox_square-green checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="pull-right" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <div class="icheckbox_square-green checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="pull-right" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <div class="icheckbox_square-green checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="pull-right" checked="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <div class="icheckbox_square-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="pull-right" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
