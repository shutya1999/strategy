<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
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

                                'id',
                                //'name',
                                'name_ua',
                                'name_ru',
                                ['attribute'=>'url_ua','format'=>'raw','value'=>function($dat){
                            return '<a href="/'.$dat->url_ua.'" target="_blanc">'.$dat->url_ua.'</a>';
                                }],
                                ['attribute'=>'url_ru','format'=>'raw','value'=>function($dat){
                            return '<a href="/ru/'.$dat->url_ru.'" target="_blanc">'.$dat->url_ru.'</a>';
                                }],
                                'active',
                                //'code',
                                //'flmodel',
                                //'originalgoods_ref',
                                //'storagemeasures_ref',
                                //'salemeasures_ref',
                                //'length',
                                //'width',
                                //'height',
                                //'shopprice',
                                //'discountprice',
                                //'discountenddate',
                                //'rootinventorygroup_ref',
                                //'inventorygroup_ref',
                                //'trademarkregions_ref',
                                //'trademarkregionsname',
                                //'text:ntext',
                                //'title',
                                //'des',
                                //'title_og',
                                //'des_og',

                                //['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
                                ['format'=>'raw','value'=>function($dat){
                                    return '<a href="/admin/product_edit?id='.$dat->id.'" title="Оновити" aria-label="Оновити" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
                                }],
                            ],
                        ]); ?>


                    </div><!-- /.box-body -->
                </div>


            </div>
        </div>
    </div>
</div>
