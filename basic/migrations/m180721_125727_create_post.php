<?php

use yii\db\Migration;

/**
 * Class m180721_125727_create_post
 */
class m180721_125727_create_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post',[
            'id'=>$this->primaryKey(),
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
        echo "m180721_125727_create_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180721_125727_create_post cannot be reverted.\n";

        return false;
    }
    */
}
