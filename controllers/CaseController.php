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
    public function actionIndex($id = null, $page = 1){
        $lang = Lang::getCurrent();
        $lang_url = ($lang->url == 'ua') ? '' : $lang->url . "/" ;
        $products = Product::find()->where(['active' => 1])->orderBy(['active_tag' => SORT_DESC])->asArray()->all();

        $active_id = $id;
        if (is_null($id)){
            $active_id = Product::findOne(['active_tag' => 1])->id;
        }

        $limit = 4;
        $offset = ($page * $limit) - $limit;

        //Вернуть вид пагинации и Кейсов при AJAX
        if (Yii::$app->request->isAjax){
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
                    'pageTotal' => ceil($casesCount / $limit),
                    'currentPage' => $page,
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

        $cases = Cases::find()
            ->where(['active' => 1, 'product_id' => $active_id])
            ->limit($limit)
            ->offset($offset)
            ->all();

        $casesCount = Cases::find()->where(['active' => 1, 'product_id' => $active_id])->count();

        if ($casesCount > $limit){
            $pagination_settings = [
                'pageSize' => $limit,
                'pageTotal' => ceil($casesCount / $limit),
                'currentPage' => $page,
                'link' => '/' . $lang_url . Yii::$app->getRequest()->pathInfo . "?id=$active_id",
                'btnMoreName' => 'btn-more-case'
            ];
        }

        return $this->render('index', compact(['cases', 'products', 'lang', 'pagination_settings', 'active_id']));
    }
    public function actionView($url){
        $lang = Lang::getCurrent();
        $case = Cases::findOne(['url' => $url]);
        return $this->render('view', compact(['case', 'lang']));
    }
}