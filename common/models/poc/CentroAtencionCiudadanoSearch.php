<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\CentroAtencionCiudadano;

/**
 * CentroAtencionCiudadanoSearch represents the model behind the search form about `common\models\poc\CentroAtencionCiudadano`.
 */
class CentroAtencionCiudadanoSearch extends CentroAtencionCiudadano
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_centro_atencion_ciudadano'], 'integer'],
            [['nom_centro_atencion_ciudadano'], 'safe'],
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
        $query = CentroAtencionCiudadano::find();

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
            'cod_centro_atencion_ciudadano' => $this->cod_centro_atencion_ciudadano,
        ]);

        $query->andFilterWhere(['like', 'nom_centro_atencion_ciudadano', $this->nom_centro_atencion_ciudadano]);

        return $dataProvider;
    }
}
