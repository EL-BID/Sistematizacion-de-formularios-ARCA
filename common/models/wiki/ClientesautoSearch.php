<?php

namespace common\models\wiki;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Clientesauto;

/**
 * ClientesautoSearch represents the model behind the search form about `frontend\models\Clientesauto`.
 */
class ClientesautoSearch extends Clientesauto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'number'],
            [['name', 'lastname', 'birthdate', 'createdate', 'type', 'ciudad'], 'safe'],
            [['ciudad2_id'], 'integer'],
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
        $query = Clientesauto::find();

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
            'Id' => $this->Id,
            'birthdate' => $this->birthdate,
            'createdate' => $this->createdate,
            'ciudad2_id' => $this->ciudad2_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad]);

        return $dataProvider;
    }
}
