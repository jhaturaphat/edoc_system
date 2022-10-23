<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdocType;

/**
 * EdocTypeSearch represents the model behind the search form of `app\models\EdocType`.
 */
class EdocTypeSearch extends EdocType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_type_id', 'edoc_type_name'], 'safe'],
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
        $query = EdocType::find();

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
        $query->andFilterWhere(['like', 'edoc_type_id', $this->edoc_type_id])
            ->andFilterWhere(['like', 'edoc_type_name', $this->edoc_type_name]);

        return $dataProvider;
    }
}
