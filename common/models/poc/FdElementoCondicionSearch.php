<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdElementoCondicion;

/**
 * FdElementoCondicionSearch represents the model behind the search form about `common\models\poc\FdElementoCondicion`.
 */
class FdElementoCondicionSearch extends FdElementoCondicion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor', 'cod_rol', 'operacion'], 'safe'],
            [['id_condicion', 'id_tcondicion', 'id_pregunta_habilitadora', 'id_pregunta_condicionada', 'id_capitulo_condicionado', 'id_adm_estado'], 'integer'],
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
        $query = FdElementoCondicion::find();

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
            'id_condicion' => $this->id_condicion,
            'id_tcondicion' => $this->id_tcondicion,
            'id_pregunta_habilitadora' => $this->id_pregunta_habilitadora,
            'id_pregunta_condicionada' => $this->id_pregunta_condicionada,
            'id_capitulo_condicionado' => $this->id_capitulo_condicionado,
            'id_adm_estado' => $this->id_adm_estado,
        ]);

        $query->andFilterWhere(['like', 'valor', $this->valor])
            ->andFilterWhere(['like', 'cod_rol', $this->cod_rol])
            ->andFilterWhere(['like', 'operacion', $this->operacion]);

        return $dataProvider;
    }
}
