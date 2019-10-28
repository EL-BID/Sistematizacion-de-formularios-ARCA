<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdDatosSaneamientoAmbiental;

/**
 * FdDatosSaneamientoAmbientalSearch represents the model behind the search form about `common\models\poc\FdDatosSaneamientoAmbiental`.
 */
class FdDatosSaneamientoAmbientalSearch extends FdDatosSaneamientoAmbiental
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_datos_saneamiento_ambiental', 'viviendas_existentes', 'viviendas_conexiones', 'viviendas_conex_fsept_letrinas', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['comunidad'], 'safe'],
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
        $query = FdDatosSaneamientoAmbiental::find();

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
            'id_datos_saneamiento_ambiental' => $this->id_datos_saneamiento_ambiental,
            'viviendas_existentes' => $this->viviendas_existentes,
            'viviendas_conexiones' => $this->viviendas_conexiones,
            'viviendas_conex_fsept_letrinas' => $this->viviendas_conex_fsept_letrinas,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ]);

        $query->andFilterWhere(['like', 'comunidad', $this->comunidad]);

        return $dataProvider;
    }
}
