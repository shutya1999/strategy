<?php
use app\models\entities\Profile;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/**
 * @var Profile $profile
 */

?>

<? $form = ActiveForm::begin([
    'method' => 'post',
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]) ?>

<div class="row">
    <div class="col-md-6">
        <? if(!empty($profile->avatar)): ?>
            <?= Html::img('/images/avatars/' . $profile->avatar . '-thumb.jpg', [
                'class' => 'thumbnail'
            ]) ?>
        <? endif; ?>
        <?= $form->field($profile, 'avatarFile')->fileInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($profile, 'email') ?>
        <?= $form->field($profile, 'first_name') ?>
        <?= $form->field($profile, 'last_name') ?>
        <?= $form->field($profile, 'phone_number') ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary pull-right']) ?>
    </div>

</div>

<? $form->end() ?>
