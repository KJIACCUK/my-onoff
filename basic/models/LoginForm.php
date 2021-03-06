<?php

namespace app\models;

use Yii;
use mdm\admin\models\form\Login as Login;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Login
{
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app','Логин'),
            'password' => Yii::t('app','Пароль'),
        ];
    }

}
