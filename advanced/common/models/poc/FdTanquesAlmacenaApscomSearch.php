<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdTanquesAlmacenaApscom;

/**
 * FdTanquesAlmacenaApscomSearch represents the model behind the search form about `common\models\poc\FdTanquesAlmacenaApscom`.
 */
class FdTanquesAlmacenaApscomSearch extends FdTanquesAlmacenaApscom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tanquesalmacena',  'id_conjunto_respuesta', 'id_junta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['ubicacion_tanque','especifique','medicion_entrada', 'material', 'frecuencia_mantenimiento', 'estado_tanque', 'problemas'], 'safe'],
            [['capacidad_tanque'], 'number'],            
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
        $query = FdTanquesAlmacenaApscom::find()->alias('a');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
       $query->leftJoin('fd_opcion_select b', 'medicion_entrada = b.id_opcion_select');
       $query->leftJoin('fd_opcion_select c', 'material = c.id_opcion_select');
       $query->leftJoin('fd_opcion_select d', 'frecuencia_mantenimiento = d.id_opcion_select');
       $query->leftJoin('fd_opcion_select e', 'estado_tanque = e.id_opcion_select');
       $query->leftJoin('fd_opcion_select f', 'problemas = f.id_opcion_select');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_tanquesalmacena' => $this->id_tanquesalmacena,
            'capacidad_tanque' => $this->capacidad_tanque,
            'medicion_entrada' => $this->medicion_entrada,
            //'material' => $this->material,
            //'frecuencia_mantenimiento' => $this->frecuencia_mantenimiento,
            //'estado_tanque' => $this->estado_tanque,
            //'problemas' => $this->problemas,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_junta' => $this->id_junta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ]);
       $query->andFilterWhere(['like', 'a.especifique', $this->especifique])        
        ->andFilterWhere(['like', 'b.nom_opcion_select', $this->medicion_entrada])
        ->andFilterWhere(['like', 'c.nom_opcion_select', $this->material])
        ->andFilterWhere(['like', 'd.nom_opcion_select', $this->frecuencia_mantenimiento])
        ->andFilterWhere(['like', 'e.nom_opcion_select', $this->estado_tanque])
        ->andFilterWhere(['like', 'f.nom_opcion_select', $this->problemas]);
        
            $query->andFilterWhere([            
            'id_conjunto_respuesta' => $filtros['FdTanquesAlmacenaApscomSearch']['id_conjunto_respuesta'],
            'id_pregunta' => $filtros['FdTanquesAlmacenaApscomSearch']['id_pregunta'],
            'id_respuesta' => $filtros['FdTanquesAlmacenaApscomSearch']['id_respuesta'],            
            'id_junta' => $filtros['FdTanquesAlmacenaApscomSearch']['id_junta'],   
        ]);


        return $dataProvider;
    }
}
