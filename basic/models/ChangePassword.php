<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 14.04.2018
 * Time: 14:06
 */

namespace app\models;

use mdm\admin\models\form\ChangePassword as Change;
use Yii;


class ChangePassword extends Change
{
    public function attributeLabels()
    {
        return [
            'oldPassword' => Yii::t('app', 'Старый пароль'),
            'newPassword' => Yii::t('app', 'Новый пароль'),
            'retypePassword' => Yii::t('app', 'Повторите новый пароль'),
        ];
    }

}