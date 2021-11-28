<?php

namespace app\modules\admin_strategy\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin_strategy\models\Cases;

/**
 * CasesSearch represents the model behind the search form of `app\modules\admin_strategy\models\Cases`.
 */
class CasesSearch extends Cases
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'active'], 'integer'],
            [['preview', 'title_ua', 's_desc_ua', 'title_ru', 's_desc_ru', 'title_en', 's_desc_en', 'url'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cases::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'preview', $this->preview])
            ->andFilterWhere(['like', 'title_ua', $this->title_ua])
            ->andFilterWhere(['like', 's_desc_ua', $this->s_desc_ua])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 's_desc_ru', $this->s_desc_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 's_desc_en', $this->s_desc_en])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
