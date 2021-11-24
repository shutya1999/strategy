<?php
namespace app\components;
use yii\base\Behavior;
use yii\web\Application;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class LanguageBehavior extends Behavior
{
    public function events()
    {
        return [
            Application::EVENT_BEFORE_ACTION => 'handleLanguage'
        ];
    }

    public function handleLanguage() {
        \Yii::$app->language = \Yii::$app->session->get('language', \Yii::$app->sourceLanguage);
    }

}