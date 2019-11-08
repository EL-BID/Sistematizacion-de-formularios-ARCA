<?php

namespace common\models\pqrs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\pqrs\Pqrs;

/**
 * PqrsSearch represents the model behind the search form about `common\models\pqrs\Pqrs`.
 */
class PqrsSearch extends Pqrs
{
    
    public $numero;
    public $nombres;
    public $nom_eproceso;
    public $nom_actividad;
    public $fecha_solicitud;
    public $ult_fecha_actividad;
    public $ult_fecha_estado;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pqrs', 'num_consecutivo', 'sol_doc_identificacion', 'en_nom_ruc', 'id_cproceso'], 'integer'],
            [['fecha_recepcion', 'sol_nombres', 'sol_direccion', 'sol_email', 'sol_telefono', 'en_nom_nombres', 'en_nom_direccion', 'en_nom_email', 'en_nom_telefono', 'aquien_dirige', 'objeto_peticion', 'descripcion_peticion', 'subtipo_queja', 'subtipo_reclamo', 'subtipo_controversia', 'por_quien_qrc', 'lugar_hechos', 'fecha_hechos', 'naracion_hechos', 'elementos_probatorios', 'denunc_nombre', 'denunc_direccion', 'denunc_telefono', 'subtipo_sugerencia', 'subtipo_felicitacion', 'descripcion_sugerencia', 'sol_cod_provincia', 'sol_cod_canton', 'en_nom_cod_provincia', 'en_nom_cod_canton'], 'safe'],
            [['numero','fecha_solicitud','ult_fecha_actividad','ult_fecha_estado'],'string'],
            [['nombres','nom_eproceso','nom_actividad'],'safe'],
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
        $query = Pqrs::find();

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
            'id_pqrs' => $this->id_pqrs,
            'fecha_recepcion' => $this->fecha_recepcion,
            'num_consecutivo' => $this->num_consecutivo,
            'sol_doc_identificacion' => $this->sol_doc_identificacion,
            'en_nom_ruc' => $this->en_nom_ruc,
            'fecha_hechos' => $this->fecha_hechos,
            'id_cproceso' => $this->id_cproceso,
        ]);

        $query->andFilterWhere(['like', 'sol_nombres', $this->sol_nombres])
            ->andFilterWhere(['like', 'sol_direccion', $this->sol_direccion])
            ->andFilterWhere(['like', 'sol_email', $this->sol_email])
            ->andFilterWhere(['like', 'sol_telefono', $this->sol_telefono])
            ->andFilterWhere(['like', 'en_nom_nombres', $this->en_nom_nombres])
            ->andFilterWhere(['like', 'en_nom_direccion', $this->en_nom_direccion])
            ->andFilterWhere(['like', 'en_nom_email', $this->en_nom_email])
            ->andFilterWhere(['like', 'en_nom_telefono', $this->en_nom_telefono])
            ->andFilterWhere(['like', 'aquien_dirige', $this->aquien_dirige])
            ->andFilterWhere(['like', 'objeto_peticion', $this->objeto_peticion])
            ->andFilterWhere(['like', 'descripcion_peticion', $this->descripcion_peticion])
            ->andFilterWhere(['like', 'subtipo_queja', $this->subtipo_queja])
            ->andFilterWhere(['like', 'subtipo_reclamo', $this->subtipo_reclamo])
            ->andFilterWhere(['like', 'subtipo_controversia', $this->subtipo_controversia])
            ->andFilterWhere(['like', 'por_quien_qrc', $this->por_quien_qrc])
            ->andFilterWhere(['like', 'lugar_hechos', $this->lugar_hechos])
            ->andFilterWhere(['like', 'naracion_hechos', $this->naracion_hechos])
            ->andFilterWhere(['like', 'elementos_probatorios', $this->elementos_probatorios])
            ->andFilterWhere(['like', 'denunc_nombre', $this->denunc_nombre])
            ->andFilterWhere(['like', 'denunc_direccion', $this->denunc_direccion])
            ->andFilterWhere(['like', 'denunc_telefono', $this->denunc_telefono])
            ->andFilterWhere(['like', 'subtipo_sugerencia', $this->subtipo_sugerencia])
            ->andFilterWhere(['like', 'subtipo_felicitacion', $this->subtipo_felicitacion])
            ->andFilterWhere(['like', 'descripcion_sugerencia', $this->descripcion_sugerencia])
            ->andFilterWhere(['like', 'sol_cod_provincia', $this->sol_cod_provincia])
            ->andFilterWhere(['like', 'sol_cod_canton', $this->sol_cod_canton])
            ->andFilterWhere(['like', 'en_nom_cod_provincia', $this->en_nom_cod_provincia])
            ->andFilterWhere(['like', 'en_nom_cod_canton', $this->en_nom_cod_canton]);

        return $dataProvider;
    }
    
    
    /*Search para index solicitado*/
    public function search_modify($params)
    {
        $query = Pqrs::find()->JoinWith('usuario', true)->joinWith('idCproceso',true)->joinWith('estado',true)->joinWith('actividad',true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        
        if(!empty($this->nombres)){
            $query->andFilterWhere(['=', 'usuarios_ap.id_usuario', $this->nombres]);
        }
        
        
        //Agregando Filtros ============================================================================================
        if(!empty($this->numero)){
            $query->andFilterWhere(['like', 'ps_cproceso.numero', $this->numero]);
        }
        
        
        if(!empty($this->nom_eproceso[0])){
            $query->andFilterWhere(['IN', 'ps_estado_proceso.id_eproceso', $this->nom_eproceso]);
        }
        
        if(!empty($this->nom_actividad)){
            $query->andFilterWhere(['=', 'ps_actividad.id_actividad', $this->nom_actividad]);
        }
        
        if(!empty($this->fecha_solicitud)){
            $query->andFilterWhere(['=', 'ps_cproceso.fecha_solicitud', $this->fecha_solicitud]);
        }
        
        if(!empty($this->ult_fecha_actividad)){
            $query->andFilterWhere(['=', 'ps_cproceso.ult_fecha_actividad', $this->ult_fecha_actividad]);
        }
        
         if(!empty($this->ult_fecha_estado)){
            $query->andFilterWhere(['=', 'ps_cproceso.ult_fecha_estado', $this->ult_fecha_estado]);
        }
      
        
        return $dataProvider;
    }
    
}
