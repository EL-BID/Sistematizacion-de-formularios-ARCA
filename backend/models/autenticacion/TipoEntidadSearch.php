<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\TipoEntidad;

/**
 * TipoEntidadSearch represents the model behind the search form about `common\models\autenticacion\TipoEntidad`.
 */
class TipoEntidadSearch extends TipoEntidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_entidad'], 'number'],
            [['nombre_tipo_entidad'], 'safe'],
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
        $query = TipoEntidad::find();

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
            'id_tipo_entidad' => $this->id_tipo_entidad,
        ]);

        $query->andFilterWhere(['like', 'nombre_tipo_entidad', $this->nombre_tipo_entidad]);

        return $dataProvider;
    }
}
