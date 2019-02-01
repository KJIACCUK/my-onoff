<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $img
 * @property string $description
 */
class Messages extends ActiveRecord
{
    public $emailNew;
    public $messageNew;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['emailNew', 'filter', 'filter' => 'trim'],
            [['email', 'emailNew'], 'email'],
            [['message', 'messageNew'], 'string'],
        ];
    }

//    public function getCategories(){
//        return $this->hasOne(Categories::className(),['id' => 'parent_id']);
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','Категория(id)'),
            'email' => Yii::t('app','Email'),
            'message' => Yii::t('app', 'Сообщение'),
        ];
    }

    public function Message()
    {
        $model = new Messages();
        $model->email = $this->emailNew;
        $model->message = $this->messageNew;
        $model->save();
    }
}
