<?php
namespace app\rbac;
 
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\rbac\Rule;
 
/**
 * Класс описывающий роль пользователя.
 */
class UserRoleRule extends Rule
{
    public $name = 'userRole';
 
    /**
     * {@inheritdoc}
     */
    public function execute($user, $item, $params)
    {
        $user = ArrayHelper::getValue($params, 'olit_users', User::findOne($user));
 
        if ($user) {
            $role = (int) $user->role;
 
            if ($item->name === 'admin') {
                return $role === User::ROLE_ADMIN;
            } elseif ($item->name === 'user') {
                return $role === User::ROLE_ADMIN || $role === User::ROLE_USER;
            }
        }
 
        return false;
    }
}