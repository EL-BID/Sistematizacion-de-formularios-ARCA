<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdDatosGeneralesPublicos;

/**
 * FdDatosGeneralesPublicosSearch represents the model behind the search form about `common\models\poc\FdDatosGeneralesPublicos`.
 */
class FdDatosGeneralesPublicosSearch extends FdDatosGeneralesPublicos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_datos_generales_publicos', 'id_conjunto_respuesta'], 'integer'],
            [['pagina_web_prestador', 'correo_electronico_prestador', 'fecha_llenado_fichas', 'nombres_responsable_informacion', 'cargo_desempenia', 'correo_electronico', 'num_celular'], 'safe'],
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
        $query = FdDatosGeneralesPublicos::find();

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
            'id_datos_generales_publicos' => $this->id_datos_generales_publicos,
            'fecha_llenado_fichas' => $this->fecha_llenado_fichas,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
        ]);

        $query->andFilterWhere(['like', 'pagina_web_prestador', $this->pagina_web_prestador])
            ->andFilterWhere(['like', 'correo_electronico_prestador', $this->correo_electronico_prestador])
            ->andFilterWhere(['like', 'nombres_responsable_informacion', $this->nombres_responsable_informacion])
            ->andFilterWhere(['like', 'cargo_desempenia', $this->cargo_desempenia])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
            ->andFilterWhere(['like', 'num_celular', $this->num_celular]);

        return $dataProvider;
    }
}
