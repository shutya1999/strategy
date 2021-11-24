<?php

use yii\db\Migration;

class m160518_180838_article_add_category_id_column extends Migration
{
    public function safeUp()
    {
        $this->addColumn('articles', 'category_id', $this->integer());
        $this->addForeignKey(
            'article_article_category',
            'articles',
            'category_id',
            'article_categories',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('article_article_category', 'articles');
        $this->dropColumn('articles', 'category_id');
    }
}
