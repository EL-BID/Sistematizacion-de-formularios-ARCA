<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsEstadoProceso;

/**
 * PsEstadoProcesoSearch represents the model behind the search form about `common\models\cda\PsEstadoProceso`.
 */
class PsEstadoProcesoSearch extends PsEstadoProceso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_eproceso', 'id_proceso'], 'integer'],
            [['nom_eproceso'], 'safe'],
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
        $query = PsEstadoProceso::find();

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
            'id_eproceso' => $this->id_eproceso,
            'id_proceso' => $this->id_proceso,
        ]);

        $query->andFilterWhere(['like', 'nom_eproceso', $this->nom_eproceso]);

        return $dataProvider;
    }
}
