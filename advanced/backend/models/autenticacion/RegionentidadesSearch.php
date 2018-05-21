<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\Regionentidades;

/**
 * RegionentidadesSearch represents the model behind the search form about `common\models\autenticacion\Regionentidades`.
 */
class RegionentidadesSearch extends Regionentidades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_region', 'id_entidad'], 'safe'],
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
        $query = Regionentidades::find();

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
        $query->andFilterWhere(['like', 'cod_region', $this->cod_region])
            ->andFilterWhere(['like', 'id_entidad', $this->id_entidad]);

        return $dataProvider;
    }
}
