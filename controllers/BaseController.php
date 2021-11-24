<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 24.11.2021
 * Time: 21:32
 */

namespace app\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
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
}