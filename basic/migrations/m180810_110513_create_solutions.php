<?php

use yii\db\Migration;

/**
 * Class m180810_110513_create_solutions
 */
class m180810_110513_create_solutions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('solutions',[
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
        echo "m180810_110513_create_solutions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180810_110513_create_solutions cannot be reverted.\n";

        return false;
    }
    */
}
