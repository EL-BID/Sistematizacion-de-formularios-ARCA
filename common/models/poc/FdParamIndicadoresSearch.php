<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdParamIndicadores;

/**
 * FdParamIndicadoresSearch represents the model behind the search form about `common\models\poc\FdParamIndicadores`.
 */
class FdParamIndicadoresSearch extends FdParamIndicadores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_indicador', 'item'], 'integer'],
            [['tipo_indicador', 'indicador', 'variable_a', 'variable_b', 'formula', 'detalle', 'consideracion'], 'safe'],
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
        $query = FdParamIndicadores::find();

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
            'id_indicador' => $this->id_indicador,
            'item' => $this->item,
        ]);

        $query->andFilterWhere(['like', 'tipo_indicador', $this->tipo_indicador])
            ->andFilterWhere(['like', 'indicador', $this->indicador])
            ->andFilterWhere(['like', 'variable_a', $this->variable_a])
            ->andFilterWhere(['like', 'variable_b', $this->variable_b])
            ->andFilterWhere(['like', 'formula', $this->formula])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'consideracion', $this->consideracion]);

        return $dataProvider;
    }
}
