<?php

namespace common\models\notificaciones;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\notificaciones\TarTareaProgramada;

/**
 * TarTareaProgramadaSearch represents the model behind the search form about `common\models\notificaciones\TarTareaProgramada`.
 */
class TarTareaProgramadaSearch extends TarTareaProgramada
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tarea_programada', 'intervalo_ejecucion', 'numero_ejecucion'], 'integer'],
            [['nom_tarea_programada', 'fecha_inicio', 'fecha_termina', 'fecha_proxima_eje'], 'safe'],
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
        $query = TarTareaProgramada::find()->where(['estado'=>'s']);

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
            'id_tarea_programada' => $this->id_tarea_programada,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_termina' => $this->fecha_termina,
            'fecha_proxima_eje' => $this->fecha_proxima_eje,
            'intervalo_ejecucion' => $this->intervalo_ejecucion,
            'numero_ejecucion' => $this->numero_ejecucion,
        ]);

        $query->andFilterWhere(['like', 'nom_tarea_programada', $this->nom_tarea_programada]);

        return $dataProvider;
    }
}
