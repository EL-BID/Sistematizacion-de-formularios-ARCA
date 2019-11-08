<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\Entidades;

/**
 * EntidadesSearch represents the model behind the search form about `common\models\autenticacion\Entidades`.
 */
class EntidadesSearch extends Entidades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_entidad', 'nombre_entidad', 'cod_canton', 'cod_canton_p', 'cod_provincia', 'cod_provincia_p', 'cod_parroquia'], 'safe'],
            [['id_tipo_entidad'], 'number'],
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
        $query = Entidades::find();

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
            'id_tipo_entidad' => $this->id_tipo_entidad,
        ]);

        $query->andFilterWhere(['like', 'id_entidad', $this->id_entidad])
            ->andFilterWhere(['like', 'nombre_entidad', $this->nombre_entidad])
            ->andFilterWhere(['like', 'cod_canton', $this->cod_canton])
            ->andFilterWhere(['like', 'cod_canton_p', $this->cod_canton_p])
            ->andFilterWhere(['like', 'cod_provincia', $this->cod_provincia])
            ->andFilterWhere(['like', 'cod_provincia_p', $this->cod_provincia_p])
            ->andFilterWhere(['like', 'cod_parroquia', $this->cod_parroquia]);

        return $dataProvider;
    }
}
