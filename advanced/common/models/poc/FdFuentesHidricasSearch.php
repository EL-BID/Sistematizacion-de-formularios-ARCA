<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdFuentesHidricas;

/**
 * FdFuentesHidricasSearch represents the model behind the search form about `common\models\poc\FdFuentesHidricas`.
 */
class FdFuentesHidricasSearch extends FdFuentesHidricas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fuentehidrica', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['nom_fuente'], 'safe'],
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
        $query = FdFuentesHidricas::find();

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
        /*$query->andFilterWhere([
            'id_fuentehidrica' => $this->id_fuentehidrica,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ]);*/
        $query->andFilterWhere([            
            'id_conjunto_respuesta' => $filtros['FdFuentesHidricasSearch']['id_conjunto_respuesta'],
            'id_pregunta' => $filtros['FdFuentesHidricasSearch']['id_pregunta'],
            'id_respuesta' => $filtros['FdFuentesHidricasSearch']['id_respuesta'],            
        ]);

        $query->andFilterWhere(['like', 'nom_fuente', $this->nom_fuente]);

        return $dataProvider;
    }
}
