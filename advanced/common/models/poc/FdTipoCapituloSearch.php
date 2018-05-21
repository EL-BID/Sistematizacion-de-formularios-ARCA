<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdTipoCapitulo;

/**
 * FdTipoCapituloSearch represents the model behind the search form about `common\models\poc\FdTipoCapitulo`.
 */
class FdTipoCapituloSearch extends FdTipoCapitulo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tcapitulo'], 'integer'],
            [['nom_tcapitulo'], 'safe'],
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
        $query = FdTipoCapitulo::find();

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
            'id_tcapitulo' => $this->id_tcapitulo,
        ]);

        $query->andFilterWhere(['like', 'nom_tcapitulo', $this->nom_tcapitulo]);

        return $dataProvider;
    }
}
