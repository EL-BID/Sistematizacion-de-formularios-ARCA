<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaAnalisisHidrologico;

/**
 * CdaAnalisisHidrologicoSearch represents the model behind the search form about `common\models\cda\CdaAnalisisHidrologico`.
 */
class CdaAnalisisHidrologicoSearch extends CdaAnalisisHidrologico
{
    
    public $nom_cartografia;
    public $nom_metodologia;
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_analisis_hidrologico', 'id_metodologia', 'id_cod_cda','id_cactividad_proceso','id_tipo','id_actividad'], 'integer'],
            [['nom_cartografia','nom_metodologia'],'safe'],
            [['id_ehidrografica', 'id_emeteorologica', 'informe_utilizado', 'probabilidad', 'observacion'], 'safe'],
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
        $query = CdaAnalisisHidrologico::find();

        // add conditions that should always apply here
        $query->joinWith(['idCartografia']);
        $query->joinWith(['idMetodologia']);
        
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
         
        if(!empty($this->id_cactividad_proceso)){
            
             $query->andFilterWhere([
                'id_cactividad_proceso'=>$this->id_cactividad_proceso,
             ]);
            
        }

//        if (!$this->validate()) {
//            return $dataProvider;
//        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_analisis_hidrologico' => $this->id_analisis_hidrologico,
            'id_cartografia' => $this->id_cartografia,
            'id_metodologia' => $this->id_metodologia,
            'id_cod_cda' => $this->id_cod_cda,
            'id_cactividad_proceso'=>$this->id_cactividad_proceso,
            'id_actividad'=>$this->id_actividad,
        ]);

        $query->andFilterWhere(['like', 'id_ehidrografica', $this->id_ehidrografica])
            ->andFilterWhere(['like', 'id_emeteorologica', $this->id_emeteorologica])
            ->andFilterWhere(['like', 'informe_utilizado', $this->informe_utilizado])
            ->andFilterWhere(['like', 'probabilidad', $this->probabilidad])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);
        
        if(!empty($this->nom_cartografia)){
           $query->andFilterWhere(['like', 'cda_cartografia.nom_cartografia', $this->nom_cartografia]); 
        }
        
         if(!empty($this->nom_metodologia)){
           $query->andFilterWhere(['like', 'cda_metodologia.nom_metodologia', $this->nom_metodologia]); 
        }

        return $dataProvider;
    }
}
