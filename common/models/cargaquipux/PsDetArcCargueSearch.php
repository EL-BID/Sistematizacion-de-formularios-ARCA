<?php

namespace common\models\cargaquipux;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cargaquipux\PsDetArcCargue;

/**
 * PsDetArcCargueSearch represents the model behind the search form about `common\models\cargaquipux\PsDetArcCargue`.
 */
class PsDetArcCargueSearch extends PsDetArcCargue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_archivo_cargue', 'id_det_arc_cargue', 'num_columna_excel'], 'integer'],
            [['num_nom_hoja', 'nom_columna_cargue', 'nom_columna_excel'], 'safe'],
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
        $query = PsDetArcCargue::find();

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
            'id_archivo_cargue' => $this->id_archivo_cargue,
            'id_det_arc_cargue' => $this->id_det_arc_cargue,
            'num_columna_excel' => $this->num_columna_excel,
        ]);

        $query->andFilterWhere(['like', 'num_nom_hoja', $this->num_nom_hoja])
            ->andFilterWhere(['like', 'nom_columna_cargue', $this->nom_columna_cargue])
            ->andFilterWhere(['like', 'nom_columna_excel', $this->nom_columna_excel]);

        return $dataProvider;
    }
}
