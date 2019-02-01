<?php

use yii\db\Migration;

/**
 * Class m180726_183225_create_messages
 */
class m180726_183225_create_messages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'email'=>$this->string()->notNull(),
            'message'=>$this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180726_183225_create_messages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180726_183225_create_messages cannot be reverted.\n";

        return false;
    }
    */
}
