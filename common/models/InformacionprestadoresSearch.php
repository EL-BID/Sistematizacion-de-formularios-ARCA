<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Informacionprestadores;

/**
 * InformacionprestadoresSearch represents the model behind the search form about `common\models\poc\Informacionprestadores`.
 */
class InformacionprestadoresSearch extends Informacionprestadores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_informacion_prestadores'], 'number'],
            [['posee_prestadores'], 'safe'],
            [['numero_prestadores', 'numero_prestadores_legal', 'numero_prestadores_economico', 'numero_prestadores_tecnico', 'id_conjunto_respuesta'], 'integer'],
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
        $query = Informacionprestadores::find();

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
            'id_informacion_prestadores' => $this->id_informacion_prestadores,
            'numero_prestadores' => $this->numero_prestadores,
            'numero_prestadores_legal' => $this->numero_prestadores_legal,
            'numero_prestadores_economico' => $this->numero_prestadores_economico,
            'numero_prestadores_tecnico' => $this->numero_prestadores_tecnico,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
        ]);

        //$query->andFilterWhere(['like', 'posee_prestadores', $this->posee_prestadores]);

        return $dataProvider;
    }
}
