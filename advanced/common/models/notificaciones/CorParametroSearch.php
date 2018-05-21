<?php

namespace common\models\notificaciones;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\notificaciones\CorParametro;

/**
 * CorParametroSearch represents the model behind the search form about `common\models\notificaciones\CorParametro`.
 */
class CorParametroSearch extends CorParametro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parametro', 'id_correo', 'id_tparametro'], 'integer'],
            [['nom_parametro', 'val_defecto', 'consulta_sql'], 'safe'],
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
        $query = CorParametro::find();

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
            'id_parametro' => $this->id_parametro,
            'id_correo' => $this->id_correo,
            'id_tparametro' => $this->id_tparametro,
        ]);

        $query->andFilterWhere(['like', 'nom_parametro', $this->nom_parametro])
            ->andFilterWhere(['like', 'val_defecto', $this->val_defecto])
            ->andFilterWhere(['like', 'consulta_sql', $this->consulta_sql]);

        return $dataProvider;
    }
}
