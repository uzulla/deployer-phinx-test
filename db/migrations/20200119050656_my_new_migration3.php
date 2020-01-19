<?php

use Phinx\Migration\AbstractMigration;

class MyNewMigration3 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $data = [
            ['user_id' => 1, 'name' => 'foo', 'created' => "2020-01-19"],
            ['user_id' => 2, 'name' => 'bar', 'created' => "2020-01-19"],
            ['user_id' => 3, 'name' => 'buz'],
        ];
        $table = $this->table('user_logins');
        $table->insert($data)->save();
    }

    public function down()
    {
        $this->execute('DELETE FROM user_logins');
    }
    
}
