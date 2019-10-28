<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdInformacionComunidad;

/**
 * FdInformacionComunidadSearch represents the model behind the search form about `common\models\poc\FdInformacionComunidad`.
 */
class FdInformacionComunidadSearch extends FdInformacionComunidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_info_comunida', 'habitantes', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['comunidad', 'cod_parroquia', 'cod_canton', 'cod_provincia'], 'safe'],
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
        $query = FdInformacionComunidad::find();

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
            'id_info_comunida' => $this->id_info_comunida,
            'habitantes' => $this->habitantes,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ]);

        $query->andFilterWhere(['like', 'comunidad', $this->comunidad])
            ->andFilterWhere(['like', 'cod_parroquia', $this->cod_parroquia])
            ->andFilterWhere(['like', 'cod_canton', $this->cod_canton])
            ->andFilterWhere(['like', 'cod_provincia', $this->cod_provincia]);

        return $dataProvider;
    }
}
