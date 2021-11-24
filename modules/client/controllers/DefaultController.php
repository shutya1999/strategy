<?php
namespace app\modules\client\controllers;
use yii\web\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class DefaultController extends Controller
{
    public function actionIndex() {
        return $this->renderContent(null);
    }
}