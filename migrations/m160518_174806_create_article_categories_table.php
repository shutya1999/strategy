<?php

use yii\db\Migration;

/**
 * Handles the creation for table `article_categories_table`.
 * yii migrate/create create_article_categories_table
 */
class m160518_174806_create_article_categories_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('article_categories', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'parent_id' => $this->integer(),
            'created_at' => $this->dateTime()
        ]);
        $this->addForeignKey(
            'article_categories_parent',
            'article_categories',
            'parent_id',
            'article_categories',
            'id'
        );
    }
    public function safeDown()
    {
        $this->dropTable('article_categories');
    }
}