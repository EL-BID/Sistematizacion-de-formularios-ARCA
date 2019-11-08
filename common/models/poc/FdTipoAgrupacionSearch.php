<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdTipoAgrupacion;

/**
 * FdTipoAgrupacionSearch represents the model behind the search form about `common\models\poc\FdTipoAgrupacion`.
 */
class FdTipoAgrupacionSearch extends FdTipoAgrupacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tagrupacion'], 'integer'],
            [['nom_tagrupacion'], 'safe'],
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
        $query = FdTipoAgrupacion::find();

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
            'id_tagrupacion' => $this->id_tagrupacion,
        ]);

        $query->andFilterWhere(['like', 'nom_tagrupacion', $this->nom_tagrupacion]);

        return $dataProvider;
    }
}
