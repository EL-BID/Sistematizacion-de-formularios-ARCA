<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\TrTipoNatuJuridica;

/**
 * TrTipoNatuJuridicaSearch represents the model behind the search form about `common\models\poc\TrTipoNatuJuridica`.
 */
class TrTipoNatuJuridicaSearch extends TrTipoNatuJuridica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_natu_juridica'], 'integer'],
            [['nom_natu_juridica'], 'safe'],
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
        $query = TrTipoNatuJuridica::find();

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
            'id_natu_juridica' => $this->id_natu_juridica,
        ]);

        $query->andFilterWhere(['like', 'nom_natu_juridica', $this->nom_natu_juridica]);

        return $dataProvider;
    }
}
