<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\PerfilRegion;

/**
 * PerfilRegionSearch represents the model behind the search form about `common\models\autenticacion\PerfilRegion`.
 */
class PerfilRegionSearch extends PerfilRegion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_per_reg', 'cod_rol', 'cod_region'], 'safe'],
            [['id_usuario'], 'number'],
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
        $query = PerfilRegion::find();

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
            'id_usuario' => $this->id_usuario,
        ]);

        $query->andFilterWhere(['like', 'estado_per_reg', $this->estado_per_reg])
            ->andFilterWhere(['like', 'cod_rol', $this->cod_rol])
            ->andFilterWhere(['like', 'cod_region', $this->cod_region]);

        return $dataProvider;
    }
}
