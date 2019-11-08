<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdClasificacionPregunta;

/**
 * FdClasificacionPreguntaSearch represents the model behind the search form about `common\models\poc\FdClasificacionPregunta`.
 */
class FdClasificacionPreguntaSearch extends FdClasificacionPregunta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor'], 'safe'],
            [['id_clasificacion', 'id_pregunta'], 'integer'],
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
        $query = FdClasificacionPregunta::find();

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
            'id_clasificacion' => $this->id_clasificacion,
            'id_pregunta' => $this->id_pregunta,
        ]);

        $query->andFilterWhere(['like', 'valor', $this->valor]);

        return $dataProvider;
    }
}
