<?php

namespace app\controllers;

use Yii;
use app\models\Achievement;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Lang;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use yii\filters\AccessControl;
//use dektrium\user\filters\AccessRule;

/**
 * AchievementController implements the CRUD actions for Achievement model.
 */
class AchievementController extends Controller
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
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update','delete'],
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        //? - незалогинен, @ - залогинен любой, admin - залогинен админ
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'min';
        $langDef = Lang::getDefaultLang();
        $dataProvider = new ActiveDataProvider([
            'query' => Achievement::find()->where(['lang'=>$langDef->url])->orderBy('sort'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $this->layout = 'min';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $this->layout = 'min';
        $model = new Achievement();
        $lang = Lang::find()->all();

        if(isset($_POST['project'])){
            $name = 'noimage';
            //загрузка фото
            if($_FILES['Achievement']['name']['img'] != ''){
                $path = 'achieve/';
                $filename = md5($_FILES['Achievement']['name']['img'].time());
                $ext = end(explode(".", $_FILES['Achievement']['name']['img']));
                if ($ext == 'jpeg'){$ext = 'jpg';}
                $name = $filename.'.'.$ext;

                move_uploaded_file($_FILES['Achievement']['tmp_name']['img'],Yii::getAlias('@webroot/').$path.$name);
                $photo = Image::getImagine()->open(Yii::getAlias('@webroot/').$path.$name);
                $photo->thumbnail(new Box(350, 350))->save(Yii::getAlias('@webroot/').$path.$filename.'.jpg', ['jpeg_quality' => 80]);
                imagewebp(imagecreatefromjpeg(Yii::getAlias('@webroot/').$path.$filename.'.jpg'), Yii::getAlias('@webroot/').$path.$filename.'.webp', 80);

            }

            $i = 0;
            $link_id = 0;
            foreach ($_POST['lang'] as $item){
                $model = new Achievement();

                $model->name = $_POST['name'][$i];
                $model->text = $_POST['text'][$i];
//                $model->date = $_POST['date'];
                $model->sort = $_POST['sort'];
                $model->img = $filename.'.jpg';
                $model->img_name = $filename;
                $model->lang = $item;
                $model->link_id = $link_id;

                if($model->save() and $model->validate()){
                    if($link_id == 0){
                        $link_id = $model->id;
                        $model->link_id = $model->id;
                        $model->save();
                    }
                }else{
                    echo '<pre>';
                    print_r($model);
                    die();
                }
                $i++;
            }
            return $this->redirect(['index', 'id'=>$id]);
        }

        return $this->render('create', [
            'model' => $model,
            'lang' => $lang,
        ]);
    }

    /**
     * Updates an existing Achievement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'min';
        $model = $this->findModel($id);
        $data = Achievement::find()->where(['link_id'=>$model->link_id])->all();
        $lang = Lang::find()->all();

        if(isset($_POST['project'])){
            //загрузка фото
            if($_FILES['Achievement']['name']['img'] != ''){
                $path = 'achieve/';
                $filename = md5($_FILES['Achievement']['name']['img'].time());
                $ext = end(explode(".", $_FILES['Achievement']['name']['img']));
                if ($ext == 'jpeg'){$ext = 'jpg';}
                $name = $filename.'.'.$ext;

                move_uploaded_file($_FILES['Achievement']['tmp_name']['img'],Yii::getAlias('@webroot/').$path.$name);
                $photo = Image::getImagine()->open(Yii::getAlias('@webroot/').$path.$name);
                $photo->thumbnail(new Box(350, 350))->save(Yii::getAlias('@webroot/').$path.$filename.'.jpg', ['jpeg_quality' => 80]);
                imagewebp(imagecreatefromjpeg(Yii::getAlias('@webroot/').$path.$filename.'.jpg'), Yii::getAlias('@webroot/').$path.$filename.'.webp', 80);
                if($model->img != 'noimage'){unlink(Yii::getAlias('@webroot/').$path.$model->img);}
                if($model->img_name != null){unlink(Yii::getAlias('@webroot/').$path.$model->img_name.'.webp');}
            }

            $i = 0;
            foreach ($_POST['id'] as $item){
                $model = Achievement::find()->where(['id'=>$item])->one();

                $model->name = $_POST['name'][$i];
                $model->text = $_POST['text'][$i];
//                $model->date = $_POST['date'];
                $model->sort = $_POST['sort'];
                if(isset($name)){$model->img_name = $filename;$model->img = $filename.'.jpg';}

                if($model->save() and $model->validate()){

                }else{
                    echo '<pre>';
                    print_r($model);
                    die();
                }
                $i++;
            }
            return $this->redirect(['update', 'id'=>$id]);
        }

        return $this->render('update', [
            'model' => $model,
            'lang' => $lang,
            'data' => $data,
        ]);
    }

    /**
     * Deletes an existing Achievement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $data = Achievement::find()->where(['id'=>$id])->one();
        if($data->img != 'noimage'){
            unlink(Yii::getAlias('@webroot/achieve/').$data->img);
        }
        Achievement::deleteAll(['link_id'=>$data->link_id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Achievement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Achievement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Achievement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
