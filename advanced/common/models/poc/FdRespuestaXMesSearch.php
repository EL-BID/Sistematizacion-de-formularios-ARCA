<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdRespuestaXMes;

/**
 * FdRespuestaXMesSearch represents the model behind the search form about `common\models\poc\FdRespuestaXMes`.
 */
class FdRespuestaXMesSearch extends FdRespuestaXMes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ene_decimal', 'feb_decimal', 'mar_decimal', 'abr_decimal', 'may_decimal', 'jun_decimal', 'jul_decimal', 'ago_decimal', 'sep_decimal', 'oct_decimal', 'nov_decimal', 'dic_decimal'], 'number'],
            [['id_respuesta', 'id_pregunta', 'id_opcion_select', 'id_respuesta_x_mes'], 'integer'],
            [['descripcion'], 'safe'],
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
        $query = FdRespuestaXMes::find();

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
            'ene_decimal' => $this->ene_decimal,
            'feb_decimal' => $this->feb_decimal,
            'mar_decimal' => $this->mar_decimal,
            'abr_decimal' => $this->abr_decimal,
            'may_decimal' => $this->may_decimal,
            'jun_decimal' => $this->jun_decimal,
            'jul_decimal' => $this->jul_decimal,
            'ago_decimal' => $this->ago_decimal,
            'sep_decimal' => $this->sep_decimal,
            'oct_decimal' => $this->oct_decimal,
            'nov_decimal' => $this->nov_decimal,
            'dic_decimal' => $this->dic_decimal,
            'id_respuesta' => $this->id_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_opcion_select' => $this->id_opcion_select,
            'id_respuesta_x_mes' => $this->id_respuesta_x_mes,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
