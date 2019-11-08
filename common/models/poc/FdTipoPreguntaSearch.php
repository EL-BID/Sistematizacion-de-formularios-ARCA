<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdTipoPregunta;

/**
 * FdTipoPreguntaSearch represents the model behind the search form about `common\models\poc\FdTipoPregunta`.
 */
class FdTipoPreguntaSearch extends FdTipoPregunta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tpregunta'], 'integer'],
            [['nom_tpregunta', 'pantalla_lectura', 'url_subpantalla'], 'safe'],
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
        $query = FdTipoPregunta::find();

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
            'id_tpregunta' => $this->id_tpregunta,
        ]);

        $query->andFilterWhere(['like', 'nom_tpregunta', $this->nom_tpregunta])
            ->andFilterWhere(['like', 'pantalla_lectura', $this->pantalla_lectura])
            ->andFilterWhere(['like', 'url_subpantalla', $this->url_subpantalla]);

        return $dataProvider;
    }
}
