<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin_strategy\models\CasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кейси';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <p>
                    <?= Html::a('Додати кейс', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="box-body">
                <div class="cases-index">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'product_id',
                            'preview',
                            'title_ua',
                            's_desc_ua',
                            //'title_ru',
                            //'s_desc_ru',
                            //'title_en',
                            //'s_desc_en',
                            //'active',
                            //'url:url',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

