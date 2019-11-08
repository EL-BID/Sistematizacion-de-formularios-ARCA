<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdOpcionSelect;

/**
 * FdOpcionSelectSearch represents the model behind the search form about `common\models\poc\FdOpcionSelect`.
 */
class FdOpcionSelectSearch extends FdOpcionSelect
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_opcion_select', 'orden', 'id_tselect'], 'integer'],
            [['nom_opcion_select', 'estado'], 'safe'],
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
        $query = FdOpcionSelect::find();

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
            'id_opcion_select' => $this->id_opcion_select,
            'orden' => $this->orden,
            'id_tselect' => $this->id_tselect,
        ]);

        $query->andFilterWhere(['like', 'nom_opcion_select', $this->nom_opcion_select])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
