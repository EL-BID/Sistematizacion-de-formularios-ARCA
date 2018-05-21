<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaAnalisisHidrologico;

/**
 * CdaAnalisisHidrologicoSearch represents the model behind the search form about `common\models\cda\CdaAnalisisHidrologico`.
 */
class CdaAnalisisHidrologicoSearch extends CdaAnalisisHidrologico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_analisis_hidrologico', 'id_cartografia', 'id_metodologia', 'id_cda'], 'integer'],
            [['id_ehidrografica', 'id_emeteorologica', 'informe_utilizado', 'probabilidad', 'observacion'], 'safe'],
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
        $query = CdaAnalisisHidrologico::find();

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
            'id_analisis_hidrologico' => $this->id_analisis_hidrologico,
            'id_cartografia' => $this->id_cartografia,
            'id_metodologia' => $this->id_metodologia,
            'id_cda' => $this->id_cda,
        ]);

        $query->andFilterWhere(['like', 'id_ehidrografica', $this->id_ehidrografica])
            ->andFilterWhere(['like', 'id_emeteorologica', $this->id_emeteorologica])
            ->andFilterWhere(['like', 'informe_utilizado', $this->informe_utilizado])
            ->andFilterWhere(['like', 'probabilidad', $this->probabilidad])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
