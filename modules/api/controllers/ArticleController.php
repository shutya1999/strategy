<?php
namespace app\modules\api\controllers;

use app\models\entities\Article;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class ArticleController extends ActiveController
{
    public $modelClass = 'app\models\entities\Article';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
//                'application/xml' => Response::FORMAT_XML,
            ],
        ];

        return $behaviors;
    }
}