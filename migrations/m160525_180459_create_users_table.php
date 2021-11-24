<?php

use yii\db\Migration;

/**
 * Handles the creation for table `users_table`.
 */
class m160525_180459_create_users_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'access_key' => $this->string(),
            'last_access' => $this->dateTime(),
            'created_at' => $this->dateTime()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
