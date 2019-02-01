<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 10.08.2018
 * Time: 14:20
 */

namespace app\modules\admin\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


class Software extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'software';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getSections(){
        return $this->hasOne(Sections::class,['id'=>'sections_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['user_id', 'sections_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sections_id'=>Yii::t('app','Раздел'),
            'title' => Yii::t('app', 'Заголовок'),
            'description' => Yii::t('app','Основной текст'),
            'user_id' => Yii::t('app','User ID'),
        ];
    }
}