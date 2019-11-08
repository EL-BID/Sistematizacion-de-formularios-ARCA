<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdDetallesFuente;

/**
 * FdDetallesFuenteSearch represents the model behind the search form about `common\models\poc\FdDetallesFuente`.
 */
class FdDetallesFuenteSearch extends FdDetallesFuente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detalles_fuente', 'id_t_fuente', 'coor_x', 'coor_y', 'coor_z', 'caudal_captado', 'caudal_autorizado', 'id_problema_fuente', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo','autorizacion_senagua','id_junta'], 'integer'],
            [['nombre_fuente', 'especifique'], 'safe'],
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
        $query = FdDetallesFuente::find();

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
            'id_detalles_fuente' => $this->id_detalles_fuente,
            'id_t_fuente' => $this->id_t_fuente,
            'coor_x' => $this->coor_x,
            'coor_y' => $this->coor_y,
            'coor_z' => $this->coor_z,
            'caudal_captado' => $this->caudal_captado,
            'caudal_autorizado' => $this->caudal_autorizado,
            'id_problema_fuente' => $this->id_problema_fuente,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
            'autorizacion_senagua' => $this->autorizacion_senagua,
            'id_junta' => $this->id_junta,
        ]);

        $query->andFilterWhere(['like', 'nombre_fuente', $this->nombre_fuente])
            ->andFilterWhere(['like', 'especifique', $this->especifique]);

        return $dataProvider;
    }
}
