<?php
namespace app\components;

use app\models\News;
use app\models\Project;
use app\models\Tags;
use app\models\Trener;
use Yii;
use yii\web\UrlRule;
use app\models\Lang;

class PageRule extends UrlRule {

    public $connectionID = 'db';

    public function init()
    {
        if ($this->name === null) {
            $this->name = __CLASS__;
        }
    }

    //сгенерировать урл из вот таой конструкции на странице
    // \Yii::$app->urlManager->createUrl(['blog', 'id' => $blog[0]->id])
    public function createUrl($manager, $route, $params){
        if ($route === 'trener' and isset($params['id'])) {
            $str = Trener::find()
                ->select('url')
                ->where([
                    'id' => $params['id'],
                ])
                ->scalar();
            return $route.'/'.$str;
        }

        if ($route === 'category' and isset($params['name'])) {
            $str = Tags::find()
                ->select('name')
                ->where([
                    'name' => $params['name'],
                ])
                ->scalar();
            return $route.'/'.$str;
        }


        return false;  // данное правило не применимо
    }

    //разобрать урл
    public function parseRequest($manager, $request){

        //обработка URLов. Убрать лишние слэши, заглавные буквы
        //не трогать гет параметры (gclid и utm_ в частности)
//        $langCur = Lang::getCurrent();
//        $requestedUrl = Yii::$app->getRequest()->getLangUrl();//url с гетами но без языка
        $requestedUrl1 = $request->url;//то же самое с языком
        //убрать двойной слэш из начала урла
        if(substr($request->url, 0,2) == '//'){
            $request->url = preg_replace('!\/+!','/',$request->url);
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$request->hostInfo.$request->url);
            exit();
            //echo '<pre>';var_dump($request->url);die();
        }

        $url = parse_url($requestedUrl1);
        //path - основная часть (строка)
        //query - геты (строка)
        $path = $url['path'];

        if(strpos($path,'//') == false
            && strpos($path,'==') == false
            && strpos($path,'&&') == false
            && mb_strtolower($path) === $path
        ){
            //удалить "*" из конца урла. Включить если понадобится
//            if(substr($path, -1) == '*'){
//                $path = rtrim($path,'*');
//                $string = trim($string,'/');
//                $request->url = $path;
//                header("HTTP/1.1 301 Moved Permanently");
//                header("Location: ".$request->hostInfo.'/'.$request->url);
//                exit();
//            }
        }else{
            //удалить всякое ненужное
            $path = preg_replace('!\=+!','=',$path);
            $path = preg_replace('!\/+!','/',$path);
            $path = mb_strtolower($path);
            //$path = trim($path, '/');
            $path = trim($path,'*');

            //собрать url обратно и сделать редирект
            if(isset($url['query'])){
                $url = $path.'?'.$url['query'];
            }else{
                $url = $path;
            }

            $request->url = $url;
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$request->hostInfo.'/'.$request->url);
            exit();
        }






        $curLang = Lang::getCurrent();
        $url = end(explode('/',trim($request->pathInfo, '/')));//trim($request->pathInfo, '/'); // удаляем слеши из начала и конца url
        $base = explode('/',trim($request->pathInfo, '/'));
//        $subcat = strpos($url,'?subcat=');

        if ($base[0] == 'trener'){
            $page = Trener::find() // ищем запись по url
            ->where(
                [
                    'url' => $url,
                    'lang' => $curLang->url,
                ]
            )
                ->one();
            if ($page !== null) { // если нашли, то передаем данные в PageController::actionShow($id). В нем будем рендерить страницу
                return ['site/trener', ['id' => $page->id]];
            }
        }

        if ($base[0] == 'category'){
            return ['site/news', ['tag' => $url]];
        }


        return false; // сообщаем UrlManager, что ничего не нащли и необходимо попробовать применить следующее правило
        //die($url);
    }
}
?>