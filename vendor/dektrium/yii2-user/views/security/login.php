<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use dektrium\user\models\Account;
use dektrium\user\models\User;
use app\models\Mail;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dektrium\user\helpers\Password;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

//$this->title = Yii::t('user', 'Sign in');
//$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<section class="contact-section contact-page pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="contact-form">
                    <h2>Авторизоваться</h2>
                    <p>Введите логин (email) и пароль</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => [
                            'class' => 'default-form'
                        ],
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'validateOnBlur' => false,
                        'validateOnType' => false,
                        'validateOnChange' => false,
                    ]) ?>

                    <?php if ($module->debug): ?>
                        <?= $form->field($model, 'login', [
                            'inputOptions' => [
                                'autofocus' => 'autofocus',
                                'class' => '',
                                'tabindex' => '1']])->dropDownList(LoginForm::loginList());
                        ?>

                    <?php else: ?>

                        <?= $form->field($model, 'login',
                            ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]
                        );
                        ?>

                    <?php endif ?>

                    <?php if ($module->debug): ?>
                        <div class="alert alert-warning">
                            <?= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
                        </div>
                    <?php else: ?>
                        <?= $form->field(
                            $model,
                            'password',
                            ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
                            ->passwordInput()
                            ->label(
                                Yii::t('user', 'Password')
                                . ($module->enablePasswordRecovery ?
                                    ' (' . Html::a(
                                        Yii::t('user', 'Forgot password?'),
                                        ['/user/recovery/request'],
                                        ['tabindex' => '5']
                                    )
                                    . ')' : '')
                            ) ?>
                    <?php endif ?>

                    <?= $form->field($model, 'rememberMe')->checkbox(['style' => 'width: 17px;height: 17px;', 'tabindex' => '3']) ?>

                    <?= Html::submitButton(
                        Yii::t('user', 'Sign in'),
                        ['class' => 'btn-one', 'tabindex' => '4', 'class'=>'btn btn-success']
                    ) ?>

                    <?php ActiveForm::end(); ?>


                    <?php if ($module->enableConfirmation): ?>
                        <div class="">
                            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
                        </div>
                    <?php endif ?>
                    <?php if ($module->enableRegistration): ?>
                        <div class="">
                            <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
                        </div>
                    <?php endif ?>


                    <?
                    $url = 'https://accounts.google.com/o/oauth2/auth';
                    $clientId = '222553063534-67f11scdusr82ib1gg3ijt809e5cvup9.apps.googleusercontent.com';
                    $client_secret = '4NXJy6A4iO75BiRRFUO3nnUW';
                    $redirect_uri = 'https://vzr.ic-ekta.com/user/login';
                    $params = array(
                        'redirect_uri'  => $redirect_uri,
                        'response_type' => 'code',
                        'client_id'     => $clientId,
                        'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
                    );

                    if (isset($_GET['code'])) {
                        $result = false;

                        $params = array(
                            'client_id'     => $clientId,
                            'client_secret' => $client_secret,
                            'redirect_uri'  => $redirect_uri,
                            'grant_type'    => 'authorization_code',
                            'code'          => $_GET['code']
                        );
                        $url = 'https://accounts.google.com/o/oauth2/token';
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_POST, 1);
                        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                        $result = curl_exec($curl);
                        curl_close($curl);

                        $tokenInfo = json_decode($result, true);

                        if (isset($tokenInfo['access_token'])) {
                            $params['access_token'] = $tokenInfo['access_token'];

                            $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
                            if (isset($userInfo['id'])) {
                                $userInfo = $userInfo;
                                $result = true;

                                $account = \dektrium\user\models\Account::find()->where(['client_id'=>$userInfo['id']])->one();
                                //проверяем есть ли уже соц.акк на сервере
                                if($account == null){
                                    $account = new Account();
                                    $account->provider = 'google';
                                    $account->client_id = $userInfo['id'];
                                    $account->data = json_encode($userInfo);
                                    $account->email = $userInfo['email'];
                                    $account->save();
                                }

                                //проверяем есть ли юзер
                                $user = User::find()->where(['email'=>$account->email])->one();
                                if($user == null){
                                    $user = new User();
                                    $user->username = $userInfo['email'];
                                    $user->email = $userInfo['email'];
                                    $pass = Password::generate(6);
                                    $user->password_hash = Password::hash($pass);
                                    $user->auth_key = md5($userInfo['email'].date('U'));
                                    $user->created_at = date('U');
                                    $user->updated_at = date('U');
                                    $user->confirmed_at = date('U');
                                    $user->parent_id = 0;
                                    $user->token = md5($userInfo['name'].date('U'));
                                    $user->save();
                                    //отправить письмо приветствия с паролем
                                    $contacts = \app\models\Contacts::find()->all();
                                    $m= new Mail; // начинаем
                                    $m->From( $contacts[1]->text ); // от кого отправляется почта
//$m->To( "office@zhyvoedelo.com" ); // кому адресованно
                                    $m->To( $userInfo['email'] ); // кому адресованно
                                    $m->Subject( "Добро пожаловать в vzr.ic-ekta.com" );
                                    $msg = Yii::t('user', 'Hello').'\r\n'.Yii::t('user', 'Your account on {0} has been created', Yii::$app->name).'\r\n'.Yii::t('user', 'We have generated a password for you: ').$pass;
                                    $msg = str_replace('\r\n',"\r\n",$msg);
                                    $m->Body($msg);
//$m->Cc( ""); // копия письма отправится по этому адресу
//$m->Bcc( "hydrolisk82@gmail.com"); // скрытая копия отправится по этому адресу
                                    $m->Priority(3) ;    // приоритет письма
                                    $m->Send();    // а теперь пошла отправка
                                }

                                //проверяем привязку. если соц.акк не привязан - привязать
                                if($account->user_id == null){
                                    $account->user_id = $user->id;
                                    $account->save();
                                }

                                //залогинить юзера
                                Yii::$app->user->login($user);
                                //и отправить на главную
                                exit('<meta http-equiv="refresh" content="0; url=/admin/index" />');

                            }
                        }
                    }



                    ?>


                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div>
                    <h2>Социальные сети</h2>
                    <p>Вы можете войти или зарегистрироваться <br>используя социальные сети.</p>
                    <div id="w0">
                        <ul class="auth-clients">
                            <li><a class="facebook auth-link" href="/user/auth?authclient=facebook" title="Facebook" data-popup-width="860" data-popup-height="480"><span class="auth-icon facebook"></span></a></li>
                            <li><a class="google auth-link" href="<?= $url ?>?<?= urldecode(http_build_query($params)) ?>" title="Google"><span class="auth-icon google"></span></a></li>
                        </ul>
                    </div>
                    <style>
                        .auth-icon {
                            display: block;
                            width: 32px;
                            height: 32px;
                            background: url('/images/authchoice.png') no-repeat;
                            border-radius: 3px;
                            margin: 0 auto;
                        }

                        .auth-icon.google {
                            background-position: 0 -34px;
                        }
                        .auth-icon.twitter {
                            background-position: 0 -68px;
                        }
                        .auth-icon.yandex {
                            background-position: 0 -102px;
                        }
                        .auth-icon.vkontakte {
                            background-position: 0 -136px;
                        }
                        .auth-icon.facebook {
                            background-position: 0 -170px;
                        }
                        .auth-icon.linkedin {
                            background-position: 0 -204px;
                        }
                        .auth-icon.github {
                            background-position: 0 -238px;
                        }
                        .auth-icon.live {
                            background-position: 0 -272px;
                        }

                        .auth-clients {
                            display: block;
                            margin: 0 0 1em;
                            list-style: none;
                            overflow: auto;
                        }

                        .auth-clients li {
                            float: left;
                            display: block;
                            margin: 0 1em 0 0;
                            text-align: center;
                        }

                        .auth-title {
                            display: block;
                            margin-top: 0.4em;
                            text-align: center;
                            width: 58px;
                        }
                    </style>
<?//= Connect::widget([
//'baseAuthUrl' => ['/user/security/auth'],
//]) ?>
                </div>
                <br>
                <br>



            </div>
        </div>
    </div>
</section>

<!--<div class="row">-->
<!--    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">-->
<!--        <div class="panel panel-default">-->
<!--            <div class="panel-heading">-->
<!--                <h3 class="panel-title">--><?//= Html::encode($this->title) ?><!--</h3>-->
<!--            </div>-->
<!--            <div class="panel-body">-->
<!--                --><?php //$form = ActiveForm::begin([
//                    'id' => 'login-form',
//                    'options' => [
//                        'class' => 'default-form'
//                    ],
//                    'enableAjaxValidation' => true,
//                    'enableClientValidation' => false,
//                    'validateOnBlur' => false,
//                    'validateOnType' => false,
//                    'validateOnChange' => false,
//                ]) ?>
<!---->
<!--                --><?php //if ($module->debug): ?>
<!--                    --><?//= $form->field($model, 'login', [
//                        'inputOptions' => [
//                            'autofocus' => 'autofocus',
//                            'class' => 'form-control',
//                            'tabindex' => '1']])->dropDownList(LoginForm::loginList());
//                    ?>
<!---->
<!--                --><?php //else: ?>
<!---->
<!--                    --><?//= $form->field($model, 'login',
//                        ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]
//                    );
//                    ?>
<!---->
<!--                --><?php //endif ?>
<!---->
<!--                --><?php //if ($module->debug): ?>
<!--                    <div class="alert alert-warning">-->
<!--                        --><?//= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
<!--                    </div>-->
<!--                --><?php //else: ?>
<!--                    --><?//= $form->field(
//                        $model,
//                        'password',
//                        ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
//                        ->passwordInput()
//                        ->label(
//                            Yii::t('user', 'Password')
//                            . ($module->enablePasswordRecovery ?
//                                ' (' . Html::a(
//                                    Yii::t('user', 'Forgot password?'),
//                                    ['/user/recovery/request'],
//                                    ['tabindex' => '5']
//                                )
//                                . ')' : '')
//                        ) ?>
<!--                --><?php //endif ?>
<!---->
<!--                --><?//= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>
<!---->
<!--                --><?//= Html::submitButton(
//                    Yii::t('user', 'Sign in'),
//                    ['class' => 'btn btn-primary btn-block', 'tabindex' => '4']
//                ) ?>
<!---->
<!--                --><?php //ActiveForm::end(); ?>
<!--            </div>-->
<!--        </div>-->
<!--        --><?php //if ($module->enableConfirmation): ?>
<!--            <p class="text-center">-->
<!--                --><?//= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
<!--            </p>-->
<!--        --><?php //endif ?>
<!--        --><?php //if ($module->enableRegistration): ?>
<!--            <p class="text-center">-->
<!--                --><?//= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
<!--            </p>-->
<!--        --><?php //endif ?>
<!--        --><?//= Connect::widget([
//            'baseAuthUrl' => ['/user/security/auth'],
//        ]) ?>
<!--    </div>-->
<!--</div>-->
