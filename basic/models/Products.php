<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property int $price
 * @property string $img
 * @property string $description
 * @property int $user_id
 */
class Products extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'manufacturer_id', 'user_id'], 'integer'],
            [['eur'], 'number'],
            [['description'], 'string'],
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    public function getSubsection(){
        return $this->hasOne(Subsection::class, ['id'=>'category_id']);
    }

    public function getImage(){
        return ($this->img) ? '/images/products/' . $this->img : '/no-image.png';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'category_id' => Yii::t('app','Категория'),
            'manufacturer_id' => Yii::t('app', 'Производитель'),
            'name' => Yii::t('app','Название'),
            'eur' => Yii::t('app','Цена EUR'),
            'img' => Yii::t('app','Картинка'),
            'description' => Yii::t('app','Описание'),
            'user_id' => Yii::t('app','User ID'),
        ];
    }
}
