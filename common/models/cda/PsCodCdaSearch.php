<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsCodCda;

/**
 * PsCodCdaSearch represents the model behind the search form about `common\models\cda\PsCodCda`.
 */
class PsCodCdaSearch extends PsCodCda
{
    
    public $id_cproceso;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_cda', 'id_cod_cda'], 'safe'],
            [['id_cda','id_cproceso'], 'integer'],
            
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
        $query = PsCodCda::find();

        // add conditions that should always apply here
        if(!empty($this->id_cproceso)){
            $query->leftJoin('cda', 'cda.id_cda = ps_cod_cda.id_cda')
                  ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')
                  ->andFilterWhere(['id_cproceso'=>$this->id_cproceso]);
        }
        
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
            'id_cda' => $this->id_cda,
        ]);

        
        
        $query->andFilterWhere(['like', 'cod_cda', $this->cod_cda])
            ->andFilterWhere(['like', 'id_cod_cda', $this->id_cod_cda]);

        return $dataProvider;
    }
}
