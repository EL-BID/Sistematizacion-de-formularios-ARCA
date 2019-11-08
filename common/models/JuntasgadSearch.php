<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Juntasgad;

/**
 * JuntasGadSearch represents the model behind the search form about `common\models\poc\JuntasGad`.
 */
class JuntasgadSearch extends Juntasgad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_junta'], 'number'],
            [['nombre_junta'], 'safe'],
            [['id_conjunto_respuesta'], 'integer'],
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
        $query = JuntasGad::find();

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
            'id_conjunto_respuesta' => $filtros['JuntasgadSearch']['id_conjunto_respuesta'],            
        ]);

        $query->andFilterWhere(['like', 'nombre_junta', $this->nombre_junta])->orderBy(["id_junta" => SORT_ASC])->all();

        return $dataProvider;
    }
}
