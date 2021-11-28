<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 27.11.2021
 * Time: 10:48
 */

namespace app\modules\admin_strategy\controllers;
use app\models\LoginForm;
use Yii;

class AuthController extends AppAdminController
{
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin_strategy');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin_strategy');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin_strategy');
    }
}