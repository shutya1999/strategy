<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 24.11.2021
 * Time: 23:32
 */

namespace app\controllers;


use app\models\Cases;
use app\models\Product;

class CaseController extends BaseController
{
    public function actionIndex(){
        $cases = Cases::find()->where(['active' => 1])->asArray()->all();
        $products = Product::find()->where(['active' => 1])->asArray()->all();
        return $this->render('index', compact(['cases', 'products']));
    }
    public function actionView(){
        return $this->render('view');
    }
}