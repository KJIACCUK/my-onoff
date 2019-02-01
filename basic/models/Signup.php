<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 21.07.2018
 * Time: 17:11
 */

namespace app\models;

use Yii;
use mdm\admin\models\form\Signup as SignupForm;

class Signup extends SignupForm
{
    public $unn_unp;
    public $type_ownership;
    public $name_ur;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['unn_unp', 'string', 'min' => 3],
            ['type_ownership', 'string', 'min' => 3],
            ['name_ur', 'string', 'min' => 3],
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->unn_unp = $this->unn_unp;
            $user->type_ownership = $this->type_ownership;
            $user->name_ur = $this->name_ur;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app','Логин'),
            'email' => Yii::t('app','Email'),
            'password' => Yii::t('app','Пароль'),
            'unn_unp' => Yii::t('app','УНН | УНП'),
            'type_ownership' => Yii::t('app','Форма собственности'),
            'name_ur' => Yii::t('app','Название юр. лица'),
        ];
    }

}