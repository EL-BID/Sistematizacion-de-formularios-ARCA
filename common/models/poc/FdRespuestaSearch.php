<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdRespuesta;

/**
 * FdRespuestaSearch represents the model behind the search form about `common\models\poc\FdRespuesta`.
 */
class FdRespuestaSearch extends FdRespuesta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_respuesta', 'ra_entero', 'id_conjunto_respuesta', 'id_pregunta', 'id_opcion_select', 'id_tpregunta', 'id_capitulo', 'id_formato', 'id_conjunto_pregunta', 'id_version', 'cantidad_registros'], 'integer'],
            [['ra_fecha', 'ra_check', 'ra_descripcion'], 'safe'],
            [['ra_decimal', 'ra_porcentaje', 'ra_moneda'], 'number'],
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
        $query = FdRespuesta::find();

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
            'id_respuesta' => $this->id_respuesta,
            'ra_fecha' => $this->ra_fecha,
            'ra_entero' => $this->ra_entero,
            'ra_decimal' => $this->ra_decimal,
            'ra_porcentaje' => $this->ra_porcentaje,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'ra_moneda' => $this->ra_moneda,
            'id_pregunta' => $this->id_pregunta,
            'id_opcion_select' => $this->id_opcion_select,
            'id_tpregunta' => $this->id_tpregunta,
            'id_capitulo' => $this->id_capitulo,
            'id_formato' => $this->id_formato,
            'id_conjunto_pregunta' => $this->id_conjunto_pregunta,
            'id_version' => $this->id_version,
            'cantidad_registros' => $this->cantidad_registros,
        ]);

        $query->andFilterWhere(['like', 'ra_check', $this->ra_check])
            ->andFilterWhere(['like', 'ra_descripcion', $this->ra_descripcion]);

        return $dataProvider;
    }
}
