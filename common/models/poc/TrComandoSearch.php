<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\TrComando;

/**
 * TrComandoSearch represents the model behind the search form about `common\models\poc\TrComando`.
 */
class TrComandoSearch extends TrComando
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comando'], 'integer'],
            [['nom_comando', 'clase_comando', 'hash_comando'], 'safe'],
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
        $query = TrComando::find();

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
            'id_comando' => $this->id_comando,
        ]);

        $query->andFilterWhere(['like', 'nom_comando', $this->nom_comando])
            ->andFilterWhere(['like', 'clase_comando', $this->clase_comando])
            ->andFilterWhere(['like', 'hash_comando', $this->hash_comando]);

        return $dataProvider;
    }
    
    
    
}
