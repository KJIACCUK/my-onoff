<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 08.11.2018
 * Time: 8:44
 */

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


class Subsection extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subsection';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sections_id'], 'integer'],
            [['img', 'title'], 'string', 'max' => 255],
        ];
    }

    public function getCategories(){
        return $this->hasOne(Categories::class,['id'=>'sections_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sections_id'=>Yii::t('app','Раздел'),
            'img' => Yii::t('app', 'Картинка'),
            'title' => Yii::t('app', 'Заголовок'),
            'user_id' => Yii::t('app','User ID'),
        ];
    }

}