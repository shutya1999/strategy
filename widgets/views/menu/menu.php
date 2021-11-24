<?php

//\yii\helpers\VarDumper::dump($menu);

?>


<div class="nav df">
    <div class="nav-top df">
        <p>Меню</p>
        <div class="lang-switcher">
            <a class="active" href="">Укр</a>
            <a href="">Рус</a>
            <a href="">Eng</a>
        </div>
    </div>
    <?php foreach ($menu as $item) :?>
        <?php if (isset($item['childs'])): ?>
            <div class="nav-item dropdown">
                <p class="nav-link"><?= $item['name_ua'] ?></p>
                <div class="dropdown-menu">
                    <?php foreach ($item['childs'] as $child) : ?>
                        <a href="<?= "$lang_link/" . $child['link']?>" class="dropdown-item"><?= $child['name_ua'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="nav-item">
                <a href="<?= "$lang_link/" . $item['link']?>" class="nav-link"><?= $item['name_ua'] ?></a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
