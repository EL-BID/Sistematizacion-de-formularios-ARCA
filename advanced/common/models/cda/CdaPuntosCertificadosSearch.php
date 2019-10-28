<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaPuntosCertificados;

/**
 * CdaPuntosCertificadosSearch represents the model behind the search form about `common\models\cda\CdaPuntosCertificados`.
 */
class CdaPuntosCertificadosSearch extends CdaPuntosCertificados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_puntos_certificados', 'puntos_solicitados_tramite', 'puntos_visita_tecnica', 'puntos_verificados_senagua', 'puntos_certificados', 'puntos_devueltos', 'id_cda_tramite'], 'integer'],
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
        $query = CdaPuntosCertificados::find();

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
            'id_puntos_certificados' => $this->id_puntos_certificados,
            'puntos_solicitados_tramite' => $this->puntos_solicitados_tramite,
            'puntos_visita_tecnica' => $this->puntos_visita_tecnica,
            'puntos_verificados_senagua' => $this->puntos_verificados_senagua,
            'puntos_certificados' => $this->puntos_certificados,
            'puntos_devueltos' => $this->puntos_devueltos,
            'id_cda_tramite' => $this->id_cda_tramite,
        ]);

        return $dataProvider;
    }
}
