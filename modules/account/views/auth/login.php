<?php
use app\models\forms\LoginModel;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/**
 * @var LoginModel $model
 */

?>


    <? $form = ActiveForm::begin() ?>
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-4">
            <div class="login-form">
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')
                    ->textInput(['type' => 'password']) ?>

                <?= Html::submitButton('Login', ['class' => 'btn btn-primary'])?>
                <?= Html::a('Register', ['/account/auth/register'], ['class' => 'btn btn-default btn-sm pull-right'])?>
            </div>
        </div>
    </div>
    <? $form->end() ?>

