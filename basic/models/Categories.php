<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 09.02.2018
 * Time: 10:36
 */

namespace app\models;
use yii\db\ActiveRecord;
use Yii;


class Categories extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
        return [
            [['name', 'required']],
            [['name', 'string']],
        ];
    }

//    public function getProducts(){
//        return $this -> hasMany(Products::class,['category' => 'id']);
//    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app','Имя'),
        ];
    }
}