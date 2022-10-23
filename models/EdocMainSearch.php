<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdocMain;

/**
 * EdocMainSearch represents the model behind the search form of `app\models\EdocMain`.
 */
class EdocMainSearch extends EdocMain
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['edoc_id', 'e_id', 'edoc_no_get', 'edoc_no_sent', 'edoc_no_keep', 'edoc_date_doc', 'edoc_date_get', 'edoc_from', 'edoc_to', 'edoc_name', 'dep_id', 'edoc_type_id', 'edoc_status_id', 'edoc_read_id', 'path', 'edoc_important_id', 'e_id_sent', 'e_id_dud', 'e_id_radio', 'ip_get_sent'], 'safe'],
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
        $query = EdocMain::find();

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
        $query->andFilterWhere(['like', 'edoc_id', $this->edoc_id])
            ->andFilterWhere(['like', 'e_id', $this->e_id])
            ->andFilterWhere(['like', 'edoc_no_get', $this->edoc_no_get])
            ->andFilterWhere(['like', 'edoc_no_sent', $this->edoc_no_sent])
            ->andFilterWhere(['like', 'edoc_no_keep', $this->edoc_no_keep])
            ->andFilterWhere(['like', 'edoc_date_doc', $this->edoc_date_doc])
            ->andFilterWhere(['like', 'edoc_date_get', $this->edoc_date_get])
            ->andFilterWhere(['like', 'edoc_from', $this->edoc_from])
            ->andFilterWhere(['like', 'edoc_to', $this->edoc_to])
            ->andFilterWhere(['like', 'edoc_name', $this->edoc_name])
            ->andFilterWhere(['like', 'dep_id', $this->dep_id])
            ->andFilterWhere(['like', 'edoc_type_id', $this->edoc_type_id])
            ->andFilterWhere(['like', 'edoc_status_id', $this->edoc_status_id])
            ->andFilterWhere(['like', 'edoc_read_id', $this->edoc_read_id])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'edoc_important_id', $this->edoc_important_id])
            ->andFilterWhere(['like', 'e_id_sent', $this->e_id_sent])
            ->andFilterWhere(['like', 'e_id_dud', $this->e_id_dud])
            ->andFilterWhere(['like', 'e_id_radio', $this->e_id_radio])
            ->andFilterWhere(['like', 'ip_get_sent', $this->ip_get_sent]);

        return $dataProvider;
    }
}
