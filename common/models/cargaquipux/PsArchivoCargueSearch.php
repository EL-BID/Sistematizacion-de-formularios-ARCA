<?php

namespace common\models\cargaquipux;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cargaquipux\PsArchivoCargue;

/**
 * PsArchivoCargueSearch represents the model behind the search form about `common\models\cargaquipux\PsArchivoCargue`.
 */
class PsArchivoCargueSearch extends PsArchivoCargue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_archivo_cargue', 'fila_inicio', 'id_tarea_programada'], 'integer'],
            [['nom_archivo_cargue', 'nom_tabla_cargue', 'estado'], 'safe'],
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
        $query = PsArchivoCargue::find();

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
            'fila_inicio' => $this->fila_inicio,
            'id_tarea_programada' => $this->id_tarea_programada,
        ]);

        $query->andFilterWhere(['like', 'nom_archivo_cargue', $this->nom_archivo_cargue])
            ->andFilterWhere(['like', 'nom_tabla_cargue', $this->nom_tabla_cargue])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
