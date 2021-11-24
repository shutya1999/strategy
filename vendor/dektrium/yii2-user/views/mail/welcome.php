<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/**
 * @var dektrium\user\Module $module
 * @var dektrium\user\models\User $user
 * @var dektrium\user\models\Token $token
 * @var bool $showPassword
 *
 * Здравствуйте,
Ваш аккаунт на сайте vzr.ic-ekta.com  был успешно создан. Ваше имя пользователя:________ Пароль:________
P.S. Если вы получили это сообщение по ошибке, просто удалите его.
 *
 */
?>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= 'Здравствуйте' ?>,
</p>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= 'Ваш аккаунт на сайте <a href="https://'. $_SERVER['SERVER_NAME'] .'" target="_blanc">'.$_SERVER['SERVER_NAME'].'</a> был успешно создан. Ваше имя пользователя: ' ?>
    <strong><?= $user->username ?></strong>
    <?php if ($showPassword || $module->enableGeneratingPassword): ?>
        <?= ' Пароль: ' ?><strong><?= $user->password ?></strong>
    <?php endif ?>

</p>

<?php if ($token !== null): ?>
    <p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
        <?= Yii::t('user', 'In order to complete your registration, please click the link below') ?>.
    </p>
    <p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
        <?= Html::a(Html::encode($token->url), $token->url); ?>
    </p>
    <p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
        <?= Yii::t('user', 'If you cannot click the link, please try pasting the text into your browser') ?>.
    </p>
<?php endif ?>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= 'P.S. Если вы получили это сообщение по ошибке, просто удалите его.' ?>.
</p>
