<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\TrTipoPeriodo;

/**
 * TrTipoPeriodoSearch represents the model behind the search form about `common\models\poc\TrTipoPeriodo`.
 */
class TrTipoPeriodoSearch extends TrTipoPeriodo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tperiodo'], 'integer'],
            [['nom_tperiodo'], 'safe'],
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
        $query = TrTipoPeriodo::find();

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
            'id_tperiodo' => $this->id_tperiodo,
        ]);

        $query->andFilterWhere(['like', 'nom_tperiodo', $this->nom_tperiodo]);

        return $dataProvider;
    }
}
