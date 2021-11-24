<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 24.11.2021
 * Time: 21:35
 */

namespace app\controllers;


use app\models\Product;

class ProductController extends BaseController
{
    public function actionIndex($url){
        $product = Product::find()->where(['url' => $url, 'active' => 1])->one();

        if (is_null($product)) return $this->goHome();

        return $this->render('index', compact(['product']));
    }
}