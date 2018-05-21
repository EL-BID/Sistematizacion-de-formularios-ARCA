<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdAgrupacion;

/**
 * FdAgrupacionSearch represents the model behind the search form about `common\models\poc\FdAgrupacion`.
 */
class FdAgrupacionSearch extends FdAgrupacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agrupacion', 'id_tagrupacion', 'num_col', 'num_row'], 'integer'],
            [['nom_agrupacion'], 'safe'],
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
        $query = FdAgrupacion::find();

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
            'id_agrupacion' => $this->id_agrupacion,
            'id_tagrupacion' => $this->id_tagrupacion,
            'num_col' => $this->num_col,
            'num_row' => $this->num_row,
        ]);

        $query->andFilterWhere(['like', 'nom_agrupacion', $this->nom_agrupacion]);

        return $dataProvider;
    }
}
