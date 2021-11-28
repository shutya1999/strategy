<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 27.11.2021
 * Time: 10:32
 */

namespace app\modules\admin_strategy\controllers;


class MainController extends AppAdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}