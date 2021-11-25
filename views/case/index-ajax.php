<?php
$lang_id = $lang->url;
$lang_url = ($lang->url == 'ua') ? '' : $lang->url . "/" ;
?>

<?php foreach ($cases as $case): ?>
    <div class="item">
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