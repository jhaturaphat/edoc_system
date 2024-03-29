<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdocView;

/**
 * EdocViewSearch represents the model behind the search form of `app\models\EdocView`.
 */
class EdocViewSearch extends EdocView
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['edoc_id', 'e_id', 'edoc_read_id', 'r_date', 'dep_id', 'edoc_type_id', 'e_id_sent', 'e_id_dud', 'user_get', 'date_get', 'ip_get', 'e_id_radio', 'e_main_id'], 'safe'],
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
    public function search($params, $dep_id)
    {
        $query = EdocView::find()
        ->joinWith(['edocMain','edocRead','edocType']);

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
            'edoc_sent.id' => $this->id,
            // 'edoc_sent.e_main_id' => $this->e_main_id,
            'edoc_sent.dep_id'=>$dep_id
        ]);

        $query->andFilterWhere(['like', 'edoc_sent.edoc_id', $this->edoc_id])
            ->andFilterWhere(['like', 'edoc_sent.e_id', $this->e_id])
            ->andFilterWhere(['like', 'edoc_sent.edoc_read_id', $this->edoc_read_id])
            ->andFilterWhere(['like', 'edoc_sent.r_date', $this->r_date])
            // ->andFilterWhere(['like', 'dep_id', $this->dep_id])
            // ->andFilterWhere(['like', 'edoc_sent.edoc_type_id', $this->edoc_type_id])
            ->andFilterWhere(['like', 'edoc_sent.e_id_sent', $this->e_id_sent])
            ->andFilterWhere(['like', 'edoc_sent.e_id_dud', $this->e_id_dud])
            ->andFilterWhere(['like', 'edoc_sent.user_get', $this->user_get])
            ->andFilterWhere(['like', 'edoc_sent.date_get', $this->date_get])
            ->andFilterWhere(['like', 'edoc_sent.ip_get', $this->ip_get])
            ->andFilterWhere(['like', 'edoc_sent.e_id_radio', $this->e_id_radio])
            ->andFilterWhere(['like', 'edoc_main.edoc_name', $this->e_main_id])
            ->andFilterWhere(['like', 'edoc_type.edoc_type_id', $this->edoc_type_id]);

        return $dataProvider;
    }
}
