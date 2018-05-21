<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdPreguntaDescendiente;

/**
 * FdPreguntaDescendienteSearch represents the model behind the search form about `common\models\poc\FdPreguntaDescendiente`.
 */
class FdPreguntaDescendienteSearch extends FdPreguntaDescendiente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pregunta_padre', 'id_pregunta_descendiente', 'id_version_descendiente', 'id_version_padre'], 'integer'],
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
        $query = FdPreguntaDescendiente::find();

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
            'id_pregunta_padre' => $this->id_pregunta_padre,
            'id_pregunta_descendiente' => $this->id_pregunta_descendiente,
            'id_version_descendiente' => $this->id_version_descendiente,
            'id_version_padre' => $this->id_version_padre,
        ]);

        return $dataProvider;
    }
}
