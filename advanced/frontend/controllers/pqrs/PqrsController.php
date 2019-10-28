<?php

namespace frontend\controllers\pqrs;

use Yii;
use common\models\autenticacion\Cantones;
use common\controllers\controllerspry\ControllerPry;
//Para presentar la barra de espera
//Para presentar la barra de espera
use common\general\documents\genPDF;

/**
 * PqrsController implementa las acciones a través del sistema CRUD para el modelo Pqrs.
 */
class PqrsController extends ControllerPry
{
    //private $facade =    PqrsControllerFachada;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $facade = new  PqrsControllerFachada();

        return $facade->behaviors();
    }

    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute = null, $id = null)
    {
        $facade = new  PqrsControllerFachada();
        echo $facade->actionProgress($urlroute, $id);
    }

    /**
     * Listado todos los datos del modelo Pqrs que se encuentran en el tablename.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (empty(Yii::$app->user->identity->usuario)) {
            return $this->redirect(['site/index']);
        }

        if (!in_array(Yii::$app->user->identity->codRols[0]->cod_rol, [12, 13, 15, 17, 18, 19, 20, 21, 26, 27])) {
            return $this->redirect(['site/index']);
        }

        $facade = new  PqrsControllerFachada();
        $dataAndModel = $facade->actionIndex(Yii::$app->request->queryParams);

        //Pasando listado de estados
        $_listestados = $facade->list_estados_pqrs();

        //Pasando listado de actividad
        $_listactividades = $facade->findActividades();

        //Pasando listado de Usuarios
        //if (Yii::$app->user->identity->codRols[0]->cod_rol == '21') {
        $_listusuarios = $facade->findUsuarios(Yii::$app->user->identity->id_usuario);
        //} else {
        //  $_listusuarios = $facade->findUsuarios();
        //}

        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'listestados' => $_listestados,
            'listresponsables' => $_listusuarios,
            'listactividades' => $_listactividades,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Pqrs.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $facade = new  PqrsControllerFachada();

        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Pqrs .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     *
     * @return mixed
     */
    public function actionCreate($tipo = null)
    {
        //boton crear pqrs??
        //Validando login =================================================================================
        if (!empty(Yii::$app->user->identity->codRols[0]->cod_rol) and !in_array(Yii::$app->user->identity->codRols[0]->cod_rol, [12, 21, 26, 27])) {
            return $this->redirect(['site/index']);
        }

        //Tipos de PQR's======================================================================================
        $list = ['1' => 'Petición', '2' => 'Queja, Reclamo y Controversia', '3' => 'Denuncia', '4' => 'Sugerencia y Felicitaciones'];
        $facade = new  PqrsControllerFachada();

        if (!empty($tipo)) {
            $modelE = $facade->actionCreate(Yii::$app->request->post(), Yii::$app->request->isAjax, $tipo);
            $model = $modelE['model'];

            if ($modelE['create'] == 'True') {
                //Si lo diligencia un usuario que no esta logueado
                if (empty(Yii::$app->user->identity->usuario)) {
                    Yii::$app->getSession()->setFlash('success', [
                           'type' => 'pqrs',
                           'message' => $modelE['mensaje'],
                    ]);

                    return $this->redirect(['pqrs/pqrs/create']);
                } else {
                    Yii::$app->session->setFlash('FormSubmitted', '2');

                    return  $this->redirect(['progress', 'urlroute' => 'index']);
                }
            } elseif ($modelE['create'] == 'Ajax') {
                return $this->renderAjax('viewForm', [
                             'model' => $model, 'tipo' => $tipo,
                 ]);
            } else {
                return $this->render('viewForm', [
                     'model' => $model, 'tipo' => $tipo,
                 ]);
            }
        } else {
            $model = '';

            return $this->render('create', [
                     'model' => $model, 'list' => $list,
                 ]);
        }
    }

    /*
     * Crea una nueva peticion
     */
//    public function actionCreatepeticion()
//    {
//       $facade =  new  PqrsControllerFachada;
//       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,'peticion');
//
//        $model = $modelE['model'];
//        if ($modelE['create'] == 'True') {
//
//            Yii::$app->session->setFlash('FormSubmitted','2');
//            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_pqrs]);
//
//        }else if($modelE['create'] == 'False'){
//
//             Yii::$app->getSession()->setFlash('error', [
//                           'type' => 'error',
//                           'message' => $modelE['mensaje'],
//                       ]);
//
//
//            return  $this->redirect(['pqrs/pqrs/index']);
//
//
//        }elseif($modelE['create']=='Ajax'){
//             return $this->renderAjax('createpeticion', [
//                        'model' => $model,
//            ]);
//        }
//        else {
//            return $this->render('createpeticion', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Modifica un dato existente en el modelo Pqrs.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade = new  PqrsControllerFachada();
        $modelE = $facade->actionUpdate($id, Yii::$app->request->post(), Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            Yii::$app->session->setFlash('FormSubmitted', '1');

            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_pqrs]);
        } elseif ($modelE['update'] == 'Ajax') {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pqrs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade = new  PqrsControllerFachada();
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    /*Entrega listado de cantones sociados a una provincia*/
    public function actionListadocantones($id)
    {
        $html = '';

        $cantonesPost = Cantones::find()
                     ->where(['=', 'cantones.cod_provincia', $id])
                     ->all();

        $html .= "<option value=''>Seleccione un Canton</option>";

        if (count($cantonesPost) > 0) {
            foreach ($cantonesPost as $clave) {
                $html .= "<option value='".$clave->cod_canton."'>".$clave->nombre_canton.'</option>';
            }
        } else {
            $html .= "<option value=''></option>";
        }

        echo $html;
    }

    public function actionExcel($id_pqrs = null, $nombre_hoja = null)
    {
        //Datos del pqr y el proceso
        $facadePrs = new PqrsControllerFachada();
        $pqrs = $facadePrs->getPcproceso($id_pqrs);
        $_callhelper = new \frontend\helpers\helperHTML();
        $_stringhtmlC = '';
        $nombre = 'pqrs_';

        $_stringhtmlE = $_callhelper->gen_htmlPqrsEncabezadoExcel();

        $facadePsRes = new \frontend\controllers\cda\PsResponsablesProcesoControllerFachada();
        $facedeActQ = new \frontend\controllers\cda\PsActividadQuipuxControllerFachada();

        if (count($pqrs) > 1) {
            foreach ($pqrs as $pqr) {
                //Se consulta la tabla PS_RESPONSABLES  se filtra por el proceso y se selecciona el primer registro se trae el registro correspondiente al usuario y se muestra en esta columna
                $responsable = $facadePsRes->getResponsables($pqr->idCproceso['id_cproceso'], $pqr->idCproceso['ult_id_usuario']);
                //Con el PS_CPROCESO  se consulta la tabla PS_ACTIVIDAD_QUIPUX

                $actividad_quipux = $facedeActQ->getActividadQuipux($pqr->idCproceso['id_cproceso']);

                $_stringhtmlC = $_stringhtmlC.$_callhelper->gen_htmlPqrsCuerpoExcel($pqr, $responsable, $actividad_quipux);
            }
            $nombre = $nombre.'multiple'.date('YmdHis');
        } else {
            //Se consulta la tabla PS_RESPONSABLES  se filtra por el proceso y se selecciona el primer registro se trae el registro correspondiente al usuario y se muestra en esta columna
            $responsable = $facadePsRes->getResponsables($pqrs->idCproceso['id_cproceso'], $pqrs->idCproceso['ult_id_usuario']);
            //Con el PS_CPROCESO  se consulta la tabla PS_ACTIVIDAD_QUIPUX
            $actividad_quipux = $facedeActQ->getActividadQuipux($pqrs->idCproceso['id_cproceso']);

            $_stringhtmlC = $_stringhtmlC.$_callhelper->gen_htmlPqrsCuerpoExcel($pqrs, $responsable, $actividad_quipux);
            $nombre = $nombre.$pqrs->num_consecutivo.'_'.date('YmdHis');
        }

        $_stringhtmlP = $_callhelper->gen_htmlPqrsPieExcel();
        $GeneraExcel = new \common\general\documents\genExcel();

        $GeneraExcel->generadorExcelHTML2($_stringhtmlE.$_stringhtmlC.$_stringhtmlP, $nombre, 'css/pqrs.css', $nombre_hoja);
        //echo $_stringhtmlE.$_stringhtmlC.$_stringhtmlP;
    }

    public function actionPdfDenuncia($id_pqr = null)
    {
        $facadePrs = new PqrsControllerFachada();
        $pqrs = $facadePrs->getPqrs($id_pqr);
        $nombre_formato = 'pqrs_';
        $_stringhtml = '';

        $_callhelper = new \frontend\helpers\helperHTML();

        if (count($pqrs) > 1) {
            foreach ($pqrs as $pqr) {
                $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsDenunciaPdf($pqr);
            }
            $nombre_formato = $nombre_formato.'multiple'.date('YmdHis');
        } else {
            $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsDenunciaPdf($pqrs);
            $nombre_formato = $nombre_formato.$pqrs->num_consecutivo.'_'.date('YmdHis');
        }

        //Iniciando array de retorno
        $datos = [];

        //Declarando Metodos header and footer
        $methods = [
            'SetHeader' => ['PQRS'],
            'SetFooter' => ['{PAGENO}'],
        ];
        $_stringhtml = str_replace('"="">', '>', $_stringhtml);
        $GeneraPdf = new genPDF();
        $propiedades = array('formato' => $GeneraPdf::FORMATO_A4, 'destino' => $GeneraPdf::DESTINO_NAVEGADOR, 'orientation' => $GeneraPdf::ORIENTACION_HORIZONTAL);
        $retorno = $GeneraPdf->generadorPDF($_stringhtml, $nombre_formato, $propiedades, null, $methods, null, 'css/pqrs.css');
        $datos['pdf'] = $retorno;
    }

    public function actionPdfQueja($id_pqr = null)
    {
        $facadePrs = new PqrsControllerFachada();
        $pqrs = $facadePrs->getPqrs($id_pqr);
        $nombre_formato = 'pqrs_';
        $_stringhtml = '';

        $_callhelper = new \frontend\helpers\helperHTML();

        if (count($pqrs) > 1) {
            foreach ($pqrs as $pqr) {
                $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsQuejaPdf($pqr);
            }
            $nombre_formato = $nombre_formato.'multiple'.date('YmdHis');
        } else {
            $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsQuejaPdf($pqrs);
            $nombre_formato = $nombre_formato.$pqrs->num_consecutivo.'_'.date('YmdHis');
        }

        //Iniciando array de retorno
        $datos = [];

        //Declarando Metodos header and footer
        $methods = [
            'SetHeader' => ['PQRS'],
            'SetFooter' => ['{PAGENO}'],
        ];
        $_stringhtml = str_replace('"="">', '>', $_stringhtml);
        $GeneraPdf = new genPDF();
        $propiedades = array('formato' => $GeneraPdf::FORMATO_A4, 'destino' => $GeneraPdf::DESTINO_NAVEGADOR, 'orientation' => $GeneraPdf::ORIENTACION_HORIZONTAL);
        $retorno = $GeneraPdf->generadorPDF($_stringhtml, $nombre_formato, $propiedades, null, $methods, null, 'css/pqrs.css');
        $datos['pdf'] = $retorno;
    }

    public function actionPdfbyTipo($tipo_pqrs, $id_pqrs)
    {
        switch ($tipo_pqrs) {
           case '1':
               $this->actionPdfPeticion($id_pqrs);
               break;
           case '2':
               $this->actionPdfQueja($id_pqrs);
               break;
           case '3':
               $this->actionPdfDenuncia($id_pqrs);
               break;
           case '4':
               $this->actionPdfSugerencia($id_pqrs);
              break;
       }
    }

    public function actionPdfPeticion($id_pqr = null)
    {
        $facadePrs = new PqrsControllerFachada();
        $pqrs = $facadePrs->getPqrs($id_pqr);
        $nombre_formato = 'pqrs_';
        $_stringhtml = '';

        $_callhelper = new \frontend\helpers\helperHTML();

        if (count($pqrs) > 1) {
            foreach ($pqrs as $pqr) {
                $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsPeticionPdf($pqr);
            }
            $nombre_formato = $nombre_formato.'multiple'.date('YmdHis');
        } else {
            $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsPeticionPdf($pqrs);
            $nombre_formato = $nombre_formato.$pqrs->num_consecutivo.'_'.date('YmdHis');
        }
        //Iniciando array de retorno
        $datos = [];

        //Declarando Metodos header and footer
        $methods = [
            'SetHeader' => ['PQRS'],
            'SetFooter' => ['{PAGENO}'],
        ];

        $_stringhtml = str_replace('"="">', '>', $_stringhtml);

        $GeneraPdf = new genPDF();
        $propiedades = array('formato' => $GeneraPdf::FORMATO_A4, 'destino' => $GeneraPdf::DESTINO_NAVEGADOR, 'orientation' => $GeneraPdf::ORIENTACION_HORIZONTAL);
        $retorno = $GeneraPdf->generadorPDF($_stringhtml, $nombre_formato, $propiedades, null, $methods, null, 'css/pqrs.css');
        $datos['pdf'] = $retorno;
    }

    public function actionPdfSugerencia($id_pqr = null)
    {
        $facadePrs = new PqrsControllerFachada();
        $pqrs = $facadePrs->getPqrs($id_pqr);
        $nombre_formato = 'pqrs_';
        $_stringhtml = '';

        $_callhelper = new \frontend\helpers\helperHTML();

        if (count($pqrs) > 1) {
            foreach ($pqrs as $pqr) {
                $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsSugerenciaPdf($pqr);
            }
            $nombre_formato = $nombre_formato.'multiple'.date('YmdHis');
        } else {
            $_stringhtml = $_stringhtml.$_callhelper->gen_htmlPqrsSugerenciaPdf($pqrs);
            $nombre_formato = $nombre_formato.$pqrs->num_consecutivo.'_'.date('YmdHis');
        }

        //Iniciando array de retorno
        $datos = [];

        //Declarando Metodos header and footer
        $methods = [
            'SetHeader' => ['PQRS'],
            'SetFooter' => ['{PAGENO}'],
        ];
        $_stringhtml = str_replace('"="">', '>', $_stringhtml);
        $GeneraPdf = new genPDF();
        $propiedades = array('formato' => $GeneraPdf::FORMATO_A4, 'destino' => $GeneraPdf::DESTINO_NAVEGADOR, 'orientation' => $GeneraPdf::ORIENTACION_HORIZONTAL);
        $retorno = $GeneraPdf->generadorPDF($_stringhtml, $nombre_formato, $propiedades, null, $methods, null, 'css/pqrs.css');
        $datos['pdf'] = $retorno;
    }

    /*Funcion que selecciona que tipo de formato pqr se debe generar y redirige
    * a la siguiente funcion, se realiza maestro dado que el sistema muestra el mismo
    * boton para todas las pqr's
    */

    public function actionPdf($id_pqr)
    {
        $facadePrs = new PqrsControllerFachada();
        $pqrs = $facadePrs->getPqrs($id_pqr);

        if ($pqrs->tipo_pqrs == 3) {
            $_clasehtml = 'DenunciaPdf';
        } elseif ($pqrs->tipo_pqrs == 2) {
            $_clasehtml = 'QuejaPdf';
        } elseif ($pqrs->tipo_pqrs == 1) {
            $_clasehtml = 'PeticionPdf';
        } elseif ($pqrs->tipo_pqrs == 4) {
            $_clasehtml = 'SugerenciaPdf';
        }

        $_datapdf = $this->genhtmlPdf($pqrs, $_clasehtml);

        $GeneraPdf = new genPDF();
        $propiedades = array('formato' => $GeneraPdf::FORMATO_A4, 'destino' => $GeneraPdf::DESTINO_NAVEGADOR, 'orientation' => $GeneraPdf::ORIENTACION_HORIZONTAL);
        $retorno = $GeneraPdf->generadorPDF($_datapdf[0], $_datapdf[1], $propiedades, $_datapdf[2], $_datapdf[3], $_datapdf[4], $_datapdf[5]);
        $datos['pdf'] = $retorno;
    }

    /*Funcion para generar el pdf de denuncia
     *
     */

    protected function genhtmlPdf($pqrs, $clasehtml)
    {
        $nombre_formato = 'pqrs_';
        $_callhelper = new \frontend\helpers\helperHTML();
        $_stringhtml = $_callhelper->{'gen_htmlPqrs'.$clasehtml}($pqrs);

        //Iniciando array de retorno
        $datos = [];

        //Declarando Metodos header and footer
        $methods = [
            'SetHeader' => ['PQRS'],
            'SetFooter' => ['{PAGENO}'],
        ];

        return [$_stringhtml, $nombre_formato, null, $methods, null, 'css/pqrs.css'];
    }
}
