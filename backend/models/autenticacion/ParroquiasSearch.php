<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\Parroquias;

/**
 * ParroquiasSearch represents the model behind the search form about `common\models\autenticacion\Parroquias`.
 */
class ParroquiasSearch extends Parroquias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_parroquia', 'nombre_parroquia', 'cod_canton', 'cod_provincia'], 'safe'],
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
        $query = Parroquias::find();

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
        $query->andFilterWhere(['like', 'cod_parroquia', $this->cod_parroquia])
            ->andFilterWhere(['like', 'nombre_parroquia', $this->nombre_parroquia])
            ->andFilterWhere(['like', 'cod_canton', $this->cod_canton])
            ->andFilterWhere(['like', 'cod_provincia', $this->cod_provincia]);

        return $dataProvider;
    }
}
