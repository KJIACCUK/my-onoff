<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
            [['created_at', 'updated_at', 'qty', 'sum_eur','sum_byn','sum_rub', 'name', 'email','phone',], 'required'],
            [['user_id', 'qty', 'phone'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sum_eur','sum_byn','sum_rub'], 'number'],
            [['status'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    public function getOrderItems(){
        return $this->hasMany(OrderItems::class,['order_id'=>'id']);
    }

    public function getUser(){
        return $this->hasOne(User::class,['id'=>'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','№ Заказа'),
            'user_id' => Yii::t('app','Login Заказчика'),
            'created_at' => Yii::t('app','Дата заказа'),
            'updated_at' => Yii::t('app','Дата обработки'),
            'qty' => Yii::t('app','Кол-во'),
            'sum_eur' => Yii::t('app','Сумма EUR'),
            'sum_byn' => Yii::t('app','Сумма BYN'),
            'sum_rub' => Yii::t('app','Сумма RUB'),
            'name' => Yii::t('app','Имя'),
            'email' => Yii::t('app','Email'),
            'phone' => Yii::t('app','Телефон'),
            'status' => Yii::t('app','Статус'),
        ];
    }
}
