<?php
namespace app\commands;
use \app\rbac\UserRoleRule;
use yii\console\Controller;
use Yii;

/**
 * Контроллер формирующий права доступа на сайте.
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();
 
        $rule = new UserRoleRule();
        $auth->add($rule);
 
        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;
        $auth->add($user);
 
        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;
        $auth->add($admin);
 
        $auth->addChild($admin, $user);
    }
}