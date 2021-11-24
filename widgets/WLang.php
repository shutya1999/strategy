<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 26.07.2016
 * Time: 12:39
 */

namespace app\widgets;
use app\models\Lang;

class WLang extends \yii\bootstrap\Widget
{
    public function init(){}

    public function run() {
        return $this->render('lang/viewHref', [
            'current' => Lang::getCurrent(),
//            'langs' => Lang::find()->where('id != :current_id', [':current_id' => Lang::getCurrent()->id])->all(),
            'langs' => Lang::find()->all(),
        ]);
    }
}