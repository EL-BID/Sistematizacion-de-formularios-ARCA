<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaSolicitudInformacion;

/**
 * CdaSolicitudInformacionSearch represents the model behind the search form about `common\models\hidricos\CdaSolicitudInformacion`.
 */
class CdaSolicitudInformacionSearch extends CdaSolicitudInformacion
{
    
    public $tipo;
    public $id_cda_solicitud;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_solicitud_info', 'id_cda_solicitud','id_tinfo_faltante', 'id_treporte', 'id_cactividad_proceso', 'id_tatencion', 'id_cda_tramite', 'id_trespuesta', 'id_cactividad_proceso_res'], 'integer'],
            [['observaciones', 'oficio_atencion','forma_atencion_cda', 'fecha_atencion', 'observaciones_res', 'oficio_respuesta', 'fecha_respuesta','estado','causa_correcion'], 'safe'],
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
        $query = CdaSolicitudInformacion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        

        $this->load($params);

//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_solicitud_info' => $this->id_solicitud_info,
            'id_tinfo_faltante' => $this->id_tinfo_faltante,
            'id_treporte' => $this->id_treporte,
            'id_cactividad_proceso' => $this->id_cactividad_proceso,
            'id_tatencion' => $this->id_tatencion,
            'fecha_atencion' => $this->fecha_atencion,
            'id_cda_tramite' => $this->id_cda_tramite,
            'id_trespuesta' => $this->id_trespuesta,
            'fecha_respuesta' => $this->fecha_respuesta,
            'id_cactividad_proceso_res' => $this->id_cactividad_proceso_res,
            'id_cda_solicitud'=>$this->id_cda_solicitud,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'oficio_atencion', $this->oficio_atencion])
            ->andFilterWhere(['like', 'observaciones_res', $this->observaciones_res]);
        
        
       /* if($this->tipo == 2 or $this->tipo == 3){
            $query->orWhere(['oficio_respuesta' => null]);
            $query->andWhere(['id_cda_tramite'=>$this->id_cda_tramite]);
        }else{*/
            $query->andFilterWhere(['like', 'oficio_respuesta', $this->oficio_respuesta]);
        //}
            

        return $dataProvider;
    }
}
