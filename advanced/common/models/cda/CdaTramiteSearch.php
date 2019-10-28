<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaTramite;

/**
 * CdaTramiteSearch represents the model behind the search form about `common\models\cda\CdaTramite`.
 */
class CdaTramiteSearch extends CdaTramite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cda_tramite', 'id_cda_solicitud', 'id_usuario', 'puntos_solicitados'], 'integer'],
            [['num_tramite', 'cod_solicitud_tecnico', 'fecha_solicitud'], 'safe'],
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
        $query = CdaTramite::find()
                ->with('idCproceso')
                ->with('idActividad');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_cda_tramite' => $this->id_cda_tramite,
            'id_cda_solicitud' => $this->id_cda_solicitud,
            'id_usuario' => $this->id_usuario,
            'fecha_solicitud' => $this->fecha_solicitud,
            'puntos_solicitados' => $this->puntos_solicitados,
        ]);

        $query->andFilterWhere(['like', 'num_tramite', $this->num_tramite])
            ->andFilterWhere(['like', 'cod_solicitud_tecnico', $this->cod_solicitud_tecnico]);

        return $dataProvider;
    }
}
