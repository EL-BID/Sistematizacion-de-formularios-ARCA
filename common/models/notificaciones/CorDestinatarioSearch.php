<?php

namespace common\models\notificaciones;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\notificaciones\CorDestinatario;

/**
 * CorDestinatarioSearch represents the model behind the search form about `common\models\notificaciones\CorDestinatario`.
 */
class CorDestinatarioSearch extends CorDestinatario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_destinatario', 'id_correo', 'id_tdestinatario'], 'integer'],
            [['val_defecto', 'consulta_sql'], 'safe'],
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
        $query = CorDestinatario::find();

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
            'id_destinatario' => $this->id_destinatario,
            'id_correo' => $this->id_correo,
            'id_tdestinatario' => $this->id_tdestinatario,
        ]);

        $query->andFilterWhere(['like', 'val_defecto', $this->val_defecto])
            ->andFilterWhere(['like', 'consulta_sql', $this->consulta_sql]);

        return $dataProvider;
    }
}
