<?php

use yii\db\Migration;

class m160516_162456_test_article_data extends Migration
{
    public function up()
    {
        $this->insert('articles', [
            'title' => 'Test Article',
            'text' => 'Test article text.'
        ]);
    }

    public function down()
    {
        return true;
    }
}
