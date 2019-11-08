<?php

namespace common\models\notificaciones;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\notificaciones\CorMensajeEnviado;

/**
 * CorMensajeEnviadoSearch represents the model behind the search form about `common\models\notificaciones\CorMensajeEnviado`.
 */
class CorMensajeEnviadoSearch extends CorMensajeEnviado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mensaje_enviado', 'id_correo'], 'integer'],
            [['cor_parametro', 'cor_destinatario', 'asunto'], 'safe'],
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
        $query = CorMensajeEnviado::find();

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
            'id_mensaje_enviado' => $this->id_mensaje_enviado,
            'id_correo' => $this->id_correo,
        ]);

        $query->andFilterWhere(['like', 'cor_parametro', $this->cor_parametro])
            ->andFilterWhere(['like', 'cor_destinatario', $this->cor_destinatario])
            ->andFilterWhere(['like', 'asunto', $this->asunto]);

        return $dataProvider;
    }
}
