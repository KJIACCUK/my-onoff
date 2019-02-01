<?php

use yii\db\Migration;
use mdm\admin\components\Configs;

/**
 * Class m180305_071526_create_menu
 */
class m180305_071526_create_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $menuTable = Configs::instance()->menuTable;
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable($menuTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'parent' => $this->integer(),
            'route' => $this->string(),
            'order' => $this->integer(),
            'data' => $this->binary(),
            "FOREIGN KEY ([[parent]]) REFERENCES {$menuTable}([[id]]) ON DELETE SET NULL ON UPDATE CASCADE",
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180305_071526_create_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }
*/
    public function down()
    {
        $this->dropTable(Configs::instance()->menuTable);
    }

}
