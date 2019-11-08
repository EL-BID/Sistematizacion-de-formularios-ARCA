<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdUbicacion;

/**
 * FdUbicacionSearch represents the model behind the search form about `common\models\poc\FdUbicacion`.
 */
class FdUbicacionSearch extends FdUbicacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ubicacion', 'cod_centro_atencion_ciudadano', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta'], 'integer'],
            [['cod_parroquia', 'cod_canton', 'cod_provincia', 'descripcion_ubicacion'], 'safe'],
            [['id_demarcacion'], 'number'],
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
        $query = FdUbicacion::find();

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
            'id_ubicacion' => $this->id_ubicacion,
            'id_demarcacion' => $this->id_demarcacion,
            'cod_centro_atencion_ciudadano' => $this->cod_centro_atencion_ciudadano,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
        ]);

        $query->andFilterWhere(['like', 'cod_parroquia', $this->cod_parroquia])
            ->andFilterWhere(['like', 'cod_canton', $this->cod_canton])
            ->andFilterWhere(['like', 'cod_provincia', $this->cod_provincia])
            ->andFilterWhere(['like', 'descripcion_ubicacion', $this->descripcion_ubicacion]);

        return $dataProvider;
    }
}
