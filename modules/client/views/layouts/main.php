<?php
use app\modules\client\assets\AppAsset;
use yii\web\View;

/* @var $this View */

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="en" ng-app="clientApp">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <ng-view></ng-view>

<?php $this->endBody() ?>
<script src="/app/js/app.js"></script>
<script src="/app/js/config/config.js"></script>
<script src="/app/js/services/ArticleFactory.js"></script>
<script src="/app/js/controllers/ArticleCtrl.js"></script>
</body>
</html>
<?php $this->endPage() ?>