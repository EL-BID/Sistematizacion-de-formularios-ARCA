<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaEstacionHidrologica;

/**
 * CdaEstacionHidrologicaSearch represents the model behind the search form about `common\models\cda\CdaEstacionHidrologica`.
 */
class CdaEstacionHidrologicaSearch extends CdaEstacionHidrologica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ehidrografica', 'nom_ehidrografica'], 'safe'],
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
        $query = CdaEstacionHidrologica::find();

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
        $query->andFilterWhere(['like', 'id_ehidrografica', $this->id_ehidrografica])
            ->andFilterWhere(['like', 'nom_ehidrografica', $this->nom_ehidrografica]);

        return $dataProvider;
    }
}
