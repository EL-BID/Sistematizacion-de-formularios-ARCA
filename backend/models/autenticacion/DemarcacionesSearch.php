<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\Demarcaciones;

/**
 * DemarcacionesSearch represents the model behind the search form about `common\models\autenticacion\Demarcaciones`.
 */
class DemarcacionesSearch extends Demarcaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_demarcacion'], 'number'],
            [['cod_demarcacion', 'nombre_demarcacion'], 'safe'],
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
        $query = Demarcaciones::find();

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
            'id_demarcacion' => $this->id_demarcacion,
        ]);

        $query->andFilterWhere(['like', 'cod_demarcacion', $this->cod_demarcacion])
            ->andFilterWhere(['like', 'nombre_demarcacion', $this->nombre_demarcacion]);

        return $dataProvider;
    }
}
