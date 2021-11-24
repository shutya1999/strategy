<?php
namespace app\models\entities;

use yii\db\ActiveRecord;
use yii2tech\ar\position\PositionBehavior;

/**
 * Article
 *
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 *
 * @property integer $id Primary key
 * @property string $text
 * @property string $title
 * @property string $created_at
 * @property string $category_id
 * @property Category $category
 */
class Article extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'position' => [
                'class' => PositionBehavior::className(),
                'positionAttribute' => 'position',
                'groupAttributes' => [
                    'category_id'
                ],
            ]
        ];
    }


    public function attributeLabels()
    {
        return [
            'title' => \Yii::t('main', 'Title'),
            'text' => \Yii::t('main', 'Text'),
        ];
    }

    public function rules()
    {
        return [
            [
                'title',
                'required',
                'message' => \Yii::t(
                    'main',
                    '{label} can not be blank',
                    ['label' => $this->getAttributeLabel('title')]
                )
            ],
            [
                'text',
                'required',
                'message' => \Yii::t(
                    'main',
                    '{label} can not be blank',
                    ['label' => $this->getAttributeLabel('text')]
                )
            ],
            ['category_id', 'required']
        ];
    }

    public static function tableName()
    {
        return 'articles';
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), [
            'id' => 'category_id'
        ]);
    }
}