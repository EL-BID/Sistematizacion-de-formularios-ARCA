<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaMetodologia;

/**
 * CdaMetodologiaSearch represents the model behind the search form about `common\models\cda\CdaMetodologia`.
 */
class CdaMetodologiaSearch extends CdaMetodologia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_metodologia'], 'integer'],
            [['nom_metodologia'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = CdaMetodologia::find();

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
            'id_metodologia' => $this->id_metodologia,
        ]);

        $query->andFilterWhere(['like', 'nom_metodologia', $this->nom_metodologia]);

        return $dataProvider;
    }
}
