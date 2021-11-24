<?php

namespace app\controllers;



use app\models\LoginForm;
use Yii;
use app\models\Lang;
use app\models\Local;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class SiteController extends BaseController
{
    function translit($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'','і'=>'i','ї'=>'yi','є'=>'ye'));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        $s = str_replace(" ", "-", $s); // заменяем двойные минусы
        return $s; // возвращаем результат
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    public function actionIndex()
    {
        $lang = Lang::getCurrent();
        $localArr = Local::find()->all();


        $lang_id = $lang->url;
        $local = [];
        foreach ($localArr as $item){
            $local[$item->var] = $item->$lang_id;
        }

        return $this->render('index',[
            'langCur' => $lang,
            'local' => $local,
        ]);
    }

    public function actionSitemap2(){
        $this->layout = 'none';
        return $this->render('sitemap2');
    }
    public function actionSitemap1(){
        $this->layout = 'none';
        return $this->render('sitemap1');
    }

    public function actionPolitics()
    {
        $lang = Lang::getCurrent();
        return $this->render('politics',['lang'=>$lang]);
    }


}
