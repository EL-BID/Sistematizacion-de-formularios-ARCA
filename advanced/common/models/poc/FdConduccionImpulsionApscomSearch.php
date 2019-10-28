<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdConduccionImpulsionApscom;

/**
 * FdConduccionImpulsionApscomSearch represents the model behind the search form about `common\models\poc\FdConduccionImpulsionApscom`.
 */
class FdConduccionImpulsionApscomSearch extends FdConduccionImpulsionApscom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cond_impulsion_apscom', 'id_material_tuberia', 'id_estado_tuberia', 'id_frec_mantenimiento_condimp', 'id_estado_bomba', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['nombre_lug_conduccion', 'problemas_identificados', 'especifique_otro_tuberia'], 'safe'],
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
        $query = FdConduccionImpulsionApscom::find();

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
            'id_cond_impulsion_apscom' => $this->id_cond_impulsion_apscom,
            'id_material_tuberia' => $this->id_material_tuberia,
            'id_estado_tuberia' => $this->id_estado_tuberia,
            'id_frec_mantenimiento_condimp' => $this->id_frec_mantenimiento_condimp,
            'id_estado_bomba' => $this->id_estado_bomba,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
            'id_junta' => $this->id_junta,
        ]);

        $query->andFilterWhere(['like', 'nombre_lug_conduccion', $this->nombre_lug_conduccion])
            ->andFilterWhere(['like', 'problemas_identificados', $this->problemas_identificados])
            ->andFilterWhere(['like', 'especifique_otro_tuberia', $this->especifique_otro_tuberia]);

        return $dataProvider;
    }
}
