<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdInvolucrado;

/**
 * FdInvolucradoSearch represents the model behind the search form about `common\models\poc\FdInvolucrado`.
 */
class FdInvolucradoSearch extends FdInvolucrado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_involucrado', 'telefono_convencional', 'celular', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta'], 'integer'],
            [['nombre', 'correo_electronico'], 'safe'],
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
        $query = FdInvolucrado::find();

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
            'id_involucrado' => $this->id_involucrado,
            'telefono_convencional' => $this->telefono_convencional,
            'celular' => $this->celular,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico]);

        return $dataProvider;
    }
}
