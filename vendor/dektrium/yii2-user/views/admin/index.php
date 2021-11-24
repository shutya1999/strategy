<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;


/**
 * @var \yii\web\View $this
 * @var \yii\data\ActiveDataProvider $dataProvider
 * @var \dektrium\user\models\UserSearch $searchModel
 */

$this->title = Yii::t('user', 'Manage users');
$this->params['breadcrumbs'][] = $this->title;

//переключение между обычным пользователем и менеджером
//if(Yii::$app->user->identity->id == 1){
//    return '<div class="text-center">
//                            <form method="post">
//    <input type="hidden" name="role" value="'.$model->role.'">
//    <input type="hidden" name="id" value="'.$model->id.'">
//    <input class="btn btn-default btn-xs btn-block" type="submit" value="'.$userRole.'" name="switchRole">
//                            </form>
//                        </div>';
//}else{
//    return $userRole;
//}
if(isset($_POST['switchRole'])){
    $dataSwitch = \dektrium\user\models\User::find()->where(['id' => $_POST['id']])->one();
    $dataSwitch->role = $_POST['role'] ? 0 : 1;
    $dataSwitch->save();
    $dataSwitchProfile = \app\models\Profile1::find()->where(['user_id' => $_POST['id']])->one();
    if($dataSwitchProfile){
        $dataSwitchProfile->manager = $_POST['role'] ? 0 : 1;
        $dataSwitchProfile->save();
    }else{
        $dataSwitchProfile = new \app\models\Profile1();
        $dataSwitchProfile->user_id = $_POST['id'];
        $dataSwitchProfile->code = '-';
        $dataSwitchProfile->date = '-';
        $dataSwitchProfile->period = 1;
        $dataSwitchProfile->program = '-';
        $dataSwitchProfile->payment = 1;
        $dataSwitchProfile->payment_date = '-';
        $dataSwitchProfile->card_num = 0;
        $dataSwitchProfile->surname = '-';
        $dataSwitchProfile->name = '-';
        $dataSwitchProfile->midname = '-';
        $dataSwitchProfile->birth = '-';
        $dataSwitchProfile->address = '-';
        $dataSwitchProfile->pasport = '-';
        $dataSwitchProfile->pasport_date = '-';
        $dataSwitchProfile->code_id = '-';
        $dataSwitchProfile->company = '-';
        $dataSwitchProfile->job = '-';
        $dataSwitchProfile->tel = '-';
        $dataSwitchProfile->mail = '-';
        $dataSwitchProfile->manager = $_POST['role'] ? 0 : 1;
        $dataSwitchProfile->save();
    }

    $admins = \dektrium\user\models\User::find()->where(['role' => 1])->all();
    $adminsString = '';
    foreach($admins as $tmp){$adminsString = $adminsString."'".$tmp->username."',";}
    file_put_contents(Yii::getAlias('@app/config/').'admins.php',"<?php return ['name' => [".$adminsString."],];");
    exit('<meta http-equiv="refresh" content="0; url=/user/admin/index" />');
}

$promo = \app\models\Promo::find()->all();

?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<?= $this->render('/admin/_menu') ?>

<?php Pjax::begin() ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel'  => $searchModel,
    'layout'       => "{items}\n{pager}",
    'columns' => [
        [
            'attribute' => 'id',
            'headerOptions' => ['style' => 'width:90px;'], # 90px is sufficient for 5-digit user ids
        ],

//        [
//            'attribute' => 'parent_id',
//            'label' => 'Реферал',
//            'headerOptions' => ['style' => 'width:90px;'],
//            'value' => function($model){
//    if($model->parent_id == 0){return '';}else{return $model->parent_id;}
//            },
//        ],

        'username',
        'email:email',
//        [
//            'attribute' => 'registration_ip',
//            'value' => function ($model) {
//                return $model->registration_ip == null
//                    ? '<span class="not-set">' . Yii::t('user', '(not set)') . '</span>'
//                    : $model->registration_ip;
//            },
//            'format' => 'html',
//        ],
        [
            'attribute' => 'created_at',
            'value' => function ($model) {
                if (extension_loaded('intl')) {
                    return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
                } else {
                    return date('Y-m-d G:i:s', $model->created_at);
                }
            },
        ],

//        [
//          'attribute' => 'last_login_at',
//          'value' => function ($model) {
//            if (!$model->last_login_at || $model->last_login_at == 0) {
//                return Yii::t('user', 'Never');
//            } else if (extension_loaded('intl')) {
//                return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->last_login_at]);
//            } else {
//                return date('Y-m-d G:i:s', $model->last_login_at);
//            }
//          },
//        ],

//        ['label'=>'BanlID','format' => 'raw','value'=>function($dat){
//    $bankId = \app\models\Bankid::find()->where(['user_id'=>$dat->id])->one();
//    if($bankId != null){
//        $string = '';
//        if($bankId->scan_foto != '-'){$string = $string.'<form action="/admin/download" method="post"><input type="hidden" name="file" value="'.$bankId->scan_foto.'"><input class="btn btn-default btn-xs btn-block" type="submit" value="Фото"></form>';}
//        if($bankId->scan_inn != '-'){$string = $string.'<form action="/admin/download" method="post"><input type="hidden" name="file" value="'.$bankId->scan_inn.'"><input class="btn btn-default btn-xs btn-block" type="submit" value="ИНН"></form>';}
//        if($bankId->scan_passport != '-'){$string = $string.'<form action="/admin/download" method="post"><input type="hidden" name="file" value="'.$bankId->scan_passport.'"><input class="btn btn-default btn-xs btn-block" type="submit" value="Паспорт"></form>';}
//        return $string;
//    }else{return '';}
//        }],


//        [
//            'header' => Yii::t('user', 'Confirmation'),
//            'value' => function ($model) {
//                if ($model->isConfirmed) {
//                    return '<div class="text-center">
//                                <span class="text-success">' . Yii::t('user', 'Confirmed') . '</span>
//                            </div>';
//                } else {
//                    return Html::a(Yii::t('user', 'Confirm'), ['confirm', 'id' => $model->id], [
//                        'class' => 'btn btn-xs btn-success btn-block',
//                        'data-method' => 'post',
//                        'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
//                    ]);
//                }
//            },
//            'format' => 'raw',
//            'visible' => Yii::$app->getModule('user')->enableConfirmation,
//        ],

        [
            'header' => 'Роль',
            'value' => function ($model) {
                $userRoleArr = ['Обычный', 'Админ', 'Менеджер'];
                $userRole = $userRoleArr[$model->role]; //название роли для вывода
                return $userRole;
            },
            'format' => 'raw',
            'visible' => Yii::$app->getModule('user')->enableConfirmation,
        ],

        [
            'header' => 'Промо-код',
            'value' => function ($model) use($promo) {
    foreach ($promo as $item){
        if($item->name == $model->promo_id){$code = $item->val;}
    }
                return $model->promo_id.' ('.$code.')';
            },
            'format' => 'raw',
            'visible' => Yii::$app->getModule('user')->enableConfirmation,
        ],

        [
            'header' => Yii::t('user', 'Block status'),
            'value' => function ($model) {
                if ($model->isBlocked) {
                    return Html::a(Yii::t('user', 'Unblock'), ['block', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?'),
                    ]);
                } else {
                    return Html::a(Yii::t('user', 'Block'), ['block', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-danger btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?'),
                    ]);
                }
            },
            'format' => 'raw',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{switch} {resend_password} {update} {delete}',
            'buttons' => [
                'resend_password' => function ($url, $model, $key) {
                    if (\Yii::$app->user->identity->isAdmin && !$model->isAdmin) {
                        return '
                    <a data-method="POST" data-confirm="' . Yii::t('user', 'Are you sure?') . '" href="' . Url::to(['resend-password', 'id' => $model->id]) . '">
                    <span title="' . Yii::t('user', 'Generate and send new password to user') . '" class="glyphicon glyphicon-envelope">
                    </span> </a>';
                    }
                },
                'switch' => function ($url, $model) {
                    if(\Yii::$app->user->identity->isAdmin && $model->id != Yii::$app->user->id && Yii::$app->getModule('user')->enableImpersonateUser && ($model->parent_id == Yii::$app->user->identity->id OR Yii::$app->user->identity->id == 1)) {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ['/user/admin/switch', 'id' => $model->id], [
                            'title' => Yii::t('user', 'Become this user'),
                            'data-confirm' => Yii::t('user', 'Are you sure you want to switch to this user for the rest of this Session?'),
                            'data-method' => 'POST',
                        ]);
                    }
                }
            ]
        ],
    ],
]); ?>

<?php Pjax::end() ?>
