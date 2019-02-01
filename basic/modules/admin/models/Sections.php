<?php
/**
 * Created by PhpStorm.
 * User: uit06
 * Date: 10.08.2018
 * Time: 9:06
 */

namespace app\modules\admin\models;
use Yii;
use yii\db\ActiveRecord;


class Sections extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id'],'required'],
            [['name', 'subsection'], 'string', 'max' => 255],
        ];
    }

    public function getCategories(){
        return $this->hasOne(Categories::class,['id'=>'name']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','Категория(id)'),
            'parent_id' => Yii::t('app', 'Для партнеров'),
            'name' => Yii::t('app','Название раздела'),
            'subsection'=> Yii::t('app','Название подраздела')
        ];
    }

}