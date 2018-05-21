<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsActividad;

/**
 * PsActividadSearch represents the model behind the search form about `common\models\cda\PsActividad`.
 */
class PsActividadSearch extends PsActividad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_actividad', 'orden', 'id_proceso', 'id_tactividad', 'id_tselect', 'id_clasif_actividad', 'plazo_alerta'], 'integer'],
            [['nom_actividad', 'subpantalla', 'campo_fecha_alerta'], 'safe'],
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
        $query = PsActividad::find();

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
            'id_actividad' => $this->id_actividad,
            'orden' => $this->orden,
            'id_proceso' => $this->id_proceso,
            'id_tactividad' => $this->id_tactividad,
            'id_tselect' => $this->id_tselect,
            'id_clasif_actividad' => $this->id_clasif_actividad,
            'plazo_alerta' => $this->plazo_alerta,
        ]);

        $query->andFilterWhere(['like', 'nom_actividad', $this->nom_actividad])
            ->andFilterWhere(['like', 'subpantalla', $this->subpantalla])
            ->andFilterWhere(['like', 'campo_fecha_alerta', $this->campo_fecha_alerta]);

        return $dataProvider;
    }
}
