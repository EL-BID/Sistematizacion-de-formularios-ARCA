<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdDetallesCaptacion;

/**
 * FdDetallesCaptacionSearch represents the model behind the search form about `common\models\poc\FdDetallesCaptacion`.
 */
class FdDetallesCaptacionSearch extends FdDetallesCaptacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detalles_captacion', 'id_estruc_hidrau', 'anio_construc', 'id_material_estruc', 'id_problema_capt', 'id_estado_capt', 'id_t_medicion', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo','id_junta'], 'integer'],
            [['nombre_captacion', 'especifique_mat_estr', 'especifique_probl', 'especifique_t_med', 'observaciones'], 'safe'],
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
        $query = FdDetallesCaptacion::find();

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
            'id_detalles_captacion' => $this->id_detalles_captacion,
            'id_estruc_hidrau' => $this->id_estruc_hidrau,
            'anio_construc' => $this->anio_construc,
            'id_material_estruc' => $this->id_material_estruc,
            'id_problema_capt' => $this->id_problema_capt,
            'id_estado_capt' => $this->id_estado_capt,
            'id_t_medicion' => $this->id_t_medicion,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
            'id_junta' => $this->id_junta,
        ]);

        $query->andFilterWhere(['like', 'nombre_captacion', $this->nombre_captacion])
            ->andFilterWhere(['like', 'especifique_mat_estr', $this->especifique_mat_estr])
            ->andFilterWhere(['like', 'especifique_probl', $this->especifique_probl])
            ->andFilterWhere(['like', 'especifique_t_med', $this->especifique_t_med])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
