<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use app\models\Mail;
use dektrium\user\helpers\Password;
use dektrium\user\models\Token;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\rsa_crypt;
use dektrium\user\Finder;
use dektrium\user\models\RegistrationForm;
use dektrium\user\models\ResendForm;
use dektrium\user\models\User;
use dektrium\user\Mailer;
use yii\base\Model;
use dektrium\user\traits\AjaxValidationTrait;
use dektrium\user\traits\EventTrait;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


$request = file_get_contents( 'php://input' ); //прослушивать входящие

$request = json_decode( $request, TRUE );

$client_id = '2871b201-869a-4114-ac87-2a121fdc29ba';
$client_secret = 'NTFkZGMyNWYtMDkwYS00NTkxLTg1MWEtNzQ5MzZiY2JiMTEx';

//ob_flush();
//ob_start();
//var_dump($request);
//file_put_contents(Yii::getAlias('@app/web/').'BankID.txt', ob_get_flush(), FILE_APPEND);

if(isset($_GET['code'])){
    $myCurl = curl_init();
    curl_setopt_array($myCurl, array(
        CURLOPT_URL => 'https://bankid.privatbank.ua/DataAccessService/oauth/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query([
            'grant_type'=>'authorization_code',
            'client_id'=>$client_id,
            'client_secret'=>hash('sha512',$client_id.$client_secret.$_GET['code']),
            'code'=>$_GET['code'],
            'redirect_uri'=>'https://sviy.doctor/user/register',
        ])
    ));
    $response = curl_exec($myCurl);
    curl_close($myCurl);
    $data = json_decode( $response, TRUE );

//    ob_flush();
//    ob_start();
//    var_dump($response);
    file_put_contents(Yii::getAlias('@app/web/').'BankID.txt', 'Авторизация: '.$response."\r\n", FILE_APPEND);




    //если пришел access_token делаем запрос данных пользователя
    if(isset($data['access_token'])){
        $access_token = $data['access_token'];
        $headers = [
            "charset=\"utf-8\"",
            "Authorization: Bearer ".$data['access_token'].", Id ".$client_id,
            "Content-type: application/json",
            "Accept: application/json"
        ];
        $post = '{"type":"physical","fields":["firstName","middleName","lastName","phone","inn","birthDay","sex","email","resident"],"addresses":[{"type":"juridical","fields":["country","state","area","city","street","houseNo","flatNo","dateModification"]},{"type":"birth","fields":["country","state","area","city","street","houseNo","flatNo","dateModification"]}],"scans":[{"type":"passport","fields":["link","extension"]},{"type":"inn","fields":["link","extension"]},{"type":"personalPhoto","fields":["link","extension"]}]}';
        $myCurl = curl_init();
        curl_setopt_array($myCurl, array(
            CURLOPT_URL => 'https://bankid.privatbank.ua/ResourceService/checked/data',
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post
        ));
        $response = curl_exec($myCurl);
        curl_close($myCurl);

        file_put_contents(Yii::getAlias('@app/web/').'BankID.txt', 'Ответ банкID: '.$response."\r\n", FILE_APPEND);

        $data = json_decode( $response, TRUE );
        $crypt = new rsa_crypt();
        $lastName = $crypt->decrypt($data['customer']['lastName']);
        $firstName = $crypt->decrypt($data['customer']['firstName']);
        $middleName = $crypt->decrypt($data['customer']['middleName']);
        $phone = $crypt->decrypt($data['customer']['phone']);
        $birthDay = $crypt->decrypt($data['customer']['birthDay']);
        $inn = $crypt->decrypt($data['customer']['inn']);
        $edrpou = $crypt->decrypt($data['customer']['edrpou']);
        $email = $crypt->decrypt($data['customer']['email']);
        $sex = $crypt->decrypt($data['customer']['sex']);
        $resident = $crypt->decrypt($data['customer']['resident']);

        $addressesJ = [];
        $addressesB = [];
        if($data['customer']['addresses'][0]['type'] == 'juridical'){
            $addressesJ['country'] = $crypt->decrypt($data['customer']['addresses'][0]['country']);
            $addressesJ['state'] = $crypt->decrypt($data['customer']['addresses'][0]['state']);
            $addressesJ['city'] = $crypt->decrypt($data['customer']['addresses'][0]['city']);
            $addressesJ['street'] = $crypt->decrypt($data['customer']['addresses'][0]['street']);
            $addressesJ['houseNo'] = $crypt->decrypt($data['customer']['addresses'][0]['houseNo']);
            $addressesJ['flatNo'] = $crypt->decrypt($data['customer']['addresses'][0]['flatNo']);
            $addressesJ['dateModification'] = $crypt->decrypt($data['customer']['addresses'][0]['dateModification']);
            $addressesB['country'] = $crypt->decrypt($data['customer']['addresses'][1]['country']);
            $addressesB['state'] = $crypt->decrypt($data['customer']['addresses'][1]['state']);
            $addressesB['city'] = $crypt->decrypt($data['customer']['addresses'][1]['city']);
            $addressesB['street'] = $crypt->decrypt($data['customer']['addresses'][1]['street']);
            $addressesB['houseNo'] = $crypt->decrypt($data['customer']['addresses'][1]['houseNo']);
            $addressesB['flatNo'] = $crypt->decrypt($data['customer']['addresses'][1]['flatNo']);
            $addressesB['dateModification'] = $crypt->decrypt($data['customer']['addresses'][1]['dateModification']);
        }else{
            $addressesJ['country'] = $crypt->decrypt($data['customer']['addresses'][1]['country']);
            $addressesJ['state'] = $crypt->decrypt($data['customer']['addresses'][1]['state']);
            $addressesJ['city'] = $crypt->decrypt($data['customer']['addresses'][1]['city']);
            $addressesJ['street'] = $crypt->decrypt($data['customer']['addresses'][1]['street']);
            $addressesJ['houseNo'] = $crypt->decrypt($data['customer']['addresses'][1]['houseNo']);
            $addressesJ['flatNo'] = $crypt->decrypt($data['customer']['addresses'][1]['flatNo']);
            $addressesJ['dateModification'] = $crypt->decrypt($data['customer']['addresses'][1]['dateModification']);
            $addressesB['country'] = $crypt->decrypt($data['customer']['addresses'][0]['country']);
            $addressesB['state'] = $crypt->decrypt($data['customer']['addresses'][0]['state']);
            $addressesB['city'] = $crypt->decrypt($data['customer']['addresses'][0]['city']);
            $addressesB['street'] = $crypt->decrypt($data['customer']['addresses'][0]['street']);
            $addressesB['houseNo'] = $crypt->decrypt($data['customer']['addresses'][0]['houseNo']);
            $addressesB['flatNo'] = $crypt->decrypt($data['customer']['addresses'][0]['flatNo']);
            $addressesB['dateModification'] = $crypt->decrypt($data['customer']['addresses'][0]['dateModification']);
        }

        $model1 = \app\models\Bankid::find()->where(['phone'=>$phone])->one();
        if($model1 == null){
            $model1 = new \app\models\Bankid();
            $model1->user_id = 0;
            $model1->phone = $phone;
            $model1->scan_passport = '-';
            $model1->scan_inn = '-';
            $model1->scan_foto = '-';
        }
        $model1->last_name = $lastName;
        $model1->first_name = $firstName;
        $model1->middle_name = $middleName;
        $birthDay = date('Y-m-d', strtotime($birthDay));
        $model1->birth = $birthDay;
        $model1->inn = $inn;
        $model1->edrpou = $edrpou;
        $model1->email = $email;
        $model1->sex = $sex;
        $model1->resident = $resident;
        $model1->addr_juridical_country = $addressesJ['country'];
        $model1->addr_juridical_state = $addressesJ['state'];
        $model1->addr_juridical_city = $addressesJ['city'];
        $model1->addr_juridical_street = $addressesJ['street'];
        $model1->addr_juridical_house = $addressesJ['houseNo'];
        $model1->addr_juridical_flat = $addressesJ['flatNo'];
        $model1->addr_juridical_mod = $addressesJ['dateModification'];
        $model1->addr_birth_country = $addressesB['country'];
        $model1->addr_birth_state = $addressesB['state'];
        $model1->addr_birth_city = $addressesB['city'];
        $model1->addr_birth_street = $addressesB['street'];
        $model1->addr_birth_mod = $addressesB['dateModification'];
        if($model1->validate() and $model1->save()){
        }else{
            ob_flush();
            ob_start();
            var_dump($model1);
            file_put_contents(Yii::getAlias('@app/web/').'BankID_err.txt', ob_get_flush(), FILE_APPEND);
        }
        $md5 = md5($lastName.$firstName.$middleName.$email);

        //получение файла
        foreach ($data['customer']['scans'] as $item){
            $headers = [
                "Authorization: Bearer ".$access_token.", Id ".$client_id,
                "Accept: application/json"
            ];
            $link = $crypt->decrypt($item['link']);
            $ext = $crypt->decrypt($item['extension']);
            $name = $item['type'];
            $myCurl = curl_init();
            curl_setopt_array($myCurl, array(
                CURLOPT_URL => $link,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_FAILONERROR => 1,
                CURLOPT_FOLLOWLOCATION => 1,
                CURLOPT_TIMEOUT => 120,
            ));
            $response = curl_exec($myCurl);
            curl_close($myCurl);
            mkdir(Yii::getAlias('@app/scans/'.$md5));
            file_put_contents(Yii::getAlias('@app/scans/').$md5.'/'.$name.'.'.$ext,$response);
            if($item['type'] == 'passport'){
                $model1->scan_passport = $md5.'/'.$name.'.'.$ext;
                $model1->save();
            }
            if($item['type'] == 'personalPhoto'){
                $model1->scan_foto = $md5.'/'.$name.'.'.$ext;
                $model1->save();
            }
            if($item['type'] == 'inn'){
                $model1->scan_inn = $md5.'/'.$name.'.'.$ext;
                $model1->save();
            }
        }

//Создать профиль на сайте из полученных данных
        $profile1 = \app\models\Profile1::find()->where(['mail'=>$email])->one();
        if($profile1 == null){
            $profile1 = new \app\models\Profile1();
        }
        $profile1->user_id = $model1->user_id;
        $profile1->bankid_id = $model1->id;
        $profile1->surname = $lastName;
        $profile1->name = $firstName;
        $profile1->midname = $middleName;
        $profile1->birth = $birthDay;
        $profile1->address = $addressesJ['country'].' '.$addressesJ['state'].' '.$addressesJ['city'].' '.$addressesJ['street'].' '.$addressesJ['houseNo'].' '.$addressesJ['flatNo'];
        $profile1->mail = $email;
        $profile1->code_id = $inn;
        $profile1->save();

        if(!(Yii::$app->user->identity->id)){
            //отправить данные для регистрации пользователя
            $user = User::find()->where(['email'=>$email])->one();
            if($user != null){
                $user->bank_id = $model1->id;
                $user->save();
                $profile1->user_id = $user->id;
                $profile1->save();
                $model1->user_id = $user->id;
                $model1->save();
                //отправить письмо приветствия с паролем
                $contacts = \app\models\Contacts::find()->all();
                $m= new Mail; // начинаем
                $m->From( $contacts[1]->text ); // от кого отправляется почта
//$m->To( "office@zhyvoedelo.com" ); // кому адресованно
                $m->To( $email ); // кому адресованно
                $m->Subject( "Добро пожаловать в Kronabroker" );
                $msg = Yii::t('user', 'Hello').'\r\n'.Yii::t('user', 'Your account on {0} has been created', Yii::$app->name).'\r\n'.Yii::t('user', 'We have generated a password for you: ').$pass;
                $msg = str_replace('\r\n',"\r\n",$msg);
                $m->Body($msg);
//$m->Cc( ""); // копия письма отправится по этому адресу
//$m->Bcc( "hydrolisk82@gmail.com"); // скрытая копия отправится по этому адресу
                $m->Priority(3) ;    // приоритет письма
                $m->Send();    // а теперь пошла отправка

                //залогинить юзера
                Yii::$app->user->login($user);

                exit('<meta http-equiv="refresh" content="0; url=/user/login" />');
            }else{
                $user = new User();
                $user->email = $email;
                $user->username = 'user-'.date('U');
                $pass = Password::generate(6);
                $user->password_hash = Password::hash($pass);
                $user->registration_ip = $_SERVER['REMOTE_ADDR'];
                $user->created_at = date('U');
                $user->updated_at = date('U');
                $user->token = md5($lastName.date('U'));
                $user->auth_key = md5($email.date('U'));
                $user->bank_id = $model1->id;
                if(!$user->save()){
                    echo 'Приносим свои извинения. Произошла ошибка. Скопируйте текст ниже и свяжитесь с нами.';
                    echo '<br>';
                    echo '<pre>';
                    var_dump($user);
                    echo '</pre>';
                }else{
                    $profile1->user_id = $user->id;
                    $profile1->save();
                    $model1->user_id = $user->id;
                    $model1->save();
                    //отправить письмо приветствия с паролем
                    $contacts = \app\models\Contacts::find()->all();
                    $m= new Mail; // начинаем
                    $m->From( $contacts[1]->text ); // от кого отправляется почта
//$m->To( "office@zhyvoedelo.com" ); // кому адресованно
                    $m->To( $email ); // кому адресованно
                    $m->Subject( "Добро пожаловать в Kronabroker" );
                    $msg = Yii::t('user', 'Hello').'\r\n'.Yii::t('user', 'Your account on {0} has been created', Yii::$app->name).'\r\n'.Yii::t('user', 'We have generated a password for you: ').$pass;
                    $msg = str_replace('\r\n',"\r\n",$msg);
                    $m->Body($msg);
//$m->Cc( ""); // копия письма отправится по этому адресу
//$m->Bcc( "hydrolisk82@gmail.com"); // скрытая копия отправится по этому адресу
                    $m->Priority(3) ;    // приоритет письма
                    $m->Send();    // а теперь пошла отправка

                    //залогинить юзера
                    Yii::$app->user->login($user);

                    exit('<meta http-equiv="refresh" content="0; url=/user/login" />');
                }
            }


        }




    }else{
        echo 'Внимание!';
        echo '<br>';
        echo 'Ошибка: '.$data['error'];
        echo '<br>';
        echo 'Описание: '.$data['error_description'];
    }
}


/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

//$this->title = Yii::t('user', 'Sign up');
//$this->params['breadcrumbs'][] = $this->title;

?>

<section class="contact-section contact-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12 col-xs-12">
                <div class="contact-form">
                    <h2>Регистрация</h2>
                    <p>Введите адрес элетронной почты на который будет отправлен запрос на подтверждение</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'registration-form',
                        'options' => [
                            'class' => 'default-form'
                        ],
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                    ]); ?>

                    <?= $form->field($model, 'email',
                                            ['inputOptions' => ['class' => 'form-control']]) ?>

<!--                    --><?//= $form->field($model, 'username', ['inputOptions' => ['class' => '']]) ?>
                    <?= $form->field($model, 'username')->hiddenInput(['value'=> 'user-'.date('U')])->label(false); ?>

                    <?php if ($module->enableGeneratingPassword == false): ?>
                        <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control']])->passwordInput() ?>
                    <?php endif ?>

                    <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                    <?php ActiveForm::end(); ?>
                    <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>

                </div>
                <div class="contact-form">
                    <br>
                    <br>
<!--                    <div>-->
<!--                        <h2>Регистрация через BankID</h2>-->
<!--                        <p>Вы можете создать учетную запись используя сервис <a href="http://bankid.org.ua/#anchor3" target="_blank">BankID</a>. В этом случае большая часть данных для заключения договора будет автоматически взята у вашего банка.</p>-->
<!--                    </div>-->
<!--                    <div class="link-btn bankid">-->
<!--                        <a href="https://bankid.privatbank.ua/DataAccessService/das/authorize?response_type=code&client_id=2871b201-869a-4114-ac87-2a121fdc29ba&redirect_uri=https://sviy.doctor/user/register" class=""><img-->
<!--                                    src="/images/logo-c.png" alt="BankID"></a>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>


