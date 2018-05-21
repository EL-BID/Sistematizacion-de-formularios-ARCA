<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\Pagina;

/**
 * PaginaSearch represents the model behind the search form about `common\models\autenticacion\Pagina`.
 */
class PaginaSearch extends Pagina
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pagina'], 'number'],
            [['nombre_pagina'], 'safe'],
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
        $query = Pagina::find();

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
            'id_pagina' => $this->id_pagina,
        ]);

        $query->andFilterWhere(['like', 'nombre_pagina', $this->nombre_pagina]);

        return $dataProvider;
    }
}
