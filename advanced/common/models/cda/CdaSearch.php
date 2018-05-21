<?php

namespace common\models\cda;

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
            [['fecha_ingreso', 'fecha_solicitud', 'tramite_administrativo', 'rol_en_calidad', 'institucion_solicitante', 'solicitante'], 'safe'],
            [['id_cproceso_arca', 'id_cproceso_senagua', 'numero_tramites', 'id_cda', 'cod_centro_atencion_ciudadano'], 'integer'],
            [['id_usuario_enviado_por', 'id_demarcacion'], 'number'],
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
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_solicitud' => $this->fecha_solicitud,
            'id_cproceso_arca' => $this->id_cproceso_arca,
            'id_cproceso_senagua' => $this->id_cproceso_senagua,
            'numero_tramites' => $this->numero_tramites,
            'id_cda' => $this->id_cda,
            'id_usuario_enviado_por' => $this->id_usuario_enviado_por,
            'cod_centro_atencion_ciudadano' => $this->cod_centro_atencion_ciudadano,
            'id_demarcacion' => $this->id_demarcacion,
        ]);

        $query->andFilterWhere(['like', 'tramite_administrativo', $this->tramite_administrativo])
            ->andFilterWhere(['like', 'rol_en_calidad', $this->rol_en_calidad])
            ->andFilterWhere(['like', 'institucion_solicitante', $this->institucion_solicitante])
            ->andFilterWhere(['like', 'solicitante', $this->solicitante]);

        return $dataProvider;
    }
}
