<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdConjuntoRespuesta;

/**
 * FdConjuntoRespuestaSearch represents the model behind the search form about `common\models\poc\FdConjuntoRespuesta`.
 */
class FdConjuntoRespuestaSearch extends FdConjuntoRespuesta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_conjunto_respuesta', 'id_conjunto_pregunta', 'id_formato', 'ult_id_adm_estado', 'id_periodo'], 'integer'],
            [['id_entidad'], 'safe'],
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
        $query = FdConjuntoRespuesta::find();

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
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_conjunto_pregunta' => $this->id_conjunto_pregunta,
            'id_formato' => $this->id_formato,
            'ult_id_adm_estado' => $this->ult_id_adm_estado,
            'id_periodo' => $this->id_periodo,
        ]);

        $query->andFilterWhere(['like', 'id_entidad', $this->id_entidad]);

        return $dataProvider;
    }
}
