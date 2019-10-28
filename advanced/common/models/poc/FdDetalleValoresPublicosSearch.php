<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdDetalleValoresPublicos;

/**
 * FdDetalleValoresPublicosSearch represents the model behind the search form about `common\models\poc\FdDetalleValoresPublicos`.
 */
class FdDetalleValoresPublicosSearch extends FdDetalleValoresPublicos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detalle_valores_publicos', 'codigo', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['descripcion'], 'safe'],
            [['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'], 'number'],
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
        $query = FdDetalleValoresPublicos::find();

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
            'id_detalle_valores_publicos' => $this->id_detalle_valores_publicos,
            'codigo' => $this->codigo,
            'enero' => $this->enero,
            'febrero' => $this->febrero,
            'marzo' => $this->marzo,
            'abril' => $this->abril,
            'mayo' => $this->mayo,
            'junio' => $this->junio,
            'julio' => $this->julio,
            'agosto' => $this->agosto,
            'septiembre' => $this->septiembre,
            'octubre' => $this->octubre,
            'noviembre' => $this->noviembre,
            'diciembre' => $this->diciembre,
            'id_conjunto_respuesta' => $this->id_conjunto_respuesta,
            'id_pregunta' => $this->id_pregunta,
            'id_respuesta' => $this->id_respuesta,
            'id_capitulo' => $this->id_capitulo,
        ])->orderBy([
                'id_detalle_valores_publicos' => SORT_DESC,
                'codigo'=>SORT_ASC
              ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
