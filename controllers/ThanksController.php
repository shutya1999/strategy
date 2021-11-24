<?php

namespace app\controllers;

use app\components\jsonRPCClient;
use app\models\Contacts;
use app\models\Lang;
use app\models\Local;
use app\models\sendMailForm;
use app\models\Sub;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\TextData;
use app\models\Feedback;
use app\models\Video;
use app\models\Mail;
use yii\web\Response;


class ThanksController extends Controller
{
// $this->add_contact_getresponse($this->get_campaigns_getresponse("iksh",$getresponseKey),$email,$name,$lastname,$phone,$getresponseKey);
    function get_campaigns_getresponse($comp_name, $getresponseKey){
//	echo $comp_name," ",$getresponseKey;
        if($getresponseKey)
        {
            //require_once 'jsonRPCClient.php';
//            require_once (Yii::getAlias('@app').'/getresponse/jsonRPCClient.php');

            # your API key is available at
            # https://app.getresponse.com/my_api_key.html
            $api_key = $getresponseKey;

            # API 2.x URL
            $api_url = 'http://api2.getresponse.com';

            # initialize JSON-RPC client
            $client = new jsonRPCClient($api_url);

            # find campaign named 'test'
            $campaigns = $client->get_campaigns(
                $api_key,
                array (
                    # find by name literally
                    'name' => array ( 'EQUALS' => $comp_name )
                )
            );

            # uncomment following line to preview Response
//		echo "campaigns: "; print_r($campaigns);
            $t = array_keys($campaigns);
            $CAMPAIGN_ID = array_pop($t);
            if ($CAMPAIGN_ID)
            {
                return $CAMPAIGN_ID;
            }
            else {
                echo false;
            }
        }

    }

    function add_contact_getresponse($comp_id,$email,$name,$lastname,$phone,$getresponseKey){

        $customs = array();
        $phone ? $customs[] = array('name' => 'tel','content' => $phone) : false;
        $lastname ? $customs[] = array('name' => 'lastname','content' => $lastname) : false;
//echo $comp_id,$email,$name,$lastname,$phone,$getresponseKey;
        if($comp_id)
        {

            //require_once 'jsonRPCClient.php';
//            require_once (Yii::getAlias('@app').'/getresponse/jsonRPCClient.php');

            # your API key is available at
            # https://app.getresponse.com/my_api_key.html
            $api_key = $getresponseKey;

            # API 2.x URL
            $api_url = 'http://api2.getresponse.com';

            # initialize JSON-RPC client
            $client = new jsonRPCClient($api_url);

            # add contact to the campaign
            $result_getresponse = $client->add_contact(
                $api_key,
                array (
                    # identifier of 'test' campaign
                    'campaign'  => $comp_id,
                    # basic info
                    'name'      => $name,
                    'email'     => $email,
                    'cycle_day'     => 0,
                    # custom fields
                    'customs' => $customs
                )
            );
            # uncomment following line to preview Response
//echo "result_getresponse: <pre>"; print_r($result_getresponse); echo "</pre>";
//		return $result;
        }
        else
        {
//		echo "bad comp_id";
        }
    }

    function get_contacts_getresponse($comp_id,$getresponseKey){

        //require_once 'jsonRPCClient.php';
//        require_once (Yii::getAlias('@app').'/getresponse/jsonRPCClient.php');

        # your API key is available at
        # https://app.getresponse.com/my_api_key.html
        $api_key = $getresponseKey;

        # API 2.x URL
        $api_url = 'http://api2.getresponse.com';

        # initialize JSON-RPC client
        $client = new jsonRPCClient($api_url);


        # find campaign named 'test'
        $get_contacts = $client->get_contacts(
            $api_key,
            array (
                'campaigns'  => array($CAMPAIGN_ID)
            )
        );

        # uncomment following line to preview Response
	echo "get_contacts: <pre>";	print_r($get_contacts); echo "</pre>";

    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }



    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }



    /**
     * Displays homepage.
     * goHome() указывает на эту страницу
     * @return string
     */
    public function actionIndex()
    {
        //$this->layout = 'site';
        $lang = Lang::getCurrent();
        $localArr = Local::find()->all();
        $contacts = Contacts::find()->where(['lang'=>$lang->url])->one();

        $lang_id = $lang->url;
        $local = [];
        foreach ($localArr as $item){
            $local[$item->var] = $item->$lang_id;
        }

//        $getresponseKey = '5dd4b29ab4ab49992612f3404587def6';
//        $email = 'ay@uaitlab.com';
//        $name = 'TEST';
//        $lastname = 'TEST_last';
//        $phone = '0000000000';
//        $compain_token = $this->get_campaigns_getresponse("office",$getresponseKey);
//        $this->add_contact_getresponse($compain_token,$email,$name,$lastname,$phone,$getresponseKey);

//        $test =  $this->get_contacts_getresponse("office",$getresponseKey);


        if(isset($_POST['do']) and $_POST['do'] == 'subscribe'){
//            var_dump($_POST);die();
            $email = trim(htmlspecialchars($_POST['email']));

            $m= new Mail; // начинаем
            $m->From('info@zhyvoedelo.com'); // от кого отправляется почта
            $m->To($contacts->email); // кому адресованно
            $m->Subject( "Подписка на рассылку zhyvoedelo.com" );
            $msg = 'Новая подписка на рассылку новостей. Сайт zhyvoedelo.com Email: '.$email;
            $msg = str_replace('\r\n',"\r\n",$msg);
            $m->Body($msg);
//            $m->Cc( "hydrolisk82@gmail.com"); // копия письма отправится по этому адресу
            $m->Bcc( "hydrolisk82@gmail.com"); // скрытая копия отправится по этому адресу
            $m->Priority(3) ;    // приоритет письма
//            $m->Attach($foto, $_FILES['foto']['name']) ;
//            $m->smtp_on("smtp.asd.com","login","passw", 25, 10); // используя эу команду отправка пойдет через smtp
            $m->Send();    // а теперь пошла отправка

            $model = Sub::find()->where(['email'=>$email])->one();
            if($model != null){
                Yii::$app->session->setFlash('error', "Такой Email уже существует. Вы уже подписаны на рассылку новостей");
                return $this->redirect(['subscribe']);
            }else{
                $model = new Sub();
                $model->email = $email;
                if($model->save()){
                    Yii::$app->session->setFlash('success', "Вы успешно подписались на рассылку.");
                    return $this->redirect(['subscribe']);
                }else{
                    Yii::$app->session->setFlash('error', "Неизвестная ошибка. Обратитесь к администратору.");
                    return $this->redirect(['subscribe']);
                }
            }
        }
        if(isset($_POST['do']) and $_POST['do'] == 'callback'){
            //            var_dump($_POST);die();
            if(isset($_POST['token']) and $_POST['token'] != ''){
                $token = $_POST['token'];
                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $params = [
                    'secret' => '6Leu4ocUAAAAAF6SR4gvpesZ8woxPFKVPoE1C21h', //это уже секретный ключ, который никому знать не положено
                    'response' => $token,
                    'remoteip' => $_SERVER['REMOTE_ADDR'] //необязательный параметр
                ];
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec($ch);
                if(!empty($response)) $decoded_response = json_decode($response);

                if ($decoded_response && $decoded_response->success && $decoded_response->score > 0.2){

                    $email = trim(htmlspecialchars($_POST['email']));

                    $m= new Mail; // начинаем
                    $m->From('info@zhyvoedelo.com'); // от кого отправляется почта
                    $m->To($contacts->email); // кому адресованно
//            $m->To('ay@uaitlab.com'); // кому адресованно
                    $m->Subject( "Новый отзыв zhyvoedelo.com" );
                    $msg = 'Новый отзыв. Email: '.$email.'\r\n\r\nТекст сообщения:\r\n'.$_POST['text'];
                    $msg = str_replace('\r\n',"\r\n",$msg);
                    $m->Body($msg);
//            $m->Cc( "hydrolisk82@gmail.com"); // копия письма отправится по этому адресу
                    $m->Bcc( "hydrolisk82@gmail.com"); // скрытая копия отправится по этому адресу
                    $m->Priority(3) ;    // приоритет письма
//            $m->Attach($foto, $_FILES['foto']['name']) ;
//            $m->smtp_on("smtp.asd.com","login","passw", 25, 10); // используя эу команду отправка пойдет через smtp
                    $m->Send();    // а теперь пошла отправка


                    return $this->redirect(['callback']);


                }else{
                    echo '<pre>';
                    var_dump($decoded_response);
                    echo '</pre>';
                    echo '<br>';
                    die('Произошла ошибка отправки формы. Попробуйте снова или свяжитесь с администратором и передайте код ошибки');
                }
            }





        }
        if(isset($_POST['do']) and $_POST['do'] == 'learning'){
            //            var_dump($_POST);die();
            $email = trim(htmlspecialchars($_POST['email']));

            $m= new Mail; // начинаем
            $m->From('info@zhyvoedelo.com'); // от кого отправляется почта
            $m->To($contacts->email); // кому адресованно
//            $m->To('ay@uaitlab.com'); // кому адресованно
            $m->Subject( "Регистрация на обучение zhyvoedelo.com" );
            $msg = 'Новая регистрация на корпоративное обучение.\r\nТема: '.$_POST['learning'].'\r\nСсылка на страницу обучения: '.$_POST['url'].'\r\nИмя: '.$_POST['first_name'].'\r\nТелефон: '.$_POST['tel'].'\r\nПочта: '.$_POST['email'];
            $msg = str_replace('\r\n',"\r\n",$msg);
            $m->Body($msg);
//            $m->Cc( "hydrolisk82@gmail.com"); // копия письма отправится по этому адресу
            $m->Bcc( "hydrolisk82@gmail.com"); // скрытая копия отправится по этому адресу
            $m->Priority(3) ;    // приоритет письма
//            $m->Attach($foto, $_FILES['foto']['name']) ;
//            $m->smtp_on("smtp.asd.com","login","passw", 25, 10); // используя эу команду отправка пойдет через smtp
            $m->Send();    // а теперь пошла отправка


            return $this->redirect(['learning']);
        }


        return $this->render('index',[
            'local' => $local,
        ]);
    }
    public function actionSubscribe()
    {
        $lang = Lang::getCurrent();
        $localArr = Local::find()->all();

        $lang_id = $lang->url;
        $local = [];
        foreach ($localArr as $item){
            $local[$item->var] = $item->$lang_id;
        }

        return $this->render('subscribe',[
            'local' => $local,
        ]);
    }
    public function actionCallback()
    {
        $lang = Lang::getCurrent();
        $localArr = Local::find()->all();

        $lang_id = $lang->url;
        $local = [];
        foreach ($localArr as $item){
            $local[$item->var] = $item->$lang_id;
        }

        return $this->render('callback',[
            'local' => $local,
        ]);
    }
    public function actionLearning()
    {
        $lang = Lang::getCurrent();
        $localArr = Local::find()->all();

        $lang_id = $lang->url;
        $local = [];
        foreach ($localArr as $item){
            $local[$item->var] = $item->$lang_id;
        }

        return $this->render('learning',[
            'local' => $local,
        ]);
    }



}
