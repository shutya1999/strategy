<?php
/**
 * Created by PhpStorm.
 * User: romai
 * Date: 24.11.2021
 * Time: 23:32
 */

namespace app\controllers;

use Yii;
use app\models\Cases;
use app\models\Lang;
use app\models\Product;
use yii\data\Pagination;
use yii\helpers\VarDumper;

class CaseController extends BaseController
{
    public function actionIndex($id = 1, $page = 1){
        $lang = Lang::getCurrent();
        $lang_url = ($lang->url == 'ua') ? '' : $lang->url . "/" ;
        $products = Product::find()->where(['active' => 1])->asArray()->all();

        $limit = 2;
        $offset = ($page * $limit) - $limit;

        //Вернуть вид пагинации и Кейсов при выборе продукта
        if (Yii::$app->request->isAjax && isset($_POST['select'])){
            $id = $_POST['id'];
            $offset = (1 * $limit) - $limit;
            $cases = Cases::find()
                ->where(['active' => 1, 'product_id' => $id])
                ->limit($limit)
                ->offset($offset)
                ->all();

            $casesCount = Cases::find()->where(['active' => 1, 'product_id' => $id])->count();

            if ($casesCount > $limit){
                $pagination_settings = [
                    'pageSize' => $limit,
                    'pageTotal' => round($casesCount / $limit),
                    'currentPage' => 1,
                    'link' => '/' . $lang_url . Yii::$app->getRequest()->pathInfo . "?id=$id",
                    'btnMoreName' => 'btn-more-case'
                ];
            }

            $response = [
                'case' => $this->renderPartial('index-ajax', compact(['cases', 'lang'])),
                'pagination' => $this->renderPartial('_pagination', compact(['pagination_settings']))
            ];
            return $this->asJson($response);
        }
        if (Yii::$app->request->isAjax && isset($_POST['more'])){
            $id = $_POST['id'];
            $page = $_POST['page'];

            $offset = ($page * $limit) - $limit;
            $cases = Cases::find()
                ->where(['active' => 1, 'product_id' => $id])
                ->limit($limit)
                ->offset($offset)
                ->all();

            $casesCount = Cases::find()->where(['active' => 1, 'product_id' => $id])->count();

            if ($casesCount > $limit){
                $pagination_settings = [
                    'pageSize' => $limit,
                    'pageTotal' => round($casesCount / $limit),
                    'currentPage' => $page,
                    'link' => '/' . $lang_url . Yii::$app->getRequest()->pathInfo . "?id=$id",
                    'btnMoreName' => 'btn-more-case'
                ];
            }

            $response = [
                'case' => $this->renderPartial('index-ajax', compact(['cases', 'lang'])),
                'pagination' => $this->renderPartial('_pagination', compact(['pagination_settings'])),
                //'totalCases' => count($cases),
            ];
            return $this->asJson($response);
        }

        $cases = Cases::find()
            ->where(['active' => 1, 'product_id' => $id])
            ->limit($limit)
            ->offset($offset)
            ->all();

        $casesCount = Cases::find()->where(['active' => 1, 'product_id' => $id])->count();

        if ($casesCount > $limit){
            $pagination_settings = [
                'pageSize' => $limit,
                'pageTotal' => round($casesCount / $limit),
                'currentPage' => $page,
                'link' => '/' . $lang_url . Yii::$app->getRequest()->pathInfo . "?id=$id",
                'btnMoreName' => 'btn-more-case'
            ];
        }

        return $this->render('index', compact(['cases', 'products', 'lang', 'pagination_settings']));
    }
    public function actionView(){
        return $this->render('view');
    }
}