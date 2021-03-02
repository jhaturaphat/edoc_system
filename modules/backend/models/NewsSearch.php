<?php

namespace app\modules\backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\NewsDocument;

/**
 * NewsSearch represents the model behind the search form of `app\modules\models\NewsDocument`.
 */
class NewsSearch extends NewsDocument
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'news_type_id'], 'integer'],
            [['path', 'title', 'detail', 'create_at', 'update_at', 'public'], 'safe'],
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
        $query = NewsDocument::find();

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
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'news_type_id' => $this->news_type_id,
        ]);

        $query->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'public', $this->public]);

        return $dataProvider;
    }
}
