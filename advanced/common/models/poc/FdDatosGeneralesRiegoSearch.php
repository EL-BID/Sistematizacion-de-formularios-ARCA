<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdDatosGeneralesRiego;

/**
 * FdDatosGeneralesRiegoSearch represents the model behind the search form about `common\models\poc\FdDatosGeneralesRiego`.
 */
class FdDatosGeneralesRiegoSearch extends FdDatosGeneralesRiego
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_datos_generales_riego', 'posee_convencional', 'num_convencional', 'num_celular', 'num_celular_otro', 'posee_email', 'id_conjunto_respuesta'], 'integer'],
            [['nombres_prestador_servicio', 'direccion_oficinas', 'nombres_apellidos_replegal', 'correo_electronico'], 'safe'],
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
        $query = FdDatosGeneralesRiego::find();

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
            'id_datos_generales_riego' => $this->id_datos_generales_riego,
            'posee_convencional' => $this->posee_convencional,
            'num_convencional' => $this->num_convencional,
            'num_celular' => $this->num_celular,
            'num_celular_otro' => $this->num_celular_otro,
            'posee_email' => $this->posee_email,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
        ]);

        $query->andFilterWhere(['like', 'nombres_prestador_servicio', $this->nombres_prestador_servicio])
            ->andFilterWhere(['like', 'direccion_oficinas', $this->direccion_oficinas])
            ->andFilterWhere(['like', 'nombres_apellidos_replegal', $this->nombres_apellidos_replegal])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico]);

        return $dataProvider;
    }
}
