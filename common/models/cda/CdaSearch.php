<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\Cda;

/**
 * CdaSearch represents the model behind the search form about `common\models\cda\Cda`.
 */
class CdaSearch extends Cda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cda', 'cod_centro_atencion_ciudadano', 'id_cactividad_proceso'], 'integer'],
            [['fecha_ingreso_quipux', 'institucion_solicitante', 'solicitante', 'cod_cda'], 'safe'],
            [['id_demarcacion'], 'number'],
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
        $query = Cda::find();

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
            'id_cda' => $this->id_cda,
            'fecha_ingreso_quipux' => $this->fecha_ingreso_quipux,
            'cod_centro_atencion_ciudadano' => $this->cod_centro_atencion_ciudadano,
            'id_demarcacion' => $this->id_demarcacion,
            'id_cactividad_proceso' => $this->id_cactividad_proceso,
        ]);

        $query->andFilterWhere(['like', 'institucion_solicitante', $this->institucion_solicitante])
            ->andFilterWhere(['like', 'solicitante', $this->solicitante])
            ->andFilterWhere(['like', 'cod_cda', $this->cod_cda]);

        return $dataProvider;
    }
}
