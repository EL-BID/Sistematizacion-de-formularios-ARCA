<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdPonderacionRespuesta;

/**
 * FdPonderacionRespuestaSearch represents the model behind the search form about `common\models\poc\FdPonderacionRespuesta`.
 */
class FdPonderacionRespuestaSearch extends FdPonderacionRespuesta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ponderacion_resp', 'id_tpondera'], 'integer'],
            [['descripcion_ponderacion'], 'safe'],
            [['valor'], 'number'],
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
        $query = FdPonderacionRespuesta::find();

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
            'id_ponderacion_resp' => $this->id_ponderacion_resp,
            'id_tpondera' => $this->id_tpondera,
            'valor' => $this->valor,
        ]);

        $query->andFilterWhere(['like', 'descripcion_ponderacion', $this->descripcion_ponderacion]);

        return $dataProvider;
    }
}
