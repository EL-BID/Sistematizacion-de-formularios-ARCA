<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaUsoSolicitado;

/**
 * CdaUsoSolicitadoSearch represents the model behind the search form about `common\models\cda\CdaUsoSolicitado`.
 */
class CdaUsoSolicitadoSearch extends CdaUsoSolicitado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_uso_solicitado'], 'integer'],
            [['nom_uso_solicitado'], 'safe'],
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
        $query = CdaUsoSolicitado::find();

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
            'id_uso_solicitado' => $this->id_uso_solicitado,
        ]);

        $query->andFilterWhere(['like', 'nom_uso_solicitado', $this->nom_uso_solicitado]);

        return $dataProvider;
    }
}
