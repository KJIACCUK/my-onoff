<?php

use yii\db\Migration;

/**
 * Class m180810_111818_create_software
 */
class m180810_111818_create_software extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('software',[
            'id'=>$this->primaryKey(),
            'sections_id'=>$this->integer(),
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
        echo "m180810_111818_create_software cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180810_111818_create_software cannot be reverted.\n";

        return false;
    }
    */
}
