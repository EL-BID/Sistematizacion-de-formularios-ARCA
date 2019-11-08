<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\TrTipoDocumento;

/**
 * TrTipoDocumentoSearch represents the model behind the search form about `common\models\poc\TrTipoDocumento`.
 */
class TrTipoDocumentoSearch extends TrTipoDocumento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tdocumento'], 'integer'],
            [['nom_tdocumento'], 'safe'],
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
        $query = TrTipoDocumento::find();

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
            'id_tdocumento' => $this->id_tdocumento,
        ]);

        $query->andFilterWhere(['like', 'nom_tdocumento', $this->nom_tdocumento]);

        return $dataProvider;
    }
}
