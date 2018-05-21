<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdFormato;

/**
 * FdFormatoSearch represents the model behind the search form about `common\models\poc\FdFormato`.
 */
class FdFormatoSearch extends FdFormato
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_formato', 'id_tipo_view_formato', 'id_modulo', 'ult_id_version'], 'integer'],
            [['nom_formato', 'num_formato', 'cod_rol', 'numeracion'], 'safe'],
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
        $query = FdFormato::find();

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
            'id_formato' => $this->id_formato,
            'id_tipo_view_formato' => $this->id_tipo_view_formato,
            'id_modulo' => $this->id_modulo,
            'ult_id_version' => $this->ult_id_version,
        ]);

        $query->andFilterWhere(['like', 'nom_formato', $this->nom_formato])
            ->andFilterWhere(['like', 'num_formato', $this->num_formato])
            ->andFilterWhere(['like', 'cod_rol', $this->cod_rol])
            ->andFilterWhere(['like', 'numeracion', $this->numeracion]);

        return $dataProvider;
    }
}
