<?php

namespace common\models\notificaciones;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\notificaciones\CorCorreo;

/**
 * CorCorreoSearch represents the model behind the search form about `common\models\notificaciones\CorCorreo`.
 */
class CorCorreoSearch extends CorCorreo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_correo', 'id_tarea_programada'], 'integer'],
            [['nom_correo', 'asunto', 'cuerpo'], 'safe'],
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
        $query = CorCorreo::find()->where(['estado'=>'s']);

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
            'id_correo' => $this->id_correo,
            'id_tarea_programada' => $this->id_tarea_programada,
        ]);

        $query->andFilterWhere(['like', 'nom_correo', $this->nom_correo])
            ->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo]);

        return $dataProvider;
    }
}
