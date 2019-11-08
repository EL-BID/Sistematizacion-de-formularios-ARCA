<?php

namespace common\models\cargaquipux;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cargaquipux\PsCargue;

/**
 * PsCargueSearch represents the model behind the search form about `common\models\cargaquipux\PsCargue`.
 */
class PsCargueSearch extends PsCargue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cargues'], 'integer'], //, 
               [['id_archivo_cargue'], 'string'], //, 
            [['ruta', 'procesado', 'fecha_cargue', 'fecha_proceso'], 'safe'],
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
        $query = PsCargue::find();

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
            'id_cargues' => $this->id_cargues,
            'fecha_cargue' => $this->fecha_cargue,
            'fecha_proceso' => $this->fecha_proceso,
          //  'id_archivo_cargue' => $this->id_archivo_cargue,
        ]);
        $query->joinWith(['idArchivoCargue']);

        $query->andFilterWhere(['like', 'ruta', $this->ruta])
            ->andFilterWhere(['like', 'procesado', $this->procesado]);
        $query->andFilterWhere(['like', 'ps_archivo_cargue.nom_archivo_cargue', $this->id_archivo_cargue]);

        return $dataProvider;
    }
}
