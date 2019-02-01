<?php

use yii\db\Migration;

/**
 * Class m180801_070907_create_order_items
 */
class m180801_070907_create_order_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_id'=>$this->integer(),
            'product_id'=>$this->integer(),
            'name'=>$this->string(),
            'sum_item_byn'=>$this->float(),
            'sum_item_rur'=>$this->float(),
            'sum_item_usd'=>$this->float(),
            'qty_item'=>$this-> integer(),
            'byn'=>$this->float(),
            'rur'=>$this->float(),
            'usd'=>$this->float(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180801_070907_create_order_items cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180801_070907_create_order_items cannot be reverted.\n";

        return false;
    }
    */
}
