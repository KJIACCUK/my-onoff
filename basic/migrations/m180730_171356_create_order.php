<?php

use yii\db\Migration;

/**
 * Class m180730_171356_create_order
 */
class m180730_171356_create_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime(),
            'qty'=>$this->integer(),
            'sum_byn'=>$this-> float(),
            'sum_rur'=>$this-> float(),
            'sum_usd'=>$this-> float(),
            'name'=>$this->string(),
            'email'=>$this->string(),
            'phone'=>$this-> string(),
            'unn_unp'=>$this->string(),
            'type_ownership'=>$this->string(),
            'name_ur'=>$this->string(),
            'status'=>'ENUM("0","1","2") NOT NULL DEFAULT "0"',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180730_171356_create_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180730_171356_create_order cannot be reverted.\n";

        return false;
    }
    */
}
