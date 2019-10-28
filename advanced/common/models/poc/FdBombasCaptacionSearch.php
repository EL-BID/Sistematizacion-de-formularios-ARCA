<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdBombasCaptacion;

/**
 * FdBombasCaptacionSearch represents the model behind the search form about `common\models\poc\FdBombasCaptacion`.
 */
class FdBombasCaptacionSearch extends FdBombasCaptacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bombas_captacion', 'id_material_tuberia', 'id_estado_tuberia', 'id_frec_mantenimiento', 'anio_instalacion', 'id_problema_bomba', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo','id_junta'], 'integer'],
            [['nombre_bomba', 'especifique_material_caseta', 'especifique_problema_bomba', 'observaciones'], 'safe'],
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
        $query = FdBombasCaptacion::find();

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
            'id_bombas_captacion' => $this->id_bombas_captacion,
            'id_material_tuberia' => $this->id_material_tuberia,
            'id_estado_tuberia' => $this->id_estado_tuberia,
            'id_frec_mantenimiento' => $this->id_frec_mantenimiento,
            'anio_instalacion' => $this->anio_instalacion,
            'id_problema_bomba' => $this->id_problema_bomba,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
            'id_junta' => $this->id_junta,
        ]);

        $query->andFilterWhere(['like', 'nombre_bomba', $this->nombre_bomba])
            ->andFilterWhere(['like', 'especifique_material_caseta', $this->especifique_material_caseta])
            ->andFilterWhere(['like', 'especifique_problema_bomba', $this->especifique_problema_bomba])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
