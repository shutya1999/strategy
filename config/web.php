<?php
use dektrium\user\controllers\SecurityController;
use dektrium\user\events\AuthEvent;
use yii\base\Event;

$params = require(__DIR__ . '/params.php');
$db = require __DIR__ . '/db.php';
$admins = require __DIR__ . '/admins.php';

$config = [
    'id' => 'basic',
    'name'=>'oh423',
    'language' => 'en-EN',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        /*
        'account' => [
            'class' => 'app\modules\account\AccountModule',
//            'langProviderClass' => 'app\modules\LangProvider'
        ],
        */
        'user' => [
            //https://github.com/dektrium/yii2-user
            'class' => 'dektrium\user\Module',
            'mailer' => [
                'sender'                => ['info@jazzplay.kyivstar.ua' => 'Admin'],
                'welcomeSubject'        => 'Добро пожаловать в jazz',
                'confirmationSubject'   => 'Подтвердите ваш адрес',
                'reconfirmationSubject' => 'Запрос на смену пароля',
                'recoverySubject'       => 'ВосстановлcookieValidationKeyение пароля',
            ],
            'cost' => 12,
//            'admins' => ['admin','Artur'],
            'admins' => $admins['name'],
            'enableFlashMessages' => false,
            'enableConfirmation' => false,
            'enableGeneratingPassword' => true,
        ],
    ],
    'components' => [
        'language'=>'ru-RU',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@webroot/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/jquery-1.11.3.min.js',
                    ]
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VLyRxFtnYKTQcu6SjlLOUJfGG8g601sH',
            'enableCsrfValidation' => false,
            'baseUrl' => '/',
            'class' => 'app\components\LangRequest',
            
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
//            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
//            'class' => 'app\components\User',
            'identityClass' => 'dektrium\user\models\User',
            'loginUrl' => ['/user/security/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mx1.mirohost.net',
                'username' => 'info@zhyvoedelo.com',
                'password' => '_pass_',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class'=>'app\components\LangUrlManager',
            'rules'=>[
                ['class' => 'app\components\PageRule', 'connectionID' => 'db'],
                '/' => 'site/index',
                '/product/<url:[\w-]+>' => 'product/index',
                '/case' => 'case/index',
                '/case/<url:[\w-]+>' => 'case/view',
//                'blog/<id:\d+>' => 'blog/record', //url типа site.com/blog/23  - будет открываться: контроллер blog, экшн record и $_GET['id']=23
                //'<action>'=>'site/<action>',//убрать site из адресной строки
                '<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
            ]
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                // here is the list of clients you want to use
                // you can read more in the "Available clients" section
                /*
                'facebook' => [
                    //https://developers.facebook.com/apps/373927106800145/fb-login/settings/
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => '373927106800145',
                    'clientSecret' => '79e86143ad9e3d66e05cc4d48be8003d',
                ],


                'google' => [
                    //https://console.developers.google.com/apis/credentials?hl=ru&project=strahovka-200307&folder&organizationId
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => '222553063534-2g7dp7vs9bloksl5ubh46bne0ls7nchv.apps.googleusercontent.com',
                    'clientSecret' => 'VfW7oFDAWhGJBGAU7BcjuGxh',
                ],
                */
            ],
        ],
    ],
    'params' => $params,
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}


return $config;
