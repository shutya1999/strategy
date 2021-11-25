<?php use app\widgets\PaginationWidget;?>

<?php if (isset($pagination_settings)) :?>
    <?= PaginationWidget::widget($pagination_settings) ?>
<?php endif; ?>
