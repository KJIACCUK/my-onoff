<?php

use yii\db\Migration;

/**
 * Class m180724_182434_create_products
 */
class m180724_182434_create_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'category_id'=>$this->integer(),
            'name'=>$this->string(),
            'eur'=>$this->integer(),
            'img'=>$this->string(),
            'description'=>$this->text(),
            'user_id'=>$this->integer()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180724_182434_create_products cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180724_182434_create_products cannot be reverted.\n";

        return false;
    }
    */
}
