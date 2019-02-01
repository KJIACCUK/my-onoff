<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $status
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
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
            [['name', 'email', 'phone'], 'required'],
            [['user_id', 'qty', 'phone'], 'integer'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            [['sum_eur','sum_byn','sum_rub'], 'number'],
            [['status'], 'boolean'],
            [['name', 'email', 'unn_unp','type_ownership','name_ur'], 'string', 'max' => 255],
        ];
    }

    public function getOrderItems(){
        return $this->hasMany(OrderItems::class,['order_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app','ФИО'),
            'email' => Yii::t('app','Email'),
            'phone' => Yii::t('app','Телефон'),
            'unn_unp' => Yii::t('app', ''),
            'type_ownership' => Yii::t('app', ''),
            'name_ur' => Yii::t('app',''),
        ];
    }
}
