<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdComandoPregunta;

/**
 * FdComandoPreguntaSearch represents the model behind the search form about `common\models\poc\FdComandoPregunta`.
 */
class FdComandoPreguntaSearch extends FdComandoPregunta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado'], 'safe'],
            [['id_comando', 'id_pregunta'], 'integer'],
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
        $query = FdComandoPregunta::find();

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
            'id_comando' => $this->id_comando,
            'id_pregunta' => $this->id_pregunta,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
