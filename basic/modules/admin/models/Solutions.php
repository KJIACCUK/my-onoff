<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 10.08.2018
 * Time: 14:01
 */

namespace app\modules\admin\models;
use app\models\ImageUpload;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


class Solutions extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solutions';
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['user_id', 'sections_id'], 'integer'],
            [['img', 'title'], 'string', 'max' => 255],
        ];
    }

    public function getSections(){
        return $this->hasOne(Sections::class,['id'=>'sections_id']);
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
            'description' => Yii::t('app','Основной текст'),
            'user_id' => Yii::t('app','User ID'),
        ];
    }

    public function saveImage($filename){
        $this->img = $filename;
        return $this->save(false);

    }

    public function getImage(){
        return ($this->img) ? '/images/solutions/' . $this->img : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->img);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }


}