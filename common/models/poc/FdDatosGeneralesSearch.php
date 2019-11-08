<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdDatosGenerales;

/**
 * FdDatosGeneralesSearch represents the model behind the search form about `common\models\poc\FdDatosGenerales`.
 */
class FdDatosGeneralesSearch extends FdDatosGenerales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_datos_generales', 'num_documento', 'num_convencional', 'num_celular', 'id_tdocumento', 'id_natu_juridica', 'id_conjunto_respuesta'], 'integer'],
            [['nombres', 'correo_electronico', 'direccion', 'descripcion_trabajo', 'nombres_apellidos_replegal'], 'safe'],
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
        $query = FdDatosGenerales::find();

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
            'id_datos_generales' => $this->id_datos_generales,
            'num_documento' => $this->num_documento,
            'num_convencional' => $this->num_convencional,
            'num_celular' => $this->num_celular,
            'id_tdocumento' => $this->id_tdocumento,
            'id_natu_juridica' => $this->id_natu_juridica,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'descripcion_trabajo', $this->descripcion_trabajo])
            ->andFilterWhere(['like', 'nombres_apellidos_replegal', $this->nombres_apellidos_replegal]);

        return $dataProvider;
    }
    
    
    /**
     * Creates data provider instance with search query applied
     *
     * @id_conjunto_rpta
     *
     * @return ActiveDataProvider
     */
    public function search_idocnjrpta($id_cnj_rpta)
    {
        $query = FdDatosGenerales::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->id_conjunto_respuesta = $id_cnj_rpta;

       

        // grid filtering conditions
        $query->andFilterWhere([
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
        ]);

        return $dataProvider;
    }
}
