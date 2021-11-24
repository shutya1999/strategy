<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мета теги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-index">

    <div class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
<!--                        <p class="py-5">-->
                            <?//= Html::a('Create Meta', ['create'], ['class' => 'btn-light-blue']) ?>
<!--                        </p>-->
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'name',
                                'title',
                                'des',
                                'title_og',
                                'des_og',
                                //'img',
                                'comment',

                                ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
                            ],
                        ]); ?>
                    </div><!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
</div>
