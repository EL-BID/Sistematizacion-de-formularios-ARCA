<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdClasificacion;

/**
 * FdClasificacionSearch represents the model behind the search form about `common\models\poc\FdClasificacion`.
 */
class FdClasificacionSearch extends FdClasificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_clasificacion'], 'integer'],
            [['nom_clasificacion'], 'safe'],
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
        $query = FdClasificacion::find();

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
            'id_clasificacion' => $this->id_clasificacion,
        ]);

        $query->andFilterWhere(['like', 'nom_clasificacion', $this->nom_clasificacion]);

        return $dataProvider;
    }
}
