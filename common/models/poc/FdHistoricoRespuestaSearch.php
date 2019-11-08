<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdHistoricoRespuesta;

/**
 * FdHistoricoRespuestaSearch represents the model behind the search form about `common\models\poc\FdHistoricoRespuesta`.
 */
class FdHistoricoRespuestaSearch extends FdHistoricoRespuesta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_historico_respuesta', 'id_conjunto_respuesta', 'id_adm_estado'], 'integer'],
            [['observaciones', 'fecha', 'usuario'], 'safe'],
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
        $query = FdHistoricoRespuesta::find();

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
            'id_historico_respuesta' => $this->id_historico_respuesta,
            'fecha' => $this->fecha,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_adm_estado' => $this->id_adm_estado,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'usuario', $this->usuario]);

        return $dataProvider;
    }
}
