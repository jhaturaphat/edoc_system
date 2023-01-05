<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdocSent;

/**
 * EdocSentSearch represents the model behind the search form of `app\models\EdocSent`.
 */
class EdocSentSearch extends EdocSent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['edoc_id', 'e_id', 'edoc_read_id', 'r_date', 'edoc_type_id', 'e_id_sent', 'e_id_dud', 'user_get', 'date_get', 'ip_get', 'e_id_radio', 'dep_id'], 'safe'],
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
        $query = EdocSent::find()
        ->joinWith(['edocMain','edocRead','edocDep']);

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
        ]);

        $query->andFilterWhere(['like', 'edoc_id', $this->edoc_id])
            ->andFilterWhere(['like', 'e_id', $this->e_id])
            ->andFilterWhere(['like', 'edoc_read.edoc_read_id', $this->edoc_read_id])
            ->andFilterWhere(['like', 'r_date', $this->r_date])
            ->andFilterWhere(['like', 'edoc_type_id', $this->edoc_type_id])
            ->andFilterWhere(['like', 'e_id_sent', $this->e_id_sent])
            ->andFilterWhere(['like', 'e_id_dud', $this->e_id_dud])
            ->andFilterWhere(['like', 'user_get', $this->user_get])
            ->andFilterWhere(['like', 'date_get', $this->date_get])
            ->andFilterWhere(['like', 'ip_get', $this->ip_get])
            ->andFilterWhere(['like', 'e_id_radio', $this->e_id_radio])
            ->andFilterWhere(['like', 'edoc_dep.dep_id', $this->dep_id]);

        return $dataProvider;
    }
}
