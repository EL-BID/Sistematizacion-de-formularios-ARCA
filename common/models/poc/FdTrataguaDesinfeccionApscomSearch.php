<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdTrataguaDesinfeccionApscom;

/**
 * FdTrataguaDesinfeccionApscomSearch represents the model behind the search form about `common\models\poc\FdTrataguaDesinfeccionApscom`.
 */
class FdTrataguaDesinfeccionApscomSearch extends FdTrataguaDesinfeccionApscom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_trat_aguadesinf_apscom', 'realiza_desinfeccion', 'metodo_desinfeccion', 'mide_salida_desinfeccion', 'estado_func_sistema', 'problemas_identificados', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['ubicacion_lug_tratamiento', 'especifique_otro_metdesinf', 'especifique_otros_problemas'], 'safe'],
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
        $query = FdTrataguaDesinfeccionApscom::find();

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
            'id_trat_aguadesinf_apscom' => $this->id_trat_aguadesinf_apscom,
            'realiza_desinfeccion' => $this->realiza_desinfeccion,
            'metodo_desinfeccion' => $this->metodo_desinfeccion,
            'mide_salida_desinfeccion' => $this->mide_salida_desinfeccion,
            'estado_func_sistema' => $this->estado_func_sistema,
            'problemas_identificados' => $this->problemas_identificados,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
            'id_junta' => $this->id_junta,
        ]);

        $query->andFilterWhere(['like', 'ubicacion_lug_tratamiento', $this->ubicacion_lug_tratamiento])
            ->andFilterWhere(['like', 'especifique_otro_metdesinf', $this->especifique_otro_metdesinf])
            ->andFilterWhere(['like', 'especifique_otros_problemas', $this->especifique_otros_problemas]);

        return $dataProvider;
    }
}
