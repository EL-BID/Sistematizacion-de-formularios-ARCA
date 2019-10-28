<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdResulEvaluaciones;

/**
 * FdResulEvaluacionesSearch represents the model behind the search form about `common\models\poc\FdResulEvaluaciones`.
 */
class FdResulEvaluacionesSearch extends FdResulEvaluaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_resul_evaluaciones', 'id_evaluacion', 'id_conjunto_respuesta'], 'integer'],
            [['puntaje'], 'number'],
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
        $query = FdResulEvaluaciones::find();

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
            'id_resul_evaluaciones' => $this->id_resul_evaluaciones,
            'id_evaluacion' => $this->id_evaluacion,
            'puntaje' => $this->puntaje,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
        ]);

        return $dataProvider;
    }
}
