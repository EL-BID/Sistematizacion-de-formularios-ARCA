<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\SopSoportes;

/**
 * SopSoportesSearch represents the model behind the search form about `common\models\poc\SopSoportes`.
 */
class SopSoportesSearch extends SopSoportes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_soportes', 'id_respuesta'], 'integer'],
            [['ruta_soporte', 'titulo_soporte', 'palabras_clave', 'descripcion', 'fuente_soporte', 'autor_soporte', 'idioma_soporte', 'formato_soportes'], 'safe'],
            [['tamanio_soportes'], 'number'],
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
        $query = SopSoportes::find();

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
            'id_soportes' => $this->id_soportes,
            'tamanio_soportes' => $this->tamanio_soportes,
            'id_respuesta' => $this->id_respuesta,
        ]);

        $query->andFilterWhere(['like', 'ruta_soporte', $this->ruta_soporte])
            ->andFilterWhere(['like', 'titulo_soporte', $this->titulo_soporte])
            ->andFilterWhere(['like', 'palabras_clave', $this->palabras_clave])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'fuente_soporte', $this->fuente_soporte])
            ->andFilterWhere(['like', 'autor_soporte', $this->autor_soporte])
            ->andFilterWhere(['like', 'idioma_soporte', $this->idioma_soporte])
            ->andFilterWhere(['like', 'formato_soportes', $this->formato_soportes]);

        return $dataProvider;
    }
}
