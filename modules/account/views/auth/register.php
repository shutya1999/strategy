<?php
/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<? $form = ActiveForm::begin(['method' => 'post']) ?>

<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-4">
        <div class="login-form">
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')
                ->textInput(['type' => 'password']) ?>
            <?= $form->field($model, 'cpassword')
                ->textInput(['type' => 'password']) ?>

            <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<? $form->end() ?>
