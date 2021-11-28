<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin_strategy\models\Cases */

$this->title = 'Update Cases: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
