<?php

use yii\db\Migration;

/**
 * Class m180810_104729_create_documentation
 */
class m180810_104729_create_documentation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('documentation',[
            'id'=>$this->primaryKey(),
            'sections_id'=>$this->integer(),
            'img'=>$this->string(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime(),
            'user_id'=>$this->integer()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180810_104729_create_documentation cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180810_104729_create_documentation cannot be reverted.\n";

        return false;
    }
    */
}
