<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdTipoViewFormato;

/**
 * FdTipoViewFormatoSearch represents the model behind the search form about `common\models\poc\FdTipoViewFormato`.
 */
class FdTipoViewFormatoSearch extends FdTipoViewFormato
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_view_formato'], 'integer'],
            [['nom_tipo_view_formato'], 'safe'],
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
        $query = FdTipoViewFormato::find();

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
            'id_tipo_view_formato' => $this->id_tipo_view_formato,
        ]);

        $query->andFilterWhere(['like', 'nom_tipo_view_formato', $this->nom_tipo_view_formato]);

        return $dataProvider;
    }
}
