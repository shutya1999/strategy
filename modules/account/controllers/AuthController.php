<?php
namespace app\modules\account\controllers;
use app\models\forms\LoginModel;
use app\models\forms\RegisterModel;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class AuthController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['register'],
                'rules' => [
                    [
                        'actions' => ['register'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }




    public function actionRegister() {
        $model = new RegisterModel();

        if(\Yii::$app->request->isPost) {
            if($model->load(\Yii::$app->request->post())) {
                if($model->register()) {
                    $this->redirect(['auth/login']);
                }
            }
        }

        return $this->render('register', [
            'model' => $model
        ]);
    }

    public function actionLogin() {
        $model = new LoginModel();

        if(\Yii::$app->request->isPost) {
            if($model->load(\Yii::$app->request->post())) {
                if($model->validate()) {
                    if($model->login()) {
                        //return $this->goHome();
                        exit('<meta http-equiv="refresh" content="0; url=/admin" />');
                    }
                }
            }
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function actionLogout() {
        if(!\Yii::$app->user->isGuest) {
            \Yii::$app->user->logout();
        }

        return $this->goHome();
    }
}