<?php
use yii\helpers\VarDumper;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use app\widgets\PaginationWidget;

$this->registerCssFile('@web/css/case.css', ['depends' => \app\assets\AppAsset::class]);

$this->params['breadcrumbs'][] = 'Кейси';
$lang_id = $lang->url;
$lang_url = ($lang->url == 'ua') ? '' : $lang->url . "/" ;
?>

<?php
//VarDumper::dump(parse_url(Yii::$app->getRequest()->url));
?>

<header class="header-case">
    <div class="container">
        <h1>Наші кейси</h1>
    </div>
</header>

<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>


    <div class="nav-pagin case-catalog_js">
        <div class="nav-pagin__wrap df">
            <?php foreach ($products as $product): ?>
<!--                --><?php //$id = (isset($_GET['id'])) ? $_GET['id'] : ($product['active_tag'] == 1) ? $product['active_tag'] : '';  ?>
                <div class="item <?= ($product['id'] == $active_id) ? 'active' : '' ?>" data-nav-id="<?= $product['id'] ?>"><?= $product['tag_'.$lang_id] ?></div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="case-catalog">
        <?php foreach ($cases as $case): ?>
                <div class="item show">
                    <a href="/<?= $lang_url . "case/" . $case['url'] ?>" class="img">
                        <picture>
                            <source srcset="/img/index/<?= $case['preview'] ?>.webp" type="image/webp">
                            <source srcset="/img/index/<?= $case['preview'] ?>.jpg" type="image/jpeg">
                            <img src="/img/index/<?= $case['preview'] ?>.jpg" alt="Стратегічна сесія для Mashable">
                        </picture>
                    </a>
                    <h2 class="h5"><a href="/<?= $lang_url . "case/" . $case['url'] ?>"><?= $case['title_'.$lang_id] ?></a></h2>
                    <p><?= $case['s_desc_'.$lang_id] ?></p>
                </div>
        <?php endforeach; ?>
    </div>

    <?php if (isset($pagination_settings)) :?>
        <?= PaginationWidget::widget($pagination_settings) ?>
    <?php endif; ?>