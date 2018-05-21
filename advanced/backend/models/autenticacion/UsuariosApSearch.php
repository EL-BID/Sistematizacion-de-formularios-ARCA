<?php

namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\autenticacion\UsuariosAp;

/**
 * UsuariosApSearch represents the model behind the search form about `common\models\autenticacion\UsuariosAp`.
 */
class UsuariosApSearch extends UsuariosAp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'identificacion'], 'number'],
            [['usuario', 'clave', 'login', 'tipo_usuario', 'estado_usuario', 'nombres', 'usuario_digitador', 'fecha_digitacion', 'email', 'auth_key'], 'safe'],
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
        $query = UsuariosAp::find();

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
            'id_usuario' => $this->id_usuario,
            'identificacion' => $this->identificacion,
            'fecha_digitacion' => $this->fecha_digitacion,
        ]);

        $query->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'clave', $this->clave])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'tipo_usuario', $this->tipo_usuario])
            ->andFilterWhere(['like', 'estado_usuario', $this->estado_usuario])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'usuario_digitador', $this->usuario_digitador])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
