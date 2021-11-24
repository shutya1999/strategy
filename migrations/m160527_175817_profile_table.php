<?php

use yii\db\Migration;

class m160527_175817_profile_table extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('users', 'email');

        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'avatar' => $this->string(),
            'email' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone_number' => $this->string()
        ]);

        $this->addForeignKey(
            'profile:user_id',
            'profile',
            'user_id',
            'users',
            'id',
            'cascade',
            'cascade'
        );

        return true;
    }

    public function safeDown()
    {
        $this->addColumn('users', 'email', $this->string());
        $this->dropForeignKey('profile:user_id', 'profile');
        $this->dropTable('profile');
    }
}
