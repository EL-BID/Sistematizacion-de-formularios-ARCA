<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdConjuntoPregunta;

/**
 * FdConjuntoPreguntaSearch represents the model behind the search form about `common\models\poc\FdConjuntoPregunta`.
 */
class FdConjuntoPreguntaSearch extends FdConjuntoPregunta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_conjunto_pregunta', 'id_formato', 'id_version', 'id_tipo_view_formato'], 'integer'],
            [['cod_rol'], 'safe'],
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
        $query = FdConjuntoPregunta::find();

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
            'id_conjunto_pregunta' => $this->id_conjunto_pregunta,
            'id_formato' => $this->id_formato,
            'id_version' => $this->id_version,
            'id_tipo_view_formato' => $this->id_tipo_view_formato,
        ]);

        $query->andFilterWhere(['like', 'cod_rol', $this->cod_rol]);

        return $dataProvider;
    }
}
