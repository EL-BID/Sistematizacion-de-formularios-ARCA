<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdVersion;

/**
 * FdVersionSearch represents the model behind the search form about `common\models\poc\FdVersion`.
 */
class FdVersionSearch extends FdVersion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_version'], 'integer'],
            [['desc_version', 'num_version'], 'safe'],
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
        $query = FdVersion::find();

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
            'id_version' => $this->id_version,
        ]);

        $query->andFilterWhere(['like', 'desc_version', $this->desc_version])
            ->andFilterWhere(['like', 'num_version', $this->num_version]);

        return $dataProvider;
    }
}
