<?php

namespace frontend\controllers\poc;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
//Para presentar la barra de espera
//Para presentar la barra de espera
use frontend\helpers\saveconsulta;
use frontend\helpers\helperHTML;
use common\models\poc\ConsultaCiudadana;
use common\models\poc\FdCapitulo;
use common\models\poc\FdPreguntaSearch;
use common\models\poc\FdConjuntoRespuesta;
use common\models\poc\FdFormato;
use common\models\poc\FdDatosGenerales;
use yii\web\UploadedFile;

/*Controlador para presentar formulario del tipo Consulta
 * Ciudadana, estos formatos no se vinculan a ningun usuario, se
 * diligencian de manera anonima, el acceso de esta funcion se da desde la
 * pagina de captura del captcha, el formulario se abre de formato completa y diferencia el registro
 * a travès del correo diligenciado, todo formulario de consulta ciudadana debe solicitar el correo
 * del usuario que lo esta diligenciando:
 *
 * $id_fmt => id del formato creado en la tabla fd_formato
 *
 */

/**
 * Controlador que gestionara la informaciòn para la creacion de la vista y modelos de detalle capitulo.
 */
class ConsultaciudadanaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $facade = new ConsultaciudadanaControllerFachada();

        return $facade->behaviors();
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /*Esta funcion recepciona la informacion necesaria para poder abrir un formato tipo
     * CONSULTA CIUDADANA, este tipo de formatos tiene relacionado 1 solo capitulo, y no tiene secciones
     * se mantiene el modelo de ordendamiento y numeracion del gestor de formatos, asi comoe el uso del tipo de preguntas
     */

    public function actionIndex($id_fmt, $id_conj_rpta = null)
    {
        $facade = new ConsultaciudadanaControllerFachada();
        $habilitado = false;

        //1)Presentando el id_conjunto_preguntas en el formato=================================================================================

        if (empty($facade->getConjuntoPregunta($id_fmt))) {
            throw new NotFoundHttpException('No se encuentra habilitado el formato');
        } else {
            $id_conj_prta = $facade->getConjuntoPregunta($id_fmt);
        }

        //2)Generando vista -- La vista inicial solo presenta habilitado el campo correo electronico con el cual se verifica si exite un conjunto de
        //respuestas asociadas al formato ya creado, los datos basicos del formato se guardan en fd_datos_generales===========================
        $_genformato = $this->genFormato($id_fmt, $id_conj_prta, $id_conj_rpta);

        //Revisando si existe envio de datos por el boton de continuar ========================================================================
        if (!empty(Yii::$app->request->post()['botonhabilitar']) and Yii::$app->request->post()['botonhabilitar'] == '1') {
            //Cargando Datos a Modelo Generales===============================================================================================
            if ($_genformato['modelgenerales']->load(Yii::$app->request->post())) {
                $id_conj_rpta = $this->getConjuntoRespuesta($_genformato['modelgenerales'], $id_conj_prta, $id_fmt);
                $this->redirect(['poc/consultaciudadana/index', 'id_fmt' => $id_fmt, 'id_conj_rpta' => $id_conj_rpta]);
            }
        }

        //Guardando Datos Recopilados==========================================================================================================
        if (!empty(Yii::$app->request->post()['botoncrear2']) and Yii::$app->request->post()['botoncrear2'] == '1') {
            //Existen preguntas tipo soporte===================================================================================================
            if (!empty($_genFormato['_soportes'])) {
                $_filessop = $this->guardarSoportes($_genFormato['_soportes'], $_genformato['model']);
            } else {
                $_filessop = array();
            }

            $_guardado = $this->genGuardar(Yii::$app->request->post(), $id_conj_prta, $id_conj_rpta, $id_fmt, $_genformato['_varpass'], $_genformato['_agrupadas'], $_filessop);

            if ($_guardado === true) {
                /*Yii::$app->getSession()->setFlash('success', [
                          'type' => 'success',
                          'message' => 'Datos Guardados con Exito',
                      ]);*/

                $this->redirect(['poc/consultaciudadana/messagesuccess', 'id_fmt' => $id_fmt]);
            } else {
                throw new NotFoundHttpException('El sistema generó un error por favor intente más tarde');
            }
        }

        //Habilitando boton de continuar =====================================================================================================
        if (!empty($id_conj_rpta)) {
            $hab_continuar = false;
        } else {
            $hab_continuar = true;
        }

        //Retornando a la Vista================================================================================================================
        return $this->renderAjax('consultaciudadana', [
                    'model' => $_genformato['model'],
                    'vista' => $_genformato['stringhtml'],
                    'modelgenerales' => $_genformato['modelgenerales'],
                    'id_conj_rpta' => $id_conj_rpta,
                    'id_conj_prta' => $id_conj_prta,
                    'id_fmt' => $id_fmt,
                    'id_capitulo' => $_genformato['idcapitulo'],
                    'dinamicjavascript' => $_genformato['dinamicjavascript'],
                    'hab_continuar' => $hab_continuar,
          ]);
    }

    public function genFormato($id_fmt, $id_conj_prta, $id_conj_rpta)
    {
        //Revisando si el formato tiene numeracion==============================================================
        $m_formato = FdFormato::findOne($id_fmt);
        $_numeracionpreg = $m_formato->numeracion;

        //Traiendo modelo de datos generales, es con este modelo que sabemos si existe o no un conjunto respuesta
        //teniendo en cuenta el correo===========================================================================

        if (\is_null($id_conj_rpta) === false) {
            $_findsearch = FdDatosGenerales::find()->where(['id_conjunto_respuesta' => $id_conj_rpta])->all();
            foreach ($_findsearch as $_modelgenerales) {
                $_modelgenerales->scenario = 'consultaciudadana_nocaptcha';
            }
        } else {
            $_modelgenerales = new FdDatosGenerales();
            $_modelgenerales->setScenario('consultaciudadana');
        }

        //Traiendo datos del capitulo============================================================================
        $_capitulos = FdCapitulo::find()
                          ->where(['id_conjunto_pregunta' => $id_conj_prta])
                          ->asArray()->all();

        foreach ($_capitulos as $clave) {
            $_arraycap[] = $clave['id_capitulo'];
            $id_capitulo = $clave['id_capitulo'];
        }

        //Traiendo Conjunto de Preguntas asociadas al capitulo====================================================
        $m_preguntas = new FdPreguntaSearch();
        $r_pregunta[$id_capitulo] = $m_preguntas->buscar($id_capitulo, $id_conj_prta, $id_conj_rpta);

        //Organizando Preguntas y Respuestas======================================================================
        $r_pnoseccion = array();

        for ($a = 0; $a < count($_arraycap); ++$a) {
            $_indicecap = $_arraycap[$a];

            foreach ($r_pregunta[$_indicecap] as $_claverecor) {
                /* Organizando vectores de pregunta */
                $_indicepregunta = $_claverecor['id_pregunta'];
                $_campo = $this->_respuestastipo($_claverecor['id_tpregunta']);           /*Asigna el campo de respuesta segun el tipod de pregunta*/

                $r_pnoseccion[$_indicecap][$_indicepregunta] = ['id_capitulo' => $_claverecor['id_capitulo'],
                                                                  'id_conjunto_pregunta' => $_claverecor['id_conjunto_pregunta'],
                                                                  'id_pregunta' => $_indicepregunta,
                                                                  'nom_pregunta' => $_claverecor['nom_pregunta'],
                                                                  'id_tpregunta' => $_claverecor['id_tpregunta'],
                                                                  'num_col_label' => $_claverecor['num_col_label'],
                                                                  'num_col_input' => $_claverecor['num_col_input'],
                                                                  'visible' => $_claverecor['visible'],
                                                                  'visible_desc_pregunta' => $_claverecor['visible_desc_preg'],
                                                                  'max_largo' => $_claverecor['max_largo'],
                                                                  'min_largo' => $_claverecor['min_largo'],
                                                                  'obligatorio' => $_claverecor['obligatorio'],
                                                                  'min_date' => $_claverecor['min_date'],
                                                                  'max_date' => $_claverecor['max_date'],
                                                                  'atributos' => $_claverecor['atributos'],
                                                                  'reg_exp' => $_claverecor['reg_exp'],
                                                                  'max_number' => $_claverecor['max_number'],
                                                                  'min_number' => $_claverecor['min_number'],
                                                                  'id_tselect' => $_claverecor['id_tselect'],
                                                                  'id_agrupacion' => $_claverecor['id_agrupacion'],
                                                                  'tp_url_subpantalla' => $_claverecor['tp_url_subpantalla'],
                                                                  'ayuda_pregunta' => $_claverecor['ayuda_pregunta'],
                                                                  'id_respuesta' => $_claverecor['id_respuesta'],
                                                                  'ag_descripcion' => $_claverecor['ag_descripcion'],
                                                                  'respuesta' => $_claverecor[$_campo],
                                                                    'stylecss' => $_claverecor['stylecss'],
                                                                    'caracteristica_preg' => $_claverecor['caracteristica_preg'],
                                                                    'ag_num_col' => $_claverecor['ag_num_col'],
                                                                    'ag_num_row' => $_claverecor['ag_num_row'],
                                                                    'format' => $_claverecor['format'], 'numerada' => $_numeracionpreg,
                                                                    'id_pregunta_habilitadora' => $_claverecor['id_pregunta_habilitadora'],
                                                                    'operacion' => $_claverecor['operacion'], 'valor' => $_claverecor['valor'],
                                                                    'tipo_agrupacion' => $_claverecor['tipo_agrupacion'],
                                                                    'id_tcondicion' => $_claverecor['id_tcondicion'],
                                                                    'id_pregunta_condicionada' => $_claverecor['id_pregunta_condicionada'],
                                                                    'opercond' => $_claverecor['opercond'],
                                                                    'valorcond' => $_claverecor['valorcond'],
                                                                    'tcond' => $_claverecor['tcond'], ];
            }
        }

        //Generando Modelo========================================================================================
        $model = new ConsultaCiudadana($_arraycap, $r_pnoseccion);
        if (empty($model)) {
            throwException('Error al general modelo de Consulta Ciudadana');
        }

        //Generando Vista=========================================================================================

        if (!empty($id_conj_rpta) or \is_null($id_conj_rpta) === false) {
            $_helperHTML = new helperHTML();
            $_helperHTML->id_conj_rpta = $id_conj_rpta;
            $_helperHTML->id_fmt = $id_fmt;
            $_helperHTML->capituloid = $id_capitulo;
            $_helperHTML->aplicadisable = 1;
            $_helperHTML->gen_detacapituloview($_capitulos, $r_pnoseccion, '', '', $_numeracionpreg, null, null, '', '', '');
            $_string = $_helperHTML->_stringhtml;
            $_varpass = $_helperHTML->_varpass;
            $_agrupadas = $_helperHTML->agrupadas;
            $_soportes = $_helperHTML->_tiposoporte;
            $_stringjs = $_helperHTML->_stringjavascriptcond;

        //Yii::trace("que lleva "+$_helperHTML->_stringjavascriptcond,"DEBUG");
        } else {
            $_string = [];
            $_varpass = '';
            $_agrupadas = '';
            $_soportes = '';
            $_stringjs = '';
        }

        return ['model' => $model, 'modelgenerales' => $_modelgenerales,
                'stringhtml' => $_string, 'idcapitulo' => $id_capitulo, '_varpass' => $_varpass,
                '_agrupadas' => $_agrupadas, '_soportes' => $_soportes, 'dinamicjavascript' => $_stringjs, ];
    }

    public function genGuardar($getpost, $id_conj_prta, $id_conj_rpta, $id_fmt, $_varpass, $agrupadas, $filesup)
    {
        $_savecapitulo = new saveconsulta();
        $_savecapitulo->_vcapitulo = $getpost;
        $_savecapitulo->_idconjprta = $id_conj_prta;
        $_savecapitulo->_idconjrpta = $id_conj_rpta;
        $_savecapitulo->_idformato = $id_fmt;
        $_savecapitulo->_relaciones = $_varpass;
        $_savecapitulo->_tipo11 = $filesup;
        $_savecapitulo->_agrupadas = $agrupadas;

        if ($_savecapitulo->guardar()) {
            //Cambiando fd_adm_estado del conjunto respuesta a Enviado ====================================
            $_modelconjuntorpta = $this->findModelCrpta($id_conj_rpta);
            $_modelconjuntorpta->ult_id_adm_estado = '6'; // $_modelconjuntorpta->ult_id_adm_estado = '22';

            if ($_modelconjuntorpta->save()) {
                return true;
            } else {
                throw new NotFoundHttpException('Error al guardar conjunto de respuesta');

                return false;
            }
        } else {
            throw new NotFoundHttpException('Error al guardar Respuestas');

            return false;
        }
    }

    protected function _respuestastipo($tipo)
    {
        if ($tipo == 1) {
            $_campo = 'ra_fecha';
        } elseif ($tipo == 2) {
            $_campo = 'ra_check';
        } elseif ($tipo == 3) {
            $_campo = 'id_opcion_select';
        } elseif ($tipo == 4) {
            $_campo = 'ra_descripcion';
        } elseif ($tipo == 5) {
            $_campo = 'ra_entero';
        } elseif ($tipo == 6) {
            $_campo = 'ra_decimal';
        } elseif ($tipo == 7) {
            $_campo = 'ra_porcentaje';
        } elseif ($tipo == 8) {
            $_campo = 'ra_moneda';
        } else {
            $_campo = 'ra_descripcion';
        }

        return $_campo;
    }

    protected function getConjuntoRespuesta($generales, $id_conj_prta, $id_fmt)
    {
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $_getDatosExistentes = FdDatosGenerales::find()
                        ->leftjoin('fd_conjunto_respuesta', 'fd_conjunto_respuesta.id_conjunto_respuesta = fd_datos_generales.id_conjunto_respuesta')
                        ->leftjoin('fd_conjunto_pregunta', 'fd_conjunto_pregunta.id_conjunto_pregunta = fd_conjunto_respuesta.id_conjunto_pregunta')
                        ->where(['=', 'correo_electronico', $generales['correo_electronico']])
                        ->andwhere(['=', 'fd_conjunto_pregunta.id_conjunto_pregunta', $id_conj_prta])
                        ->one();

        if (!empty($_getDatosExistentes->id_conjunto_respuesta)) {
            return $_getDatosExistentes->id_conjunto_respuesta;
        } else {
            //Creando el fdConjuntoRespuesta con el fd_adm_estado en diligenciado.
            $fdconjuntorespuesta = new FdConjuntoRespuesta();
            $fdconjuntorespuesta->id_conjunto_pregunta = $id_conj_prta;
            $fdconjuntorespuesta->id_formato = $id_fmt;
            $fdconjuntorespuesta->fecha_creacion = $fechaactual;
            $fdconjuntorespuesta->ult_id_adm_estado = 5; //$fdconjuntorespuesta->ult_id_adm_estado = 21;

            if ($fdconjuntorespuesta->save()) {
                $generales->id_conjunto_respuesta = $fdconjuntorespuesta->id_conjunto_respuesta;

                if ($generales->save()) {
                    return $fdconjuntorespuesta->id_conjunto_respuesta;
                } else {
                    throw new NotFoundHttpException('Error al crear usuario en datos generales.');
                }
            } else {
                throw new NotFoundHttpException('Error al crear conjunto respuesta');
            }
        }
    }

    public function guardarSoportes($soportes, $model)
    {
        foreach ($soportes as $_tpsoporte) {
            $model->$_tpsoporte = UploadedFile::getInstances($model, $_tpsoporte);
            $resultado = $model->upload($_tpsoporte);

            if ($resultado[0] === true) {
                foreach ($resultado[1] as $_clfile) {
                    $_filesup[$_tpsoporte][] = $_clfile;
                }
            } else {
                throw new NotFoundHttpException('Error al guardar soportes.');
            }
        }

        return $_filesup;
    }

    /*Modelo de conjunto respuesta para cambio de ult_id_adm_estado*/
    protected function findModelCrpta($id)
    {
        if (($model = FdConjuntoRespuesta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionMessagesuccess($id_fmt)
    {
        return $this->renderAjax('responseok', ['id_fmt' => $id_fmt]);
    }
}
