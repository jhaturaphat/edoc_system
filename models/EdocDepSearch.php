<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EdocDep;

/**
 * EdocDepSearch represents the model behind the search form of `app\models\EdocDep`.
 */
class EdocDepSearch extends EdocDep
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_id', 'dep_name', 'dep_user', 'dep_pass', 'sent_txt'], 'safe'],
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
        $query = EdocDep::find();

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
        $query->andFilterWhere(['like', 'dep_id', $this->dep_id])
            ->andFilterWhere(['like', 'dep_name', $this->dep_name])
            ->andFilterWhere(['like', 'dep_user', $this->dep_user])
            ->andFilterWhere(['like', 'dep_pass', $this->dep_pass])
            ->andFilterWhere(['like', 'sent_txt', $this->sent_txt]);

        return $dataProvider;
    }
}
