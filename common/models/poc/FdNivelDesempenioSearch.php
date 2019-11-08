<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdNivelDesempenio;

/**
 * FdNivelDesempenioSearch represents the model behind the search form about `common\models\poc\FdNivelDesempenio`.
 */
class FdNivelDesempenioSearch extends FdNivelDesempenio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nivel', 'intervalo_inicio', 'intervalo_fin', 'semaforizacion'], 'integer'],
            [['nivel_desempenio', 'descripcion'], 'safe'],
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
        $query = FdNivelDesempenio::find();

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
            'id_nivel' => $this->id_nivel,
            'intervalo_inicio' => $this->intervalo_inicio,
            'intervalo_fin' => $this->intervalo_fin,
            'semaforizacion' => $this->semaforizacion,
        ]);

        $query->andFilterWhere(['like', 'nivel_desempenio', $this->nivel_desempenio])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
