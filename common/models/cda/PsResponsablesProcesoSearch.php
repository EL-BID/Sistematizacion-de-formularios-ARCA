<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsResponsablesProceso;

/**
 * PsResponsablesProcesoSearch represents the model behind the search form about `common\models\cda\PsResponsablesProceso`.
 */
class PsResponsablesProcesoSearch extends PsResponsablesProceso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_responsable_proceso', 'id_cproceso', 'id_tresponsabilidad'], 'integer'],
            [['id_usuario'], 'number'],
            [['fecha', 'observacion'], 'safe'],
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
        $query = PsResponsablesProceso::find();

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
            'id_responsable_proceso' => $this->id_responsable_proceso,
            'id_usuario' => $this->id_usuario,
            'id_cproceso' => $this->id_cproceso,
            'id_tresponsabilidad' => $this->id_tresponsabilidad,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
