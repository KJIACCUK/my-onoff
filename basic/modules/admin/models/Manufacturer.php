<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 09.11.2018
 * Time: 10:36
 */

namespace app\modules\admin\models;


use yii\db\ActiveRecord;
use Yii;

class Manufacturer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Производитель'),
        ];
    }

}