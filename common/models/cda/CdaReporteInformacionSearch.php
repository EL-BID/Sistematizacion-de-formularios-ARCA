<?php

namespace common\models\cda;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cda\CdaReporteInformacion;

/**
 * CdaReporteInformacionSearch represents the model behind the search form about `common\models\cda\CdaReporteInformacion`.
 */
class CdaReporteInformacionSearch extends CdaReporteInformacion
{
    
    public $nom_subdestino;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_reporte_informacion', 'tiempo_years', 'id_tfuente', 'id_subtfuente', 'id_caracteristica', 'id_treporte', 'id_destino', 'id_subdestino','id_uso_solicitado', 'id_ubicacion', 'id_actividad', 'id_cactividad_proceso', 'id_tipo',  'id_cod_cda'], 'integer'],
            [['sector_solicitado', 'institucion_solicitante', 'solicitante', 'fuente_solicitada', 'observaciones', 'decision', 'observaciones_decision', 'estado', 'causa_anulacion', 'causa_correccion','nom_subdestino'], 'safe'],
            [['q_solicitado', 'abscisa', 'proba_excedencia_obtenida', 'proba_excedencia_certificado'], 'number'],
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
        $query = CdaReporteInformacion::find()
                ->with('psCodCda')
                ->with('fdCoordenadas')
                ->with('codProvincia')
                ->with('codCanton')
                ->with('codParroquia')
                ->with('idTfuente')
                ->with('idSubtfuente')
                ->with('idCaracteristica')
                ->with('idUsoSolicitado')
                ->with('idDestino')
                ->with('idSubdestino');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);



        // grid filtering conditions
        $query->andFilterWhere([
            'id_reporte_informacion' => $this->id_reporte_informacion,
            'q_solicitado' => $this->q_solicitado,
            'tiempo_years' => $this->tiempo_years,
            'id_tfuente' => $this->id_tfuente,
            'id_subtfuente' => $this->id_subtfuente,
            'id_caracteristica' => $this->id_caracteristica,
            'id_treporte' => $this->id_treporte,
            'id_destino' => $this->id_destino,
            'id_uso_solicitado' => $this->id_uso_solicitado,
            'id_ubicacion' => $this->id_ubicacion,
            'abscisa' => $this->abscisa,
            'proba_excedencia_obtenida' => $this->proba_excedencia_obtenida,
            'proba_excedencia_certificado' => $this->proba_excedencia_certificado,
            'id_actividad' => $this->id_actividad,
            'id_cactividad_proceso' => $this->id_cactividad_proceso,
            'id_tipo' => $this->id_tipo,
            'id_cod_cda' => $this->id_cod_cda,
        ]);

        $query->andFilterWhere(['like', 'sector_solicitado', $this->sector_solicitado])
            ->andFilterWhere(['like', 'institucion_solicitante', $this->institucion_solicitante])
            ->andFilterWhere(['like', 'solicitante', $this->solicitante])
            ->andFilterWhere(['like', 'fuente_solicitada', $this->fuente_solicitada])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'decision', $this->decision])
            ->andFilterWhere(['like', 'observaciones_decision', $this->observaciones_decision])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'causa_anulacion', $this->causa_anulacion])
            ->andFilterWhere(['like', 'causa_correccion', $this->causa_correccion]);

               
        return $dataProvider;
    }
}
