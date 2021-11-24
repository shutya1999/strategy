<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Lang;
use app\models\Local;
use yii\helpers\Html;
use app\assets\AppAsset;
use app\widgets\MenuWidget;

$langCur = Lang::getCurrent();
$requestedUrl = Yii::$app->getRequest()->getLangUrl();

//$pathCurrentArr = explode('/',trim(Yii::$app->request->url, '/'));
//if($pathCurrentArr[0] != 'ru' and $pathCurrentArr[0] != 'ua' and $pathCurrentArr[0] != 'en'){
//    header("HTTP/1.1 301 Moved Permanently");
//    $req = Yii::$app->request->url;
//    if(substr($req,0,1) === '/'){
//        header("Location: ".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/en'.$req);
//        if($req === '/'){
//            header("Location: ".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/en');
//        }else{
//            header("Location: ".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/en'.$req);
//        }
//    }else{
//        header("Location: ".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/en/'.$req);
//    }
//    exit();
//}



//localization
$lang = $langCur;
$lang_cur = $langCur->url;
$localArr = Local::find()->all();
$lang_id = $lang->url;
$local = [];
foreach ($localArr as $item){
    $local[$item->var] = $item->$lang_id;
}



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php //require_once (Yii::getAlias('@app').'/getresponse/getresponse.php'); ?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] ?>/<?= $langCur->url ?>/<?= trim($requestedUrl,'/')?>">
    <link rel="alternate" hreflang="en" href="<?= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] ?>/en/<?= Yii::$app->request->pathInfo?>" />
    <link rel="alternate" hreflang="uk" href="<?= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] ?>/ua/<?= Yii::$app->request->pathInfo?>" />
    <link rel="alternate" hreflang="ru" href="<?= $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] ?>/ru/<?= Yii::$app->request->pathInfo?>" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <style>
        @font-face {
            font-family: 'e-Ukraine';
            src: url('/fonts/e-ukraine/e-Ukraine-Light.eot'); /* IE9 Compat Modes */
            src: url('/fonts/e-ukraine/e-Ukraine-Light.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                 url('/fonts/e-ukraine/e-Ukraine-Light.woff2') format('woff2'), /* Super Modern Browsers */
                 url('/fonts/e-ukraine/e-Ukraine-Light.woff') format('woff'), /* Pretty Modern Browsers */
                 url('/fonts/e-ukraine/e-Ukraine-Light.ttf') format('truetype'); /* Safari, Android, iOS */
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'e-Ukraine';
            src: url('/fonts/e-ukraine/e-Ukraine-Regular.eot'); /* IE9 Compat Modes */
            src: url('/fonts/e-ukraine/e-Ukraine-Regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                 url('/fonts/e-ukraine/e-Ukraine-Regular.woff2') format('woff2'), /* Super Modern Browsers */
                 url('/fonts/e-ukraine/e-Ukraine-Regular.woff') format('woff'), /* Pretty Modern Browsers */
                 url('/fonts/e-ukraine/e-Ukraine-Regular.ttf') format('truetype'); /* Safari, Android, iOS */
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'e-Ukraine';
            src: url('/fonts/e-ukraine/e-Ukraine-Medium.eot'); /* IE9 Compat Modes */
            src: url('/fonts/e-ukraine/e-Ukraine-Medium.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
                 url('/fonts/e-ukraine/e-Ukraine-Medium.woff2') format('woff2'), /* Super Modern Browsers */
                 url('/fonts/e-ukraine/e-Ukraine-Medium.woff') format('woff'), /* Pretty Modern Browsers */
                 url('/fonts/e-ukraine/e-Ukraine-Medium.ttf') format('truetype'); /* Safari, Android, iOS */
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="top-header df">
    <a href="/" class="logo-header">
        <img src="/img/logo.svg" alt="H-Strategy">
    </a>
<?= MenuWidget::widget() ?>
    <div class="burger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<main>
    <?= $content //тут лежит весь контент страницы?>
</main>

<footer>
    <div class="footer-top">
        <div class="container">
            <div class="left">
                <a href="/" class="logo-footer">
                    <img src="/img/footer/logo-footer.svg" alt="H-Strategy">
                </a>
                <p class="desc">
                    Адреса: Київ, вул Т.Г. Шевченка 34, оф. 25 <br>
                    <a href="tel:+380 (97) 111-11-11">+380 (97) 111-11-11</a>, <a href="tel:+380 (11) 111-11-11">(11) 111-11-11</a><br>
                    <a href="mailto:h_strategy@gmail.com" target="_blank">h_strategy@gmail.com</a>
                </p>
            </div>
            <div class="right">
                <a href="/" class="logo-footer">
                    <img src="/img/footer/logo-footer.svg" alt="H-Strategy">
                </a>
                <div class="nav">
                    <a href="">продукти</a>
                    <a href="">події</a>
                    <a href="">кейси</a>
                    <a href="">тренінги</a>
                </div>
                <div class="mesh">
                    <a href="" class="fb"></a>
                    <a href="" class="in"></a>
                    <a href="" class="ig"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="footer-bottom">
        <div class="container">
            <p>© H-Strategy, 2021, All Rights Reserved</p>
            <p>Створено <a href="https://uaitlab.com" target="_blank">UAITLAB</a></p>
        </div>
    </div>
</footer>

<div class="overlay"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
