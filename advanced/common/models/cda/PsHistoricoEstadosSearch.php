<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsHistoricoEstados;

/**
 * PsHistoricoEstadosSearch represents the model behind the search form about `common\models\hidricos\PsHistoricoEstados`.
 */
class PsHistoricoEstadosSearch extends PsHistoricoEstados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_historico_cproceso', 'id_eproceso', 'id_cproceso', 'id_usuario', 'id_actividad', 'id_tgestion','observaciones'], 'default', 'value' => null],
            [['id_historico_cproceso', 'id_eproceso', 'id_cproceso', 'id_usuario', 'id_actividad', 'id_tgestion'], 'integer'],
            [['fecha_estado', 'observaciones'], 'safe'],
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
        $query = PsHistoricoEstados::find();

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
            'id_historico_cproceso' => $this->id_historico_cproceso,
            'fecha_estado' => $this->fecha_estado,
            'id_eproceso' => $this->id_eproceso,
            'id_cproceso' => $this->id_cproceso,
            'id_usuario' => $this->id_usuario,
            'id_actividad' => $this->id_actividad,
            'id_tgestion' => $this->id_tgestion,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])->orderBy(['fecha_estado'=>SORT_ASC]);

        return $dataProvider;
    }
}
