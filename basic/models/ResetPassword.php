<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 18.04.2018
 * Time: 9:04
 */

namespace app\models;

use mdm\admin\models\form\ResetPassword as Reset;
use Yii;


class ResetPassword extends Reset
{
    public function attributeLabels()
    {
        return ['password'=>Yii::t('app','Новый пароль')];
    }

}