<?php

namespace app\models;

use Yii;

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
class OrderItems extends \yii\db\ActiveRecord
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
            [['sum_item_eur','sum_item_byn','sum_item_rub', 'eur', 'byn', 'rub'], 'number'], //'price',
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function getOrder(){
        return $this->hasOne(Order::class,['id'=>'order_id']);
    }

}
