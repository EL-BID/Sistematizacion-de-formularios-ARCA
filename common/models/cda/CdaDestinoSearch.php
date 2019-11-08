<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaDestino;

/**
 * CdaDestinoSearch represents the model behind the search form about `common\models\cda\CdaDestino`.
 */
class CdaDestinoSearch extends CdaDestino
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_destino'], 'integer'],
            [['nom_destino'], 'safe'],
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
        $query = CdaDestino::find();

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
            'id_destino' => $this->id_destino,
        ]);

        $query->andFilterWhere(['like', 'nom_destino', $this->nom_destino]);

        return $dataProvider;
    }
}
