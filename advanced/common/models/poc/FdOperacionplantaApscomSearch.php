<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdOperacionplantaApscom;

/**
 * FdOperacionplantaApscomSearch represents the model behind the search form about `common\models\poc\FdOperacionplantaApscom`.
 */
class FdOperacionplantaApscomSearch extends FdOperacionplantaApscom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_operacionplanta', 'id_conjunto_respuesta', 'id_junta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['especifique','manual_operacion', 'operacion_planta', 'personal_capacitado', 'frecuencia_mantenimiento', 'problemas'],'safe']
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
    public function search($params,$filtros)
    {
        $query = FdOperacionplantaApscom::find()->alias('a');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       $query->leftJoin('fd_opcion_select b', 'manual_operacion = b.id_opcion_select');
       $query->leftJoin('fd_opcion_select c', 'operacion_planta = c.id_opcion_select');
       $query->leftJoin('fd_opcion_select d', 'personal_capacitado = d.id_opcion_select');
       $query->leftJoin('fd_opcion_select e', 'frecuencia_mantenimiento = e.id_opcion_select');
       $query->leftJoin('fd_opcion_select f', 'problemas = f.id_opcion_select');
       
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_operacionplanta' => $this->id_operacionplanta,
           // 'manual_operacion' => $this->manual_operacion,
            //'operacion_planta' => $this->operacion_planta,
            //'personal_capacitado' => $this->personal_capacitado,
            //'frecuencia_mantenimiento' => $this->frecuencia_mantenimiento,
            //'problemas' => $this->problemas,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_junta' => $this->id_junta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ]);
        
         $query->andFilterWhere(['like', 'a.especifique', $this->especifique])        
        ->andFilterWhere(['like', 'b.nom_opcion_select', $this->manual_operacion])
        ->andFilterWhere(['like', 'c.nom_opcion_select', $this->operacion_planta])
        ->andFilterWhere(['like', 'd.nom_opcion_select', $this->personal_capacitado])
        ->andFilterWhere(['like', 'e.nom_opcion_select', $this->frecuencia_mantenimiento])
        ->andFilterWhere(['like', 'f.nom_opcion_select', $this->problemas]);
        
            $query->andFilterWhere([            
            'id_conjunto_respuesta' => $filtros['FdOperacionplantaApscomSearch']['id_conjunto_respuesta'],
            'id_pregunta' => $filtros['FdOperacionplantaApscomSearch']['id_pregunta'],
            'id_respuesta' => $filtros['FdOperacionplantaApscomSearch']['id_respuesta'],            
            'id_junta' => $filtros['FdOperacionplantaApscomSearch']['id_junta'],   
        ]);


        return $dataProvider;
    }
}
