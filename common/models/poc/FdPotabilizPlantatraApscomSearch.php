<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdPotabilizPlantatraApscom;

/**
 * FdPotabilizPlantatraApscomSearch represents the model behind the search form about `common\models\poc\FdPotabilizPlantatraApscom`.
 */
class FdPotabilizPlantatraApscomSearch extends FdPotabilizPlantatraApscom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_potab_plantatr_apscom', 'tipo_planta_tratatmiento', 'metodo_desinfeccion_planta', 'midicion_agua_tratplanta', 'estado_planta', 'problemas_identificados', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['ubicacion_lug_ptratamiento', 'especifique_tplantat', 'especifique_metdesinfeccionp'], 'safe'],
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
        $query = FdPotabilizPlantatraApscom::find();

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
            'id_potab_plantatr_apscom' => $this->id_potab_plantatr_apscom,
            'tipo_planta_tratatmiento' => $this->tipo_planta_tratatmiento,
            'metodo_desinfeccion_planta' => $this->metodo_desinfeccion_planta,
            'midicion_agua_tratplanta' => $this->midicion_agua_tratplanta,
            'estado_planta' => $this->estado_planta,
            'problemas_identificados' => $this->problemas_identificados,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
            'id_junta' => $this->id_junta,
        ]);

        $query->andFilterWhere(['like', 'ubicacion_lug_ptratamiento', $this->ubicacion_lug_ptratamiento])
            ->andFilterWhere(['like', 'especifique_tplantat', $this->especifique_tplantat])
            ->andFilterWhere(['like', 'especifique_metdesinfeccionp', $this->especifique_metdesinfeccionp]);

        return $dataProvider;
    }
}
