<?php

namespace app\modules\backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\DoctorProfile;

/**
 * DoctorProfileSearch represents the model behind the search form of `app\modules\models\DoctorProfile`.
 */
class DoctorProfileSearch extends DoctorProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doctor_id'], 'integer'],
            [['email', 'mobile', 'sub_special', 'avatar', 'image', 'birth_day'], 'safe'],
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
        $query = DoctorProfile::find();

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
            'doctor_id' => $this->doctor_id,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'sub_special', $this->sub_special])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'birth_day', $this->birth_day]);

        return $dataProvider;
    }
}
