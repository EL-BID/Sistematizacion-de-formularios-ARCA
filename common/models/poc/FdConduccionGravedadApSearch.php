<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdConduccionGravedadAp;

/**
 * FdConduccionGravedadApSearch represents the model behind the search form about `common\models\poc\FdConduccionGravedadAp`.
 */
class FdConduccionGravedadApSearch extends FdConduccionGravedadAp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_conduccion_gravedad_ap', 'id_forma_conduccion_g', 'id_material_conduccion_g', 'id_frec_mantenimiento_g', 'id_estado_conduccion_g', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['nombre_conduccion_g', 'problemas_identificados'], 'safe'],
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
        $query = FdConduccionGravedadAp::find();

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
            'id_conduccion_gravedad_ap' => $this->id_conduccion_gravedad_ap,
            'id_forma_conduccion_g' => $this->id_forma_conduccion_g,
            'id_material_conduccion_g' => $this->id_material_conduccion_g,
            'id_frec_mantenimiento_g' => $this->id_frec_mantenimiento_g,
            'id_estado_conduccion_g' => $this->id_estado_conduccion_g,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
            'id_junta' => $this->id_junta,
            
        ]);

        $query->andFilterWhere(['like', 'nombre_conduccion_g', $this->nombre_conduccion_g])
            ->andFilterWhere(['like', 'problemas_identificados', $this->problemas_identificados]);

        return $dataProvider;
    }
}
