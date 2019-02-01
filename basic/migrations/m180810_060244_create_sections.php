<?php

use yii\db\Migration;

/**
 * Class m180810_060244_create_sections
 */
class m180810_060244_create_sections extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sections', [
            'id' => $this->primaryKey(),
            'parent_id' => 'ENUM("0","1","2","3","4") NOT NULL DEFAULT "0"',
            'name'=>$this->string(),
            'subsection'=> $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180810_060244_create_sections cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180810_060244_create_sections cannot be reverted.\n";

        return false;
    }
    */
}
