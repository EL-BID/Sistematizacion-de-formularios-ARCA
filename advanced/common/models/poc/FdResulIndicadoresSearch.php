<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdResulIndicadores;

/**
 * FdResulIndicadoresSearch represents the model behind the search form about `common\models\poc\FdResulIndicadores`.
 */
class FdResulIndicadoresSearch extends FdResulIndicadores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_resul_indicadores', 'id_indicador', 'id_conjunto_respuesta'], 'integer'],
            [['resultado'], 'number'],
            [['recomendacion'], 'safe'],
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
        $query = FdResulIndicadores::find();

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
            'id_resul_indicadores' => $this->id_resul_indicadores,
            'id_indicador' => $this->id_indicador,
            'resultado' => $this->resultado,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
        ]);

        $query->andFilterWhere(['like', 'recomendacion', $this->recomendacion]);

        return $dataProvider;
    }
}
