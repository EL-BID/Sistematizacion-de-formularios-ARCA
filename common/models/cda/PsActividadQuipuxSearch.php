<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsActividadQuipux;

/**
 * PsActividadQuipuxSearch represents the model behind the search form about `common\models\hidricos\PsActividadQuipux`.
 */
class PsActividadQuipuxSearch extends PsActividadQuipux
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_actividad_quipux', 'id_cproceso'], 'integer'],
            [['fecha_actividad_quipux', 'usuario_actual_quipux', 'accion_realizada', 'descripcion', 'estado_actual', 'numero_referencia', 'usuario_origen_quipux', 'usuario_destino_quipux', 'respondido_a', 'fecha_carga'], 'safe'],
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
        $query = PsActividadQuipux::find();

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
            'id_actividad_quipux' => $this->id_actividad_quipux,
            'fecha_actividad_quipux' => $this->fecha_actividad_quipux,
            'fecha_carga' => $this->fecha_carga,
            'id_cproceso' => $this->id_cproceso,
        ]);

        $query->andFilterWhere(['like', 'usuario_actual_quipux', $this->usuario_actual_quipux])
            ->andFilterWhere(['like', 'accion_realizada', $this->accion_realizada])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'estado_actual', $this->estado_actual])
            ->andFilterWhere(['like', 'numero_referencia', $this->numero_referencia])
            ->andFilterWhere(['like', 'usuario_origen_quipux', $this->usuario_origen_quipux])
            ->andFilterWhere(['like', 'usuario_destino_quipux', $this->usuario_destino_quipux])
            ->andFilterWhere(['like', 'respondido_a', $this->respondido_a]);

        return $dataProvider;
    }
    
    
    /*Funcion de busqueda para detalle proceso
     * Oficios Relacionados se saca nueva consulta para no modificar la grilla por defecto
     * se establece id_cproceso => desde el controlador
     * numero referencia not null
     * y se toma el sql distinct
     */
    public function searchdetproceso($params)
    {
        $query = PsActividadQuipux::find()
                ->select(['fecha_actividad_quipux','numero_referencia'])->distinct()
                ->where(['not', ['numero_referencia' => null]]);

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

        if(!empty($this->id_cproceso)){
            $query->andFilterWhere([
            'id_cproceso' => $this->id_cproceso,
            ]);
        }
        // grid filtering conditions
        /*$query->andFilterWhere([
            'id_actividad_quipux' => $this->id_actividad_quipux,
            'fecha_actividad_quipux' => $this->fecha_actividad_quipux,
            'fecha_carga' => $this->fecha_carga,
            'id_cproceso' => $this->id_cproceso,
        ]);

        $query->andFilterWhere(['like', 'usuario_actual_quipux', $this->usuario_actual_quipux])
            ->andFilterWhere(['like', 'accion_realizada', $this->accion_realizada])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'estado_actual', $this->estado_actual])
            ->andFilterWhere(['like', 'numero_referencia', $this->numero_referencia])
            ->andFilterWhere(['like', 'usuario_origen_quipux', $this->usuario_origen_quipux])
            ->andFilterWhere(['like', 'usuario_destino_quipux', $this->usuario_destino_quipux])
            ->andFilterWhere(['like', 'respondido_a', $this->respondido_a]);*/

        return $dataProvider;
    }
}
