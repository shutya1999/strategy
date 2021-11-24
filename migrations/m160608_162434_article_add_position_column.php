<?php

use yii\db\Migration;

class m160608_162434_article_add_position_column extends Migration
{
    public function safeUp()
    {
        $this->addColumn('articles', 'position', $this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn('articles', 'position');
    }
}
