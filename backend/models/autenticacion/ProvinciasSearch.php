<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\Provincias;

/**
 * ProvinciasSearch represents the model behind the search form about `common\models\autenticacion\Provincias`.
 */
class ProvinciasSearch extends Provincias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_provincia', 'nombre_provincia', 'cod_telefonico'], 'safe'],
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
        $query = Provincias::find();

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
        $query->andFilterWhere(['like', 'cod_provincia', $this->cod_provincia])
            ->andFilterWhere(['like', 'nombre_provincia', $this->nombre_provincia])
            ->andFilterWhere(['like', 'cod_telefonico', $this->cod_telefonico]);

        return $dataProvider;
    }
}
