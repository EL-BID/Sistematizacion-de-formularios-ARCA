<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsCproceso;

/**
 * PsCprocesoSearch represents the model behind the search form about `common\models\cda\PsCproceso`.
 */
class PsCprocesoSearch extends PsCproceso
{
    public $not_estado;
    public $numnotempty;
    public $tipo;  //Se agrega variable para diferenciar si el pscproceso es procesos cda, o proceso pqrs, se diferencian por la relacion
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cproceso', 'ult_id_eproceso', 'id_proceso', 'id_modulo', 'ult_id_actividad'], 'integer'],
            [['id_usuario', 'ult_id_usuario'], 'number'],
            [['num_quipux', 'fecha_registro_quipux', 'asunto_quipux', 'tipo_documento_quipux', 'ult_fecha_actividad', 'ult_fecha_estado', 'numero'], 'safe'],
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
        $query = PsCproceso::find();
        
//        if($this->tipo == 1){
//           $query->leftJoin('cda', 'cda.id_cproceso_arca=ps_cproceso.id_cproceso');
//        }else if($this->tipo == 2){
//           $query->leftJoin('pqrs', 'pqrs.id_cproceso=ps_cproceso.id_cproceso'); 
//        }
        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
   
        $this->load($params);
        
        Yii::trace("que llega de ".$this->ult_id_usuario,"DEBUG");
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_cproceso' => $this->id_cproceso,
            'ult_id_eproceso' => $this->ult_id_eproceso,
            'id_proceso' => $this->id_proceso,
            'id_usuario' => $this->id_usuario,
            'id_modulo' => $this->id_modulo,
            'fecha_registro_quipux' => $this->fecha_registro_quipux,
            'ult_id_actividad' => $this->ult_id_actividad,
            'ult_id_usuario' => $this->ult_id_usuario,
            'ult_fecha_actividad' => $this->ult_fecha_actividad,
            'ult_fecha_estado' => $this->ult_fecha_estado,
        ]);

        $query->andFilterWhere(['like', 'num_quipux', $this->num_quipux])
            ->andFilterWhere(['like', 'asunto_quipux', $this->asunto_quipux])
            ->andFilterWhere(['like', 'tipo_documento_quipux', $this->tipo_documento_quipux])
            ->andFilterWhere(['like', 'numero', $this->numero]);
        
        if(!empty($this->not_estado)){
            $query->andFilterWhere(['<>', 'ult_id_eproceso', $this->not_estado]);
        }
        
        if($this->numnotempty == 1){
            $query->andFilterWhere(['<>', 'numero', null]);
        }
        
        
        

        return $dataProvider;
    }
}
