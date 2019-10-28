<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaErrores;

/**
 * CdaErroresSearch represents the model behind the search form about `common\models\cda\CdaErrores`.
 */
class CdaErroresSearch extends CdaErrores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_error',  'id_cod_cda','id_cactividad_proceso'], 'integer'],
            [['observaciones'], 'safe'],
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
        $query = CdaErrores::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if(!empty($this->id_cactividad_proceso)){
            
            $query->andFilterWhere([
                'id_cactividad_proceso' => $this->id_cactividad_proceso,
            ]);
        }

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_error' => $this->id_error,
            'id_cod_cda' => $this->id_cod_cda,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
