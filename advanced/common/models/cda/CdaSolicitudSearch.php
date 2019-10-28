<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaSolicitud;

/**
 * CdaSolicitudSearch represents the model behind the search form about `common\models\cda\CdaSolicitud`.
 */
class CdaSolicitudSearch extends CdaSolicitud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cda_solicitud', 'id_cproceso_arca', 'id_cproceso_senagua', 'numero_tramites', 'id_cda_rol', 'id_dh_cac'], 'integer'],
            [['num_solicitud', 'fecha_solicitud', 'fecha_ingreso', 'tramite_administrativo', 'rol_en_calidad', 'enviado_por'], 'safe'],
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
        $query = CdaSolicitud::find();

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
            'id_cda_solicitud' => $this->id_cda_solicitud,
            'fecha_solicitud' => $this->fecha_solicitud,
            'fecha_ingreso' => $this->fecha_ingreso,
            'id_cproceso_arca' => $this->id_cproceso_arca,
            'id_cproceso_senagua' => $this->id_cproceso_senagua,
            'numero_tramites' => $this->numero_tramites,
            'id_cda_rol' => $this->id_cda_rol,
            'id_dh_cac' => $this->id_dh_cac,
        ]);

        $query->andFilterWhere(['like', 'num_solicitud', $this->num_solicitud])
            ->andFilterWhere(['like', 'tramite_administrativo', $this->tramite_administrativo])
            ->andFilterWhere(['like', 'rol_en_calidad', $this->rol_en_calidad])
            ->andFilterWhere(['like', 'enviado_por', $this->enviado_por]);

        return $dataProvider;
    }
}
