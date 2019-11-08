<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdPeriodoFormato;

/**
 * FdPeriodoFormatoSearch represents the model behind the search form about `common\models\poc\FdPeriodoFormato`.
 */
class FdPeriodoFormatoSearch extends FdPeriodoFormato
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_creacion'], 'safe'],
            [['id_formato', 'id_periodo'], 'integer'],
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
        $query = FdPeriodoFormato::find();

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
            'fecha_creacion' => $this->fecha_creacion,
            'id_formato' => $this->id_formato,
            'id_periodo' => $this->id_periodo,
        ]);

        return $dataProvider;
    }
}
