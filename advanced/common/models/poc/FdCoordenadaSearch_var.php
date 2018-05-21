<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdCoordenada_var;

/**
 * FdCoordenadaSearch represents the model behind the search form about `common\models\poc\FdCoordenada`.
 */
class FdCoordenadaSearch_var extends FdCoordenada_var
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_coordenada', 'id_tcoordenada', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta','id_capitulo'], 'integer'],
            [['x', 'y', 'altura', 'longitud', 'latitud'], 'number'],
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
        $query = FdCoordenada_var::find();

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
            'id_coordenada' => $this->id_coordenada,
            'x' => $this->x,
            'y' => $this->y,
            'altura' => $this->altura,
            'longitud' => $this->longitud,
            'latitud' => $this->latitud,
            'id_tcoordenada' => $this->id_tcoordenada,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
        ]);

        return $dataProvider;
    }
}
