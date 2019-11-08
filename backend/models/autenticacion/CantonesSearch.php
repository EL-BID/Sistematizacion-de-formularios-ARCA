<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\Cantones;

/**
 * CantonesSearch represents the model behind the search form about `common\models\autenticacion\Cantones`.
 */
class CantonesSearch extends Cantones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_canton', 'nombre_canton', 'cod_provincia'], 'safe'],
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
        $query = Cantones::find();

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
            'id_demarcacion' => $this->id_demarcacion,
        ]);

        $query->andFilterWhere(['like', 'cod_canton', $this->cod_canton])
            ->andFilterWhere(['like', 'nombre_canton', $this->nombre_canton])
            ->andFilterWhere(['like', 'cod_provincia', $this->cod_provincia]);

        return $dataProvider;
    }
}
