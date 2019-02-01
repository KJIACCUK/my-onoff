<?php

use yii\db\Migration;

/**
 * Class m181105_073612_create_subsection
 */
class m181105_073612_create_subsection extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subsection',[
            'id'=>$this->primaryKey(),
            'sections_id'=>$this->integer(),
            'img'=>$this->string(),
            'title'=>$this->string(),
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
        echo "m181105_073612_create_subsection cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181105_073612_create_subsection cannot be reverted.\n";

        return false;
    }
    */
}
