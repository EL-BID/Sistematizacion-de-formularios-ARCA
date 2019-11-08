<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsProceso;

/**
 * PsProcesoSearch represents the model behind the search form about `common\models\cda\PsProceso`.
 */
class PsProcesoSearch extends PsProceso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proceso', 'id_tproceso', 'id_modulo'], 'integer'],
            [['nom_proceso', 'url_datos_basicos'], 'safe'],
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
        $query = PsProceso::find();

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
            'id_proceso' => $this->id_proceso,
            'id_tproceso' => $this->id_tproceso,
            'id_modulo' => $this->id_modulo,
        ]);

        $query->andFilterWhere(['like', 'nom_proceso', $this->nom_proceso])
            ->andFilterWhere(['like', 'url_datos_basicos', $this->url_datos_basicos]);

        return $dataProvider;
    }
}
