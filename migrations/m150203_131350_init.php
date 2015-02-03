<?php

use yii\db\Schema;
use yii\db\Migration;

class m150203_131350_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%release_project_group}}', [
            'id' => 'INT NOT NULL AUTO_INCREMENT',
            'name' => Schema::TYPE_STRING . '(100) NOT NULL',
            'alias' => Schema::TYPE_STRING . '(60) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'PRIMARY KEY (`id`)'
        ], $tableOptions);

        $this->createTable('{{%release_project}}', [
            'id' => 'INT NOT NULL AUTO_INCREMENT',
            'name' => Schema::TYPE_STRING . '(100) NOT NULL',
            'alias' => Schema::TYPE_STRING . '(60) NOT NULL',
            'project_group_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'PRIMARY KEY (`id`),
             INDEX `fk_release_project_release_project_group1_idx` (`project_group_id` ASC),
             CONSTRAINT `fk_release_project_release_project_group1`
                FOREIGN KEY (`project_group_id`)
                REFERENCES {{%release_project_group}} (`id`)'
        ], $tableOptions);

        $this->createTable('{{%release}}', [
            'id' => 'INT NOT NULL AUTO_INCREMENT',
            'project_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'version' => Schema::TYPE_STRING . '(30) NOT NULL',
            'posted_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'PRIMARY KEY (`id`),
             INDEX `fk_release_release_project1_idx` (`project_id` ASC),
             CONSTRAINT `fk_release_release_project1`
                FOREIGN KEY (`project_id`)
                REFERENCES {{%release_project}} (`id`)'
        ], $tableOptions);

        $this->createTable('{{%release_note_type}}', [
            'id' => 'INT NOT NULL AUTO_INCREMENT',
            'name' => Schema::TYPE_STRING . '(100) NOT NULL',
            'PRIMARY KEY (`id`)'
        ], $tableOptions);

        $this->createTable('{{%release_note}}', [
            'id' => 'INT NOT NULL AUTO_INCREMENT',
            'release_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'note_type_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'order_index' => Schema::TYPE_INTEGER . ' NOT NULL',
            'PRIMARY KEY (`id`),
             INDEX `fk_release_note_release_idx` (`release_id` ASC),
             INDEX `fk_release_note_release_note_type1_idx` (`note_type_id` ASC),
             CONSTRAINT `fk_release_note_release`
                FOREIGN KEY (`release_id`)
                REFERENCES {{%release}} (`id`),
             CONSTRAINT `fk_release_note_release_note_type1`
                FOREIGN KEY (`note_type_id`)
                REFERENCES {{%release_note_type}} (`id`)'
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%release_note}}');
        $this->dropTable('{{%release_note_type}}');
        $this->dropTable('{{%release}}');
        $this->dropTable('{{%release_project}}');
        $this->dropTable('{{%release_project_group}}');
        return true;
    }
}
