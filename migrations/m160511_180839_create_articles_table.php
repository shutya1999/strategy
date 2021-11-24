<?php

use yii\db\Migration;

/**
 * Handles the creation for table `articles_table`.
 */
class m160511_180839_create_articles_table extends Migration
{
    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'text' => $this->text(),
            'created_at' => $this->dateTime()
        ]);
    }

    public function down()
    {
        $this->dropTable('articles');
    }


}
