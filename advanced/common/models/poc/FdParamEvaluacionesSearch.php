<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdParamEvaluaciones;

/**
 * FdParamEvaluacionesSearch represents the model behind the search form about `common\models\poc\FdParamEvaluaciones`.
 */
class FdParamEvaluacionesSearch extends FdParamEvaluaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_evaluacion', 'item', 'id_pregunta', 'tipo_valoracion', 'porcentaje_ponderacion', 'formato'], 'integer'],
            [['componente', 'criterio', 'condicionante', 'detalle'], 'safe'],
            [['puntuacion'], 'number'],
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
        $query = FdParamEvaluaciones::find();

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
            'id_evaluacion' => $this->id_evaluacion,
            'item' => $this->item,
            'id_pregunta' => $this->id_pregunta,
            'tipo_valoracion' => $this->tipo_valoracion,
            'porcentaje_ponderacion' => $this->porcentaje_ponderacion,
            'puntuacion' => $this->puntuacion,
            'formato' => $this->formato,
        ])->orderBy(['item'=>SORT_ASC]);

        $query->andFilterWhere(['like', 'componente', $this->componente])
            ->andFilterWhere(['like', 'criterio', $this->criterio])
            ->andFilterWhere(['like', 'condicionante', $this->condicionante])
            ->andFilterWhere(['like', 'detalle', $this->detalle]);

        return $dataProvider;
    }
}
