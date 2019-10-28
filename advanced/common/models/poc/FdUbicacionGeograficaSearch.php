<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdUbicacionGeografica;

/**
 * FdUbicacionGeograficaSearch represents the model behind the search form about `common\models\poc\FdUbicacionGeografica`.
 */
class FdUbicacionGeograficaSearch extends FdUbicacionGeografica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ubicacion_geografica', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['x', 'y', 'cota'], 'number'],
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
    public function search($params,$filtros)
    {
        $query = FdUbicacionGeografica::find();

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
            'id_ubicacion_geografica' => $this->id_ubicacion_geografica,
            'x' => $this->x,
            'y' => $this->y,
            'cota' => $this->cota,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ]);
        $query->andFilterWhere([            
            'id_conjunto_respuesta' => $filtros['FdUbicacionGeograficaSearch']['id_conjunto_respuesta'],
            'id_pregunta' => $filtros['FdUbicacionGeograficaSearch']['id_pregunta'],
            'id_respuesta' => $filtros['FdUbicacionGeograficaSearch']['id_respuesta'],            
        ]);

        return $dataProvider;
    }
}
