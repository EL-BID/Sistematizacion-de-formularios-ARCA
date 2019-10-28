<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdTipoValoracion;

/**
 * FdTipoValoracionSearch represents the model behind the search form about `common\models\poc\FdTipoValoracion`.
 */
class FdTipoValoracionSearch extends FdTipoValoracion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_valoracion'], 'integer'],
            [['descripcion_valoracion'], 'safe'],
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
        $query = FdTipoValoracion::find();

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
            'id_tipo_valoracion' => $this->id_tipo_valoracion,
        ]);

        $query->andFilterWhere(['like', 'descripcion_valoracion', $this->descripcion_valoracion]);

        return $dataProvider;
    }
}
