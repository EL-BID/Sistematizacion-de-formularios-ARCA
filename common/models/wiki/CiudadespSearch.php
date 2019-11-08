<?php

namespace common\models\wiki;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\wiki\Ciudadesp;

/**
 * CiudadespSearch represents the model behind the search form about `frontend\models\Ciudadesp`.
 */
class CiudadespSearch extends Ciudadesp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'number'],
            [['nombre'], 'safe'],
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
        $query = Ciudadesp::find();

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
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
