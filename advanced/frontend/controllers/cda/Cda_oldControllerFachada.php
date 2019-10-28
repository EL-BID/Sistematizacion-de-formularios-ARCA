<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\Cda;
use common\models\cda\CdaSearch;
use common\models\cda\PsCproceso;
use common\models\cda\PsActividadQuipux;
use common\models\cda\PsCactividadProceso;
use common\models\autenticacion\Demarcaciones;
use common\models\poc\CentroAtencionCiudadano;
use common\controllers\controllerspry\FachadaPry;
use common\models\cda\PsHistoricoEstados;
use common\models\cda\PsResponsablesProceso;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use common\models\cda\PantallaprincipalSearch;
use common\models\cda\PsEstadoProceso;
use common\models\autenticacion\UsuariosAp;
use yii\base\Model;


//Modificacion 2019-02-19
use common\models\cda\CdaSolicitud;

/**
 * CdaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Cda.
 */
class CdaControllerFachada extends FachadaPry
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute = null, $id = null)
    {
        $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
        $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>";
        $progressbar = $progressbar."<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";

        return $progressbar;
    }

    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     *
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
        $searchModel = new CdaSearch();
        $dataProvider = $searchModel->search($queryParams);

        return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ];
    }

   
    /**
     * Presenta un dato unico en el modelo Cda.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->findModel($id);
    }

    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     *
     * @return mixed
     */
    public function actionCreate($request, $isAjax)
    {
        $model = new Cda();

        if ($model->load($request) && $model->save()) {
            return [
                    'model' => $model,
                    'create' => 'True',
                ];
        } elseif ($isAjax) {
            return [
                    'model' => $model,
                    'create' => 'Ajax',
                ];
        } else {
            return [
                    'model' => $model,
                    'create' => 'False',
                ];
        }
    }

    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     *
     * @return mixed
     */
    public function actionCreate_cda()
    {
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);

        $model = new CdaSolicitud();
        
        $model2 = new PsCproceso();
        $model2->setScenario('pscprocesoarca');

        $model3 = new PsCproceso();
        $model3->setScenario('pscprocesoseagua');

        $model_pscproceso = ['model2' => $model2, 'model3' => $model3];

        if ($model->load(Yii::$app->request->post())) {
            //Guarndado proceso ARCA==================================================================================
            $transaction = Yii::$app->db->beginTransaction();

            if (Model::loadMultiple($model_pscproceso, Yii::$app->request->post()) && Model::validateMultiple($model_pscproceso)) {
                $model2 = $model_pscproceso['model2'];
                $model3 = $model_pscproceso['model3'];

                $model2->ult_id_eproceso = 1;
                $model2->id_proceso = 1;
                $model2->id_usuario = Yii::$app->user->identity->Id;
                $model2->id_modulo = 2;
                $model2->fecha_registro_quipux = $model->fecha_ingreso;
                $model2->asunto_quipux = null;              //No se que asunto aplica aqui de donde sale este texto
                $model2->tipo_documento_quipux = null;
                $model2->ult_id_actividad = 1;              //Se modifica ult_id_actividad por 200 dado que es la inicial de tramite
                $model2->ult_id_usuario = Yii::$app->user->identity->Id;
                $model2->ult_fecha_actividad = $fechaactual;
                $model2->ult_fecha_estado = $fechaactual;

                if ($model2->save()) {
                    $id_cprocesoarca = $model2->id_cproceso;

                    //Guardando proceso SEAGUA===================================================================================
                    if ($model3->load(Yii::$app->request->post())) {
                        $model3->ult_id_eproceso = null;
                        $model3->id_proceso = null;
                        $model3->id_usuario = Yii::$app->user->identity->Id;
                        $model3->id_modulo = null;
                        $model3->fecha_registro_quipux = null;
                        $model3->asunto_quipux = null;
                        $model3->tipo_documento_quipux = null;
                        $model3->ult_id_actividad = 1;
                        $model3->ult_id_usuario = Yii::$app->user->identity->Id;
                        $model3->ult_fecha_actividad = $fechaactual;
                        $model3->ult_fecha_estado = $fechaactual;
                        $model3->numero = null;

                        if ($model3->save()) {
                            $id_cprocesoseagua = $model3->id_cproceso;

                            //Guardando CDA==============================================================================
                            $model->id_cproceso_arca = $id_cprocesoarca;
                            $model->id_cproceso_senagua = $id_cprocesoseagua;
                            $model->fecha_solicitud = $model3->fecha_solicitud;

                            //Yii::trace("revisando que llega","DEBUG");
                            if ($model->save()) {
                                $model4 = new PsHistoricoEstados();
                                $model4->fecha_estado = $fechaactual;
                                $model4->observaciones = null;
                                $model4->id_eproceso = 1;
                                $model4->id_cproceso = $id_cprocesoarca;
                                $model4->id_usuario = Yii::$app->user->identity->Id;
                                $model4->id_actividad = 1;
                                $model4->id_tgestion = null;

                                if ($model4->save()) {
                                    $model5 = new PsCactividadProceso();
                                    $model5->observacion = null;
                                    $model5->fecha_realizacion = $fechaactual;
                                    $model5->fecha_prevista = null;
                                    $model5->numero_quipux = null;
                                    $model5->id_cproceso = $id_cprocesoarca;
                                    $model5->id_usuario = Yii::$app->user->identity->Id;
                                    $model5->id_actividad = 1;
                                    $model5->fecha_creacion = $fechahoraactual;
                                    $model5->diligenciado = 'S';

                                    if ($model5->save()) {
                                        $model6 = new PsResponsablesProceso();
                                        $model6->observacion = null;
                                        $model6->id_cproceso = $id_cprocesoarca;
                                        $model6->id_tresponsabilidad = 1;
                                        $model6->fecha = $fechaactual;
                                        $model6->id_usuario = Yii::$app->user->identity->Id;

                                        if ($model6->save()) {
                                            $transaction->commit();
                                            Yii::$app->session->setFlash('FormSubmitted', '2');

                                            return [
                                                    'model' => $model,
                                                    'modelpscproceso' => $model_pscproceso,
                                                    'create' => 'True',
                                                ];
                                        } else {
                                            $transaction->rollBack();
                                            throw new \yii\web\HttpException(404, 'Error en Responsable Proceso');
                                        }
                                    } else {
                                        $transaction->rollBack();
                                        throw new \yii\web\HttpException(404, 'Error al guardar ps_actividad');
                                    }
                                } else {
                                    $transaction->rollBack();
                                    throw new \yii\web\HttpException(404, 'Error al historico de estado');
                                }
                            } else {
                                $transaction->rollBack();
                                throw new \yii\web\HttpException(404, 'Error al guardar CDA');
                            }
                        } else {
                            $transaction->rollBack();
                            throw new \yii\web\HttpException(404, 'Error al guardar proceso SEAGUA');
                        }
                    }
                } else {
                    $transaction->rollBack();
                    throw new \yii\web\HttpException(404, 'Error al guardar proceso ARCA');
                }
            } else {
                $transaction->rollBack();
                throw new \yii\web\HttpException(404, 'Error al cargar modelos.');
            }
        } elseif (Yii::$app->request->isAjax) {
            return [
                    'model' => $model,
                    'modelpscproceso' => $model_pscproceso,
                    'create' => 'Ajax',
                ];
        } else {
            return [
                    'model' => $model,
                     'modelpscproceso' => $model_pscproceso,
                    'create' => 'False',
                ];
        }
    }

    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id, $request, $isAjax)
    {
        $model = $this->findModel($id);

        if ($model->load($request) && $model->save()) {
            return [
                            'model' => $model,
                            'update' => 'True',
                        ];
        } elseif ($isAjax) {
            return [
                    'model' => $model,
                    'update' => 'Ajax',
                ];
        } else {
            return [
                            'model' => $model,
                            'update' => 'False',
                        ];
        }
    }

    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdatecda($id, $ult_id_actividad, $_labelmiga)
    {
        $model = $this->findModel($id);
        $model->setScenario('updateadmin');

        $modelpscproceso = \common\models\cda\Cda::find()->joinWith('idCprocesoArca')->where(['id_cda' => $id])->one();
        if ($modelpscproceso['idCprocesoArca']->id_proceso == '3') {
            return [
                    'model' => $model,
                    'modelpscproceso' => null,
                    'update' => 'Error',
                ];
        } else {
            $model2 = $this->findModel2($model->id_cproceso_arca, '1');
            $model3 = $this->findModel2($model->id_cproceso_senagua, '2');
        }

        $model_pscproceso = ['model2' => $model2, 'model3' => $model3];

        //Habilitando Edicion de Numero Quipux Arca o Numero Quipux Senagua==========================================================
        $_editarquipuxarca = $this->update_quipux($model->id_cproceso_arca);
        $_editarquipuxsenagua = $this->update_quipux($model->id_cproceso_senagua);

        if ($model->load(Yii::$app->request->post())) {
            //Guarndado proceso ARCA==================================================================================
            $transaction = Yii::$app->db->beginTransaction();

            if (Model::loadMultiple($model_pscproceso, Yii::$app->request->post()) && Model::validateMultiple($model_pscproceso)) {
                $model2 = $model_pscproceso['model2'];
                $model3 = $model_pscproceso['model3'];

                if ($model2->save()) {
                    if ($model3->load(Yii::$app->request->post())) {
                        if ($model3->save()) {
                            $model->id_cproceso_arca = $model2->id_cproceso;
                            $model->id_cproceso_senagua = $model3->id_cproceso;

                            if ($model->save()) {
                                $model4 = $this->findModel2($model2->id_cproceso, '3', $model2->ult_id_actividad);
                                $model4->diligenciado = 'S';

                                if ($model4->save()) {
                                    // Yii::trace("que carajos ocurre".$model4->id_cactividad_proceso,"DEBUG");
                                    $transaction->commit();

                                    return [
                                            'model' => $model,
                                            'modelpscproceso' => $model_pscproceso,
                                            'update' => 'True',
                                        ];
                                } else {
                                    $transaction->rollBack();
                                    throw new NotFoundHttpException('No se puede guardar PS_CACTIVIDAD');
                                }
                            } else {
                                $transaction->rollBack();
                                throw new NotFoundHttpException('No se puede guardar CDA');
                            }
                        } else {
                            $transaction->rollBack();
                            throw new NotFoundHttpException('No se puede guardar el proceso SENAGUA');
                        }
                    }
                } else {
                    $transaction->rollBack();
                    throw new NotFoundHttpException('No se puede guardar el proceso ARCA');
                }
            } else {
                $transaction->rollBack();
                throw new NotFoundHttpException('Error al cargar modelos');
            }
        } elseif (Yii::$app->request->isAjax) {
            return [
                    'model' => $model,
                    'modelpscproceso' => $model_pscproceso,
                    'editarca' => $_editarquipuxarca,
                    'editsenagua' => $_editarquipuxsenagua,
                    'update' => 'Ajax',
                ];
        } else {
            return [
                            'model' => $model,
                            'update' => 'False',
                            'modelpscproceso' => $model_pscproceso,
                            'editarca' => $_editarquipuxarca,
                            'editsenagua' => $_editarquipuxsenagua,
                        ];
        }
    }

    /**
     * Deletes an existing Cda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();
    }

    /**
     * Encuentra el modelo de Cda basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     *
     * @param int $id
     *
     * @return Cda el modelo cargado
     *
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
        if (($model = Cda::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica.
     *
     * @param type $params contiene array con valores de query a columnas de la tabla
     *
     * @return type  Cda     */
    protected function findModelByParams($params)
    {
        if (($model = Cda::findAll($params)) !== null) {
            return $model;
        } else {
            return null;
        }
    }

    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo Cda.
     *
     * @param type $params contiene array con valores de query a columnas de la tabla
     *
     * @return type Cda     */
    public function cargaCda($params)
    {
        return $this->findModelByParams($params);
    }

    /*Verificando si el proceso con de la arca tiene registro en la tabla ps_actividad_quipux
     *
     */

    protected function update_quipux($id_cproceso)
    {
        if (($quipux = PsActividadQuipux::find()->where(['=', 'id_cproceso', $id_cproceso])->all()) != null) {
            return true;
        } else {
            return false;
        }
    }

    

    

    /*Funcion para traer el encabezado de las paginas*/
    public function findEncabezado($id_cda)
    {
        $searchModel = new PantallaprincipalSearch();

        if (!empty($id_cda)) {
            $searchModel->id_cda = $id_cda;
        }

        //Informacion general obtenida de la consulta para datos basicos / Cabezote =======================================
        $dataProvider = $searchModel->searchdetalleproceso();

        return $dataProvider;
    }

    /*Funcion para traer el encabezado si es solicitud*/
    public function findEncabezadoSolicitud($id_cda)
    {
        $searchModel = new PantallaprincipalSearch();

        //Informacion general obtenida de la consulta para datos basicos / Cabezote =======================================
        $dataProvider = $searchModel->searchdetalleSolicitud($id_cda);

        return $dataProvider;
    }

    /*Funcion para obtener el responsable de la actividad*/
    public function findResponsableactividad($id_cproceso, $id_actividad)
    {
        $_query = PsCactividadProceso::find()
                 ->leftJoin('ps_cproceso', 'ps_cproceso.id_cproceso=ps_cactividad_proceso.id_cproceso and ps_cproceso.ult_id_actividad=ps_cactividad_proceso.id_actividad')
                 ->where(['ps_cproceso.id_cproceso' => $id_cproceso, 'ps_cactividad_proceso.id_actividad' => $id_actividad])
                 ->one();

        return $_query->id_usuario;
    }

    /*Funcion para el listado de demarcaciones*/
    protected function listDemarcaciones()
    {
        $list_demarcaciones = Demarcaciones::find()->all();

        return $list_demarcaciones;
    }

    /*Funcion para el listado de centrodeatencionciudadano*/
    protected function listcentroatencion($id_demarcacion = null)
    {
        if (is_null($id_demarcacion)) {
            $list_centroatencion = CentroAtencionCiudadano::find()->all();
        } else {
            $list_centroatencion = CentroAtencionCiudadano::find()->where(['id_demarcaciones' => $id_demarcacion])->all();
        }

        return $list_centroatencion;
    }

    /**
     * Finds the ps_cproceso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id_cproceso
     *
     * @return ps_cproceso the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel2($id_cproceso, $tipo, $ult_id_actividad = null)
    {
        if ($tipo == '1') {
            $model2 = PsCproceso::findOne($id_cproceso);
            $model2->setScenario('pscprocesoarca');
        } elseif ($tipo == '2') {
            $model2 = PsCproceso::findOne($id_cproceso);
            $model2->setScenario('pscprocesoseagua');
        } elseif ($tipo == '3') {
            $model2 = PsCactividadProceso::find()
                    ->where(['=', 'id_cproceso', $id_cproceso])
                    ->andwhere(['=', 'id_actividad', $ult_id_actividad])
                    ->orderBy(['fecha_creacion' => SORT_DESC, 'id_cactividad_proceso' => SORT_DESC])
                    ->limit('1')
                    ->one();
        }

        if (($model2) !== null) {
            return $model2;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    

    /*Retorna modelo CDA con el escenario de Registrar Datos*/
    public function findModelRegistrarDatos($id)
    {
        if (($model = Cda::findOne($id)) !== null) {
            $model->setScenario('registrardatos');

            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*Funcion que modifica Analizar la infromacion y asignar la solicitud a CDA
     * el modelo carga el escenario de analizar informacion que solo modificara los valores para puntos solicitados y codigo solicitud tecnico
     * al finalizar actualiza el campo DILIGENCIADO de la tabla PS_CACTIVIDAD_PROCESO con 'S'
     */

    public function actionAnalizarinformacion($id, $id_cproceso, $ult_id_actividad)
    {
        $_model = $this->findModelAnalisis($id);
        $_modelcproceso = $this->findModel2($id_cproceso, '1');

        //Se realiza modificacion el boton debe aparecer en dos casos 1. el responsable de cda,  y 2. el responsable de la actividad
        //2) Buscando responsable de la actividad
        $_responsableactividad = $this->findResponsableactividad($id_cproceso, $ult_id_actividad);

        if (Yii::$app->user->identity->id_usuario == $_modelcproceso->ult_id_usuario or Yii::$app->user->identity->id_usuario == $_responsableactividad) {
            $_editarca = true;
        } else {
            $_editarca = false;
        }

        if ($_model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            if ($_model->save()) {
                $_modelactividadproceso = $this->findModel2($id_cproceso, '3', $_modelcproceso->ult_id_actividad);
                $_modelactividadproceso->diligenciado = 'S';

                if ($_modelactividadproceso->save()) {
                    $transaction->commit();

                    return [
                        'model' => $_model,
                        'update' => 'True',
                    ];
                }
            } else {
                $transaction->rollBack();
                throw new NotFoundHttpException('Error al Guardar la Asignacion.');
            }
        } elseif (Yii::$app->request->isAjax) {
            return ['model' => $_model, '_editarca' => $_editarca, 'update' => 'Ajax'];
        } else {
            return ['model' => $_model, '_editarca' => $_editarca, 'update' => 'FALSE'];
        }
    }

    /*Retorna modelo CDA con el escenario de Analisis*/
    public function findModelAnalisis($id)
    {
        if (($model = Cda::findOne($id)) !== null) {
            $model->setScenario('analizarinformacion');

            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
