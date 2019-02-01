<?php

use yii\db\Migration;

/**
 * Class m181109_073451_create_manufacturer
 */
class m181109_073451_create_manufacturer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('manufacturer',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181109_073451_create_manufacturer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181109_073451_create_manufacturer cannot be reverted.\n";

        return false;
    }
    */
}
