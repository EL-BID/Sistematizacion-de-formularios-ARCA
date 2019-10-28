<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdObrasCaptacionRiego;

/**
 * FdObrasCaptacionRiegoSearch represents the model behind the search form about `common\models\poc\FdObrasCaptacionRiego`.
 */
class FdObrasCaptacionRiegoSearch extends FdObrasCaptacionRiego
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_obracaptacion', 'numero_obras', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['tipo_obra','estado_obra','especifique','ubicacion_obra','especifique_ubicacion'], 'safe'],
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
        $query = FdObrasCaptacionRiego::find()->alias('a');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        
        
       $query->leftJoin('fd_opcion_select b', 'tipo_obra = b.id_opcion_select');
       $query->leftJoin('fd_opcion_select c', 'estado_obra = c.id_opcion_select');
       $query->leftJoin('fd_opcion_select d', 'ubicacion_obra = d.id_opcion_select');
       


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_obracaptacion' => $this->id_obracaptacion,
            'numero_obras' => $this->numero_obras,
           // 'tipo_obra' => $this->tipo_obra,
            //'estado_obra' => $this->estado_obra,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ]);

        $query->andFilterWhere(['like', 'a.especifique', $this->especifique])
        ->andFilterWhere(['like', 'a.especifique_ubicacion', $this->especifique_ubicacion])
        ->andFilterWhere(['like', 'b.nom_opcion_select', $this->tipo_obra])
        ->andFilterWhere(['like', 'c.nom_opcion_select', $this->estado_obra])
        ->andFilterWhere(['like', 'd.nom_opcion_select', $this->ubicacion_obra]);
        
            $query->andFilterWhere([            
            'id_conjunto_respuesta' => $filtros['FdObrasCaptacionRiegoSearch']['id_conjunto_respuesta'],
            'id_pregunta' => $filtros['FdObrasCaptacionRiegoSearch']['id_pregunta'],
            'id_respuesta' => $filtros['FdObrasCaptacionRiegoSearch']['id_respuesta'],            
        ]);


        return $dataProvider;
    }
}
