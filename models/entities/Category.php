<?php
namespace app\models\entities;
use yii\db\ActiveRecord;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property Article[] $articles
 *
 */
class Category extends ActiveRecord
{
    public function rules()
    {
        return [
            ['title', 'required']
        ];
    }

    public static function tableName()
    {
        return 'article_categories';
    }

    public function getArticles() {
        return $this->hasMany(Article::className(), [
            'category_id' => 'id'
        ]);
    }

}