<?php

use yii\db\Migration;

/**
 * Class m180724_165825_create_categories
 */
class m180724_165825_create_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'img'=>$this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180724_165825_create_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180724_165825_create_categories cannot be reverted.\n";

        return false;
    }
    */
}
