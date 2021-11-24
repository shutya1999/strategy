<?php
use yii\helpers\VarDumper;
use yii\widgets\Breadcrumbs;
$this->registerCssFile('@web/css/case.css', ['depends' => \app\assets\AppAsset::class]);

$this->params['breadcrumbs'][] = 'Кейси';
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
            <div class="item active" data-nav-id="organi_samovryaduvanya">Органи самововрядування</div>
            <div class="item" data-nav-id="gromadski_organizaciy">Громадські органзації</div>
            <div class="item" data-nav-id="biznes">Бізнес</div>
        </div>
    </div>

    <div class="case-catalog">
        <?php foreach ($cases as $case): ?>
            <div class="item show">
                <div class="img">
                    <picture>
                        <source srcset="/img/index/<?= $case['preview'] ?>.webp" type="image/webp">
                        <source srcset="/img/index/<?= $case['preview'] ?>.jpg" type="image/jpeg">
                        <img src="/img/index/<?= $case['preview'] ?>.jpg" alt="Стратегічна сесія для Mashable">
                    </picture>
                </div>
                <h2 class="h5"><?= $case['title_ua'] ?></h2>
                <p><?= $case['s_desc_ua'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="pagination">
        <div class="btn btn-border">Завантажити більше</div>
        <div class="pagination-content">
            <a href="" class="pagin-elem arrow prev">Назад</a>
            <a href="" class="pagin-elem">1</a>
            <a href="" class="pagin-elem">2</a>

            <p class="dots">...</p>

            <a href="" class="pagin-elem active">7</a>
            <a href="" class="pagin-elem">8</a>

            <a href="" class="pagin-elem arrow next">Вперед</a>
        </div>

    </div>