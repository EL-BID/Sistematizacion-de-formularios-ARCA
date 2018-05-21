<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\TrPeriodo;

/**
 * TrPeriodoSearch represents the model behind the search form about `common\models\poc\TrPeriodo`.
 */
class TrPeriodoSearch extends TrPeriodo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo', 'vigencia', 'id_tperiodo'], 'integer'],
            [['nom_periodo', 'identificador'], 'safe'],
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
        $query = TrPeriodo::find();

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
            'id_periodo' => $this->id_periodo,
            'vigencia' => $this->vigencia,
            'id_tperiodo' => $this->id_tperiodo,
        ]);

        $query->andFilterWhere(['like', 'nom_periodo', $this->nom_periodo])
            ->andFilterWhere(['like', 'identificador', $this->identificador]);

        return $dataProvider;
    }
}
