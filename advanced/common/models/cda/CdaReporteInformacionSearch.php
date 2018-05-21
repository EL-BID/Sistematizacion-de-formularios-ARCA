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
    public $longitud;
    public $latitud;
    public $altura;
    public $longitud_senagua;
    public $latitud_senagua;
    public $altura_senagua;
    public $nomprovincia;
    public $nomparroquia;
    public $nomcanton;
    public $nomtfuente;
    public $nomsubtfuente;
    public $caracteristica;
    public $nomusosolicitado;
    public $nomdestino;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_solicitado', 'institucion_solicitante', 'solicitante', 'fuente_solicitada', 'observaciones', 'decision', 
                'observaciones_decision','longitud','latitud','altura','nomprovincia','nomparroquia','nomcanton','nomtfuente',
                'nomsubtfuente','caracteristica','nomusosolicitado','nomdestino'], 'safe'],
            [['q_solicitado', 'abscisa', 'proba_excedencia_obtenida', 'proba_excedencia_certificado'], 'number'],
            [['tiempo_years', 'id_tfuente', 'id_subtfuente', 'id_caracteristica', 'id_treporte', 'id_destino', 'id_uso_solicitado', 'id_ubicacion', 'id_coordenada', 'id_reporte_informacion', 'id_cda', 'id_actividad'], 'integer'],
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
    public function search($params,$join=null)
    {
        
        if($join===null){ 
            $query = CdaReporteInformacion::find();

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
                'q_solicitado' => $this->q_solicitado,
                'tiempo_years' => $this->tiempo_years,
                'id_tfuente' => $this->id_tfuente,
                'id_subtfuente' => $this->id_subtfuente,
                'id_caracteristica' => $this->id_caracteristica,
                'id_treporte' => $this->id_treporte,
                'id_destino' => $this->id_destino,
                'id_uso_solicitado' => $this->id_uso_solicitado,
                'id_ubicacion' => $this->id_ubicacion,
                'id_coordenada' => $this->id_coordenada,
                'id_reporte_informacion' => $this->id_reporte_informacion,
                'abscisa' => $this->abscisa, 
                'id_cda' => $this->id_cda,
                'id_cactividad_proceso' => $this->id_cactividad_proceso,
                'proba_excedencia_obtenida' => $this->proba_excedencia_obtenida,
                'proba_excedencia_certificado' => $this->proba_excedencia_certificado,
                'id_actividad' => $this->id_actividad,
            ]);

            $query->andFilterWhere(['like', 'sector_solicitado', $this->sector_solicitado])
                ->andFilterWhere(['like', 'institucion_solicitante', $this->institucion_solicitante])
                ->andFilterWhere(['like', 'solicitante', $this->solicitante])
                ->andFilterWhere(['like', 'fuente_solicitada', $this->fuente_solicitada])
                ->andFilterWhere(['like', 'observaciones', $this->observaciones])
                ->andFilterWhere(['like', 'decision', $this->decision])
                ->andFilterWhere(['like', 'observaciones_decision', $this->observaciones_decision]);

        }
        elseif($join=='datos'){
            $query = CdaReporteInformacion::find()
                    ->innerJoinWith('fdCoordenadas', true)
                    ->innerJoinWith('idUbicacion', true)
                    ->innerJoin('parroquias','fd_ubicacion.cod_parroquia=parroquias.cod_parroquia and fd_ubicacion.cod_canton=parroquias.cod_canton and fd_ubicacion.cod_provincia=parroquias.cod_provincia')
                    ->innerJoin('cantones','fd_ubicacion.cod_canton=cantones.cod_canton and fd_ubicacion.cod_provincia=cantones.cod_provincia')
                    ->innerJoin('provincias','fd_ubicacion.cod_provincia=provincias.cod_provincia')
                    ->where(['id_actividad'=>8]);

            // add conditions that should always apply here

          // $query->innerJoin('fd_coordenada','cda_reporte_informacion.id_reporte_informacion=fd_coordenada.id_reporte_informacion');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);
             
                       // grid filtering conditions
                
            $query->andFilterWhere([
                'id_cda' => $this->id_cda,
                'id_cactividad_proceso' => $this->id_cactividad_proceso,
                'longitud' => $this->longitud,
                'latitud' => $this->latitud,
                'altura' => $this->altura,
                'id_tfuente' =>$this->nomtfuente,
                'id_subtfuente' =>$this->nomsubtfuente,
                'id_caracteristica' => $this->caracteristica,
                'q_solicitado'=>$this->q_solicitado,
                'id_uso_solicitado' => $this->nomusosolicitado,
                'id_destino' => $this->nomdestino,
                'tiempo_years'=> $this->tiempo_years,

            ]);
            

           
             $query
                ->andFilterWhere(['like', 'nombre_parroquia', $this->nomprovincia])
                ->andFilterWhere(['like', 'nombre_canton', $this->nomcanton])
                ->andFilterWhere(['like', 'nombre_parroquia', $this->nomparroquia])
                ->andFilterWhere(['like', 'sector_solicitado', $this->sector_solicitado])
                ->andFilterWhere(['like', 'fuente_solicitada', $this->fuente_solicitada]);


        }elseif($join=='senagua'){
            $query = CdaReporteInformacion::find()
                    ->innerJoinWith('fdCoordenadas', true)
                    ->where(['id_actividad'=>12]);

            // add conditions that should always apply here

            //$query->innerJoin('fd_coordenada','cda_reporte_informacion.id_coordenada=fd_coordenada.id_coordenada');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);
             $query->andFilterWhere([
                'id_cda' => $this->id_cda,
                'id_cactividad_proceso' => $this->id_cactividad_proceso,
                'longitud' => $this->longitud,
                'abscisa' => $this->abscisa,
                'q_solicitado'=>$this->q_solicitado,
                'id_uso_solicitado' => $this->nomusosolicitado,
                'id_destino' => $this->nomdestino,

            ]);
            

           
             $query
                ->andFilterWhere(['like', 'fuente_solicitada', $this->fuente_solicitada]);

        }
        elseif($join=='epa'){
            $query = CdaReporteInformacion::find()->where(['id_actividad'=>13]);

            // add conditions that should always apply here

            //$query->innerJoin('fd_coordenada','cda_reporte_informacion.id_coordenada=fd_coordenada.id_coordenada');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);
            
             $query->andFilterWhere([
                'id_cda' => $this->id_cda,
                'id_cactividad_proceso' => $this->id_cactividad_proceso,
                'longitud' => $this->longitud,
                'abscisa' => $this->abscisa,
                'q_solicitado'=>$this->q_solicitado,
                'id_uso_solicitado' => $this->nomusosolicitado,
                'id_destino' => $this->nomdestino,

            ]);
            

           
             $query
                ->andFilterWhere(['like', 'fuente_solicitada', $this->fuente_solicitada]);

        }
        elseif($join=='visita'){
            $query = CdaReporteInformacion::find()->where(['id_actividad'=>9]);

            // add conditions that should always apply here

            //$query->innerJoin('fd_coordenada','cda_reporte_informacion.id_coordenada=fd_coordenada.id_coordenada');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);
            
             $query->andFilterWhere([
                'id_cda' => $this->id_cda,
                'id_cactividad_proceso' => $this->id_cactividad_proceso,
                'id_tfuente' =>$this->nomtfuente,
                'id_subtfuente' =>$this->nomsubtfuente,
                'id_uso_solicitado' => $this->nomusosolicitado,
                'id_destino' => $this->id_destino,
            ]);
            

           
             $query
                ->andFilterWhere(['like', 'fuente_solicitada', $this->fuente_solicitada]);

        } elseif($join=='coordenadas'){
            $query = CdaReporteInformacion::find()
                    ->innerJoinWith('fdCoordenadas', true)
                    ->where(['id_actividad'=>9]);

            // add conditions that should always apply here

            //$query->innerJoin('fd_coordenada','cda_reporte_informacion.id_coordenada=fd_coordenada.id_coordenada');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);
            
             $query->andFilterWhere([
                'id_cda' => $this->id_cda,
                'id_cactividad_proceso' => $this->id_cactividad_proceso,
                'fd_coordenada.id_reporte_informacion' => $this->id_reporte_informacion,
                'longitud' => $this->longitud,
                'latitud' => $this->latitud,
                'altura' => $this->altura,
            ]);
            

           
            

        }
        return $dataProvider;
    }
}
