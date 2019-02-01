<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $name
 * @property double $price
 * @property int $qty_item
 * @property double $sum_item
 */
class OrderItems extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item_eur','sum_item_byn','sum_item_rub', 'eur', 'byn', 'rub'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function getOrder(){
        return $this->hasOne(Order::class,['id'=>'order_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'order_id' => Yii::t('app','Order ID'),
            'product_id' => Yii::t('app','Product ID'),
            'name' => Yii::t('app','Name'),
            'price' => Yii::t('app','Price'),
            'qty_item' => Yii::t('app','Qty Item'),
            'sum_item_eur' => Yii::t('app','Sum Item'),
            'sum_item_byn' => Yii::t('app','Sum Item'),
            'sum_item_rub' => Yii::t('app','Sum Item'),
            'eur' => Yii::t('app','EUR'),
            'byn' => Yii::t('app','BYN'),
            'rub' => Yii::t('app','RUB'),
        ];
    }
}
