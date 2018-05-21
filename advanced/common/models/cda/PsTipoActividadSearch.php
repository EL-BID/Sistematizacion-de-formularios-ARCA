<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\PsTipoActividad;

/**
 * PsTipoActividadSearch represents the model behind the search form about `common\models\cda\PsTipoActividad`.
 */
class PsTipoActividadSearch extends PsTipoActividad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tactividad'], 'integer'],
            [['nom_tactividad'], 'safe'],
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
        $query = PsTipoActividad::find();

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
            'id_tactividad' => $this->id_tactividad,
        ]);

        $query->andFilterWhere(['like', 'nom_tactividad', $this->nom_tactividad]);

        return $dataProvider;
    }
}
