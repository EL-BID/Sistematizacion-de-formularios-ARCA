<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Auditoria;

/**
 * AuditoriaSearch represents the model behind the search form about `frontend\models\Auditoria`.
 */
class AuditoriaSearch extends Auditoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['usuario', 'ip_origen', 'texto', 'json', 'fecha_hora', 'accion', 'pagina', 'modulo','id_tevento', 'id_tmensaje', 'id_taccion'], 'safe'],
            [['id_pagina'], 'number'],
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
        $query = Auditoria::find();

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

        $query->joinWith('idTmensaje');
        $query->joinWith('idTaccion');
        $query->joinWith('idTevento');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'id_tevento' => $this->id_tevento,
            //'id_tmensaje' => $this->id_tmensaje,
            //'id_taccion' => $this->id_taccion,
            'fecha_hora' => $this->fecha_hora,
            'id_pagina' => $this->id_pagina,
        ]);

        $query->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'ip_origen', $this->ip_origen])
            ->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'json', $this->json])
            ->andFilterWhere(['like', 'accion', $this->accion])
            ->andFilterWhere(['like', 'pagina', $this->pagina])
            ->andFilterWhere(['like', 'modulo', $this->modulo])
            ->andFilterWhere(['like', 'aud_tipo_mensaje.nom_tmensaje', $this->id_tmensaje])
            ->andFilterWhere(['like', 'aud_tipo_accion.nom_accion', $this->id_taccion])
            ->andFilterWhere(['like', 'aud_tipo_evento.nom_tevento', $this->id_tevento]);
        return $dataProvider;
    }
}
