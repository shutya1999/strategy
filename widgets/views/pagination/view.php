<?php
$pageUrl = '/' . $lang_url . Yii::$app->getRequest()->pathInfo;
?>

<div class="pagination">
    <?php if ($next_page): ?>
        <div class="btn btn-border <?= $btnMoreName ?>" data-current-page="<?= $next_page ?>" data-id="">Завантажити більше</div>
    <?php endif; ?>
    <div class="pagination-content">

        <?php if ($prev_page) :?>
            <a href="<?= $link . "&page=" . $prev_page ?>" class="pagin-elem arrow prev">Назад</a>
        <?php else: ?>
            <p class="pagin-elem arrow prev">Назад</p>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pageTotal; $i++): ?>
            <?php $active = ($i == $currentPage) ? 'active' : '' ?>
            <a href="<?= $link . "&page=" . $i?>" class="pagin-elem <?= $active ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($next_page) :?>
            <a href="<?= $link . "&page=" . $next_page ?>" class="pagin-elem arrow next">Вперед</a>
        <?php else: ?>
            <p class="pagin-elem arrow next">Вперед</p>
        <?php endif; ?>

    </div>
</div>
