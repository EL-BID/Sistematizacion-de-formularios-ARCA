<?php

namespace common\models\notificaciones;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\notificaciones\CorTipoDestinatario;

/**
 * CorTipoDestinatarioSearch represents the model behind the search form about `common\models\notificaciones\CorTipoDestinatario`.
 */
class CorTipoDestinatarioSearch extends CorTipoDestinatario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tdestinatario'], 'integer'],
            [['nom_tdestinatario'], 'safe'],
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
        $query = CorTipoDestinatario::find();

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
            'id_tdestinatario' => $this->id_tdestinatario,
        ]);

        $query->andFilterWhere(['like', 'nom_tdestinatario', $this->nom_tdestinatario]);

        return $dataProvider;
    }
}
