<?php
namespace app\commands;
use yii\console\Controller;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class RbacController extends Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;

        $createArticle = $auth->createPermission('createArticle');
        $auth->add($createArticle);

        $updateArticle = $auth->createPermission('updateArticle');
        $auth->add($updateArticle);

        $removeArticle = $auth->createPermission('removeArticle');
        $auth->add($removeArticle);

        $articleManager = $auth->createRole('articleManager');
        $auth->add($articleManager);

        $auth->addChild($articleManager, $createArticle);
        $auth->addChild($articleManager, $updateArticle);
        $auth->addChild($articleManager, $removeArticle);

        $auth->assign($articleManager, 3);
    }
}