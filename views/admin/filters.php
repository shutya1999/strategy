<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Атрибуты (фильтры)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="content">
        <div class="row">
            <div class="col-md-12">


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                'name',
                                'name_ua',
                                'name_ru',
                                'url_ua',
                                'url_ru',
                                ['attribute'=>'menu_show','format'=>'raw','value'=>function($dat){
                                    if($dat->menu_show){
                                        return 'да';
                                    }else{
                                        return 'отключено';
                                    }
                                }],
                                ['attribute'=>'page_show','format'=>'raw','value'=>function($dat){
                                    if($dat->page_show){
                                        return 'да';
                                    }else{
                                        return 'отключено';
                                    }
                                }],

                                //['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
                                ['format'=>'raw','value'=>function($dat){
                                    return '<a href="/admin/filter_edit?id='.$dat->id.'" title="Оновити" aria-label="Оновити" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
                                }],
                            ],
                        ]); ?>


                    </div><!-- /.box-body -->
                </div>


            </div>
        </div>
    </div>
</div>
