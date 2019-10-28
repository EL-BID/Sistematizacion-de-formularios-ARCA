<?php

namespace frontend\controllers\cda;

use Yii;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\ArrayDataProvider;

use common\models\cda\PsCproceso;
use common\models\cda\PsEstadoProceso;
use common\models\autenticacion\UsuariosAp;
use common\models\cda\PsCactividadProceso;


class BasicController extends ControllerPry
{
    
    function __construct(){

        parent::__construct($this->id, $this->module);

    }
  
    /**
     * @inheritdoc
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
    
    
    /*Funcion que entrega el listado de Estado de procesos asociales al procesos CDA--*/
    public function list_estados_cda($id_proceso)
    {
        $_listestados = PsEstadoProceso::find()
                        ->joinWith(['idProceso'])
                        ->select(['ps_estado_proceso.id_proceso', 'ps_estado_proceso.id_eproceso', "concat(ps_estado_proceso.nom_eproceso,' ',ps_proceso.nom_proceso) as nom_eproceso"])
                        ->where(['in', 'ps_estado_proceso.id_proceso', [$id_proceso]])->asArray()->all();

        return $_listestados;
    }
    
    /*Funcion que entrega los nombre de los procesos 
     * @tipo_proceso => es un vector ej: 1,3      */
    public function list_procesos($tipo_proceso)
    {
        
        $_listprocesos = \common\models\cda\PsProceso::find()
                         ->where(['in', 'id_proceso', $tipo_proceso])->asArray()->all();

        return $_listprocesos;
    }
    
    /*
     * Buscando Usuarios 
     */
    public function findUsuarios($id_usuario)
    {
        $list_usuarios = UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
                        ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
                        ->leftJoin('ps_actividad_ruta', 'ps_actividad_ruta.cod_rol = perfiles.cod_rol')
                        ->leftJoin('ps_actividad', 'ps_actividad.rol_a_asignar =  perfiles.cod_rol')
                        ->where(['=', 'usuarios_ap.id_usuario', $id_usuario])
                        ->one();

        if (!empty($list_usuarios)) {
            $listusuarios = UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
                        ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
                        ->leftJoin('ps_actividad_ruta', 'ps_actividad_ruta.cod_rol = perfiles.cod_rol')
                        ->leftJoin('ps_actividad', 'ps_actividad.rol_a_asignar =  perfiles.cod_rol')
                        ->where(['=', 'usuarios_ap.id_usuario', $id_usuario])
                        ->asArray()->all();
        } else {
            $list_usuarios = UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
                        ->where(['=', 'usuarios_ap.id_usuario', $id_usuario]);

            $listusuarios = UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
                        ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
                        ->leftJoin('ps_actividad_ruta', 'ps_actividad_ruta.cod_rol = perfiles.cod_rol')
                        ->leftJoin('ps_actividad', 'ps_actividad.rol_a_asignar =  perfiles.cod_rol')
                        ->where(['=', 'usuarios_ap.id_usuario', $id_usuario]);

            $listusuarios = $list_usuarios->union($list_usuarios2)->asArray()->all();
        }

        return $listusuarios;
    }
    
    
    /*Listado para el campo filtro de seleccion de actividades,
     * se realiza busqueda de las actividad
     * que pertenecen al proceso CDA id_proceso = 1
     */

    public function findActividades($id_proceso=null,$id_actividad=null)
    {
        if(!is_null($id_proceso)){
            $list_actividades = \common\models\cda\PsActividad::find()
                            ->select(['id_actividad', 'nom_actividad','subpantalla'])
                            ->where(['=', 'id_proceso', $id_proceso])
                            ->orderBy(['orden'=>SORT_ASC])
                            ->asArray()->all();
        }else if(!is_null($id_actividad)){
            $list_actividades = \common\models\cda\PsActividad::find()
                            ->select(['id_actividad', 'nom_actividad','subpantalla','rol_a_asignar','id_clasif_actividad'])
                            ->where(['=', 'id_actividad', $id_actividad])
                            ->asArray()->one();
        }
        
        return $list_actividades;
    }
    
    
    /*
     * Entrega las actividades relaciones a un id_cproceso
     * sirve para solicitudes y para tramites
     */
    public function findActividadesCproceso($id_cproceso,$tipo)
    {
        
        //Causal de Pausa =========================================================================
        $vcausas=array();
        $_causas = \common\models\cda\PsOpcTipoSelect::find()->all();
        foreach($_causas as $_clavecas){
            $vcausas[$_clavecas->id_opc_tselect] = $_clavecas->nom_opc_tselect;
        }
        
        
        //Sacando actividades =======================================================================================
        $actividades = PsCactividadProceso::find()
                       ->leftJoin('ps_actividad', 'ps_actividad.id_actividad = ps_cactividad_proceso.id_actividad')
                       ->where(['=', 'id_cproceso', $id_cproceso])
                       ->andwhere(['=', 'id_tactividad', '2'])
                       ->andwhere(['=', 'tipo', $tipo])
                       ->orderBy(['fecha_creacion' => SORT_DESC, 'id_cactividad_proceso' => SORT_DESC, 'orden' => SORT_DESC])
                       ->all();
					   
		$_actividad = "0";
		
		foreach($actividades as $_clave){
			
				if($_clave->id_actividad != $_actividad){
                                    
                                        $_clave->causas = (!empty($_clave->id_opc_tselect))? $vcausas[$_clave->id_opc_tselect]:'';
					$actividad_r[] = $_clave;
				}
				
				$_actividad = $_clave->id_actividad;
		}

        return $actividad_r;
    }
    
    /*
     * Usuario asignado a la ultima actividad y
     * ultima actividad asignada para un ps_cproceso
     */
    public function findUltimaAsignacion($id_cproceso){
        
        $_ultimaasignacion = PsCproceso::find()->where(['id_cproceso'=>$id_cproceso])->one();
        //$_ultimaasignacion->setScenario('pscprocesoarca');
        return $_ultimaasignacion;        
    }
    
    /*
     * Funcion que envia las actividades siguiente a la actividad actual, envia todas las rutas
     */
    public function findActividadRuta($id_actividad_origen=null,$id_actividad_destino=null,$notset=null){
        
        if(!is_null($id_actividad_origen)){
            
            if(!is_null($notset)){
                Yii::trace("aqui llega 2","DEBUG");
                 $_actividadesruta = \common\models\cda\PsActividadRuta::find()
                            ->where(['id_actividad_origen'=>$id_actividad_origen])
                            ->andwhere(['<>','id_actividad_destino',$notset])->with('idActividadDestino')->all();
            }else{
                $_actividadesruta = \common\models\cda\PsActividadRuta::find()
                            ->where(['id_actividad_origen'=>$id_actividad_origen])
                            ->with('idActividadDestino')->all();
            }
         
        }
        
        if(!is_null($id_actividad_destino)){
            
               $_actividadesruta = \common\models\cda\PsActividadRuta::find()
                            ->where(['id_actividad_destino'=>$id_actividad_destino])
                            ->with('idActividadDestino')->all();
             
            
        }
       
        
        return $_actividadesruta;
    }
    
    /*
     * Funcion que envia la informacion de na actividad ruta teniendo en cuenta origen y destino
     */
    public function findActividadRutaDestino($id_actividad_origen=null,$id_actividad_destino=null){
         $_actividadruta = \common\models\cda\PsActividadRuta::find()
                            ->where(['id_actividad_origen'=>$id_actividad_origen,'id_actividad_destino'=>$id_actividad_destino])->one();
         
         return $_actividadruta;
    }
   
    
    /*Funcion que entrega los usuarios asignados a una actividad o a una actividad ruta
     * id_actividad_origen
     * id_actividad_destino
     */
    
    public function findUsuariosrutaActividad($id_actividad_origen=null,$id_actividad_destino=null){
        
        
        //obteniendo roles de la tabla actividad con id_actividad_destino =========================================================
        $_actividaddestino = $this->findActividades(null, $id_actividad_destino);
    
        
        //Obteniendo roles en la actividad ruta ===================================================================================
        if(!is_null($id_actividad_origen)){
            $_actividaruta = $this->findActividadRutaDestino($id_actividad_origen, $id_actividad_destino);
        }
        
        
        //Buscando usuarios ========================================================================================================
        if(!is_null($_actividaddestino['rol_a_asignar'])){
            $roles[] = $_actividaddestino['rol_a_asignar'];
        }
        
        if(!empty($_actividaruta) and !is_null($_actividaruta->cod_rol)){
            $roles[] = $_actividaruta->cod_rol;
        }
   
        if(!empty($roles)){
            $listadousuarios = UsuariosAp::find()
                               ->select(['usuarios_ap.id_usuario', 'nombres'])
                               ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
                               ->where(['in','perfiles.cod_rol',$roles])
                               ->all();
        }else{
            $listadousuarios=array();
        }
        
        return $listadousuarios;
        
    }
    
    
     /*
     * Entrega TRUE si la solicitud paso por la actividad 7
     */
    
    function solicitudPsCactividadProceso($id_cda_solicitud){

        $_registro = \common\models\cda\CdaSolicitud::find()
                    ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cproceso = cda_solicitud.id_cproceso_arca')
                    ->where(['id_cda_solicitud'=>$id_cda_solicitud,'id_actividad'=>7])->one();
        
        return $_registro;
        
    }
    
    /*
     * Entrega el registor de la actividad proceso actual en la que va un proceso
     */
    
    function actualPsCactividadProceso($id_cproceso=null){
        $_registro = PsCactividadProceso::find()->where(['id_cproceso'=>$id_cproceso])->orderBy(['fecha_creacion' => SORT_DESC, 'id_cactividad_proceso' => SORT_DESC])->one();
        
        return $_registro;
    }
    
    /*
     * Listado de Demarcaciones
     */
    public function listDemarcaciones()
    {
        $list_demarcaciones = \common\models\autenticacion\Demarcaciones::find()->all();

        return $list_demarcaciones;
    }
    
    /*
     * Listado de Centros
     */
     public function listcentroatencion($id_demarcacion = null)
    {
        if (is_null($id_demarcacion)) {
            $list_centroatencion = \common\models\poc\CentroAtencionCiudadano::find()->all();
        } else {
            $list_centroatencion = \common\models\poc\CentroAtencionCiudadano::find()->where(['id_demarcaciones' => $id_demarcacion])->all();
        }

        return $list_centroatencion;
    }
    
    /*
     * Centros ciudadanos select one
     */
     public function centrociudadano($id)
    {
        $html = '';

        $centrosPOST = \common\models\poc\CentroAtencionCiudadano::find()
                     ->where(['=', 'id_demarcaciones', $id])
                     ->all();

        $html .= "<option value=''>Seleccione un Centro</option>";

        if (count($centrosPOST) > 0) {
            foreach ($centrosPOST as $clave) {
                $html .= "<option value='".$clave->cod_centro_atencion_ciudadano."'>".$clave->nom_centro_atencion_ciudadano.'</option>';
            }
        } else {
            $html .= "<option value=''></option>";
        }

        echo $html;
    }
    
    
    /*
     * Centros ciudadanos select one para cda
     */
     public function centrociudadano_cda($id)
    {
        $html = '';

        $centrosPOST = \common\models\poc\CentroAtencionCiudadano::find()
                     ->where(['=', 'id_demarcaciones', $id])
                     ->all();

        $html .= "<option value=''>Seleccione un Centro</option>";

        if (count($centrosPOST) > 0) {
            foreach ($centrosPOST as $clave) {
                $html .= "<option value='".$clave->cod_centro_atencion_ciudadano."'>".$clave->nom_centro_atencion_ciudadano.'</option>';
            }
        } else {
            $html .= "<option value=''></option>";
        }

        return $html;
    }
    
    /*
     * Cod_Cantones select one para cda
     */
     public function codcanton_cda($id)
    {
        $html = '';

        $_listadocodcanton = \common\models\autenticacion\Cantones::find()
                                    ->where(['=', 'cantones.cod_provincia', $id])
                                    ->all();

        $html .= "<option value=''>Seleccione un Canton</option>";

        if (count($_listadocodcanton) > 0) {
            foreach ($_listadocodcanton as $clave) {
                $html .= "<option value='".$clave->cod_canton."'>".$clave->nombre_canton.'</option>';
            }
        } else {
            $html .= "<option value=''></option>";
        }

        return $html;
    }
    
    
    /*
     * Buscando modelo de un tramite ya creado
     * Modifcado: Diana B 2019-03-13
     */
    
    public function findTramite($id_cda_tramite){
        
        $tramite = \common\models\cda\CdaTramite::findOne($id_cda_tramite);
        
        if(!empty($tramite)){
            return $tramite;
        }else{
             throw new NotFoundHttpException('No existe el tramite indicado');
        }
    }
    
    
    /*
     * Funcion para retorno a pantalla subcproceso ya sea del tramite
     * o de la solicitud
     */
    public function retornoPantalla($id_cda_solicitud,$id_cda_tramite,$labelmiga,$tipo){
        
        if($tipo == '1'){
            return  $this->redirect(['cda/cdasolicitud/subproceso', 'id_cda_solicitud' => $id_cda_solicitud,'labelmiga'=>$labelmiga]);
        }else if($tipo == '2'){
           return  $this->redirect(['cda/cdatramite/subproceso', 'id_cda_tramite' => $id_cda_tramite,'labelmiga'=>$labelmiga]);
        }
    }
    
    /*
     * Encabezado de la solicitud
     * Modificado: Diana B
     * Fecha: 2019-03-13
     */
    public function encabezadoSolicitud($encabezado){
        
        $_string = "<table class='table table-bordered'>
                    	<tr>
                            <td class='datosbasicos1'> N&uacute;mero Solicitud </td>
                            <td class='datosbasicos2'>". $encabezado['numero']."  </td>
                            <td class='datosbasicos1'> Fecha Ingreso </td>
                            <td class='datosbasicos2'>". $encabezado['fecha_ingreso']." </td>
                        </tr>
                        <tr>
                            <td class='datosbasicos1'> C&oacute;digo ARCA / SENAGUA </td>
                            <td class='datosbasicos2'>". $encabezado['qpxarca'].' / '.$encabezado['qpxsenagua']." </td>
                            <td class='datosbasicos1'> Estado </td>
                            <td class='datosbasicos2'>". $encabezado['nom_eproceso'] ." </td>
                        </tr>
                        <tr>
                            <td class='datosbasicos1'> Enviado Por </td>
                            <td class='datosbasicos2'>". $encabezado['enviado_por'] ." </td>
                            <td class='datosbasicos1'> Rol </td>
                            <td class='datosbasicos2'>". $encabezado['nom_cda_rol']." </td>
                        </tr>
                        <tr>
                            <td class='datosbasicos1'> Responsable </td>
                            <td class='datosbasicos2'>". $encabezado['nombres']." </td>
                            <td class='datosbasicos1'> Fecha de Solicitud </td>
                            <td class='datosbasicos2'>". $encabezado['fecha_solicitud']." </td>
                        </tr>
                        <tr>
                            <td class='datosbasicos1'> Fecha &Uacute;ltima Actividad </td>
                            <td class='datosbasicos2'>". $encabezado['ult_fecha_actividad']." </td>
                            <td class='datosbasicos1'> Fecha &Uacute;ltimo Estado </td>
                            <td class='datosbasicos2'>". $encabezado['ult_fecha_estado']." </td>
                        </tr>
                </table>   ";
        
        return $_string;
        
    }
    

    /*
     * Encabezado del tramite
     * Modificado: Diana B
     * Fecha: 2019-03-13
     */
    public function encabezadoTramite($encabezado){
        
        $_string='<table class="table table-bordered">
            <!----------------------------INICIA CABEZOTE DATOS BASICOS --------------------------------->
            <tr>
                <td class="datosbasicos1"> N&uacute;mero Solicitud </td>
                <td class="datosbasicos2">'. $encabezado['num_solicitud'] .' </td>
                <td class="datosbasicos1"> N&uacute;mero del Tramite </td>
                <td class="datosbasicos2">'. $encabezado['num_tramite'].'</td>
                <td class="datosbasicos1">C&oacute;digo del Tr&aacute;mite  </td>
                <td class="datosbasicos2">'.$encabezado['cod_solicitud_tecnico'].'</td>
                      
            </tr>
            <tr>
                <td class="datosbasicos1"> C&oacute;digo ARCA / SENAGUA </td>
                <td class="datosbasicos2" colspan="3">'. $encabezado['proceso_arca'].' / '.$encabezado['proceso_senagua'].'</td>
                <td class="datosbasicos1"> Estado </td>
                <td class="datosbasicos2">'. $encabezado['nom_eproceso'].'</td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2" colspan="3">'. $encabezado['responsable'].'</td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2">'. $encabezado['fecha_solicitud'].'</td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha &Uacute;ltima Actividad </td>
                <td class="datosbasicos2" colspan="3">'. $encabezado['ult_fecha_actividad'].'</td>
                <td class="datosbasicos1"> Fecha &Uacute;ltimo Estado </td>
                <td class="datosbasicos2">'. $encabezado['ult_fecha_estado'].'</td>
            </tr></table>';
        
        return $_string;
    }
    
    /*
     * Generando html
     */
    
    public function genHtmlClasificacion($visibles,$listcausal,$disabled){
    
 
        $string="";
        
        //Si lleva observacion ==============================================================
        $dis1= ($disabled['observacion']==TRUE)? 'TRUE':'FALSE';
        $string.=($visibles['observacion']==TRUE)? '<?= $form->field($modelpsactividad, "observacion")->textarea([
                                                                "maxlength" => true,
                                                                "title" => "Indique Observacion",
                                                                "data-toggle" => "tooltip",
                                                                "placeholder"=>"Indique Observacion",
                                                                "disabled" =>'.$dis1.']); ?>':'';
        
        //Si lleva puntos ==================================================================
        $dis2 = ($disabled['puntos']==TRUE)? 'TRUE':'FALSE';
        $string.=($visibles['puntos']==TRUE)? '<?= $form->field($modelpsactividad, "puntos")->textarea([
                                                    "maxlength" => true,
                                                    "title" => "Indique Puntos",
                                                    "data-toggle" => "tooltip",
                                                    "placeholder"=>"Indique Puntos",
                                                    "disabled" =>'.$dis2.']) ?>':''; 

        //Fecha Realizacion ==========================================================
        $dis3 = ($disabled['fecha_realizacion']==TRUE)? 'TRUE':'FALSE';
        $string.= ($visibles['fecha_realizacion']==TRUE)? '<?= $form->field($modelpsactividad, "fecha_realizacion")->
                                                                widget(\yii\jui\DatePicker::className(),[
                                                                   "dateFormat" => Yii::$app->fmtfechasql,        
                                                                   "options"=>[
                                                                       "disabled"=>'.$dis3.'
                                                                   ],
                                                                   "clientOptions" => [
                                                                       "yearRange" => "-90:+0",       
                                                                       "changeYear" => true,            
                                                                       "changeMonth" => true]            
                                                               ]) ?>':"";

        //Fecha Prevista ===============================================================
        $dis4 = ($disabled['fecha_prevista']==TRUE)? 'TRUE':'FALSE';
        $string.= ($visibles['fecha_prevista']==TRUE)?  '<?= $form->field($modelpsactividad, "fecha_prevista")->
                                                            widget(\yii\jui\DatePicker::className(),[
                                                               "dateFormat" => Yii::$app->fmtfechasql,        
                                                               "options"=>[
                                                                   "disabled"=>'.$dis4.'
                                                               ],
                                                               "clientOptions" => [
                                                                   "yearRange" => "-90:+0",        
                                                                   "minDate" => "today",          
                                                                   "changeYear" => true,           
                                                                   "changeMonth" => true]           
                                                           ])?>':"";
        
        
        //numeroquipux ====================================================================
         $dis5 = ($disabled['numero_quipux']==TRUE)? 'TRUE':'FALSE';
         $string.= ($visibles['numero_quipux']==TRUE)? '<?= $form->field($modelpsactividad, "numero_quipux")->textInput([
                                                    "maxlength" => true,
                                                    "title" => "Indique Numero Quipux",
                                                    "data-toggle" => "tooltip",
                                                    "placeholder"=>"Indique Numero Quipux",
                                                    "disabled" => '.$dis5.'
                                                     ]) ?>':"";
         
         //dias pausa ======================================================================
         $dis6 = ($disabled['dias_pausa']==TRUE)? 'TRUE':'FALSE';
         
         $string.= ($visibles['numero_quipux']==TRUE)? '<?= $form->field($model, "dias_pausa")->textInput([
                                                        "maxlength" => true,
                                                        "title" => "Indique Dias de Pausa",
                                                        "data-toggle" => "tooltip",
                                                        "placeholder"=>"Indique Dias de Pausa",
                                                        "disabled" => '.$dis6.'
                                                         ]) ?>':"";
         
         
         //dias pausa ======================================================================
         $dis7 = ($disabled['dias_pausa']==TRUE)? 'TRUE':'FALSE';
         
         if($visibles['id_opc_tselect']==TRUE){
             $string.= '<?= $form->field($modelpsactividad, "id_opc_tselect")->dropDownList(\yii\helpers\ArrayHelper::map($listcausal,"id_opc_tselect","nom_opc_tselect"),
                                ["prompt"=>"Seleccione una causal","disabled" => '.$dis7.'])?>';
             
            $string.= '<?= $form->field($modelpsactividad, "otro_cuales")->textInput([
                                        "maxlength" => true,
                                        "title" => "Indique Otra Causal",
                                        "data-toggle" => "tooltip",
                                        "placeholder"=>"Indique Otra Causal", 
                                        "disabled" => true
                                         ]) ?>'; 
         }
         
        
        return $string;
    }
    
    
    /*
     * Resultado para resposables de cda
     */
    public function responsablesCda($id_cda_solicitud){
        
    }
    
    /*
     * Resultado codigo tecnico
     * El c�digo se debe generar de la siguiente manera: SOL_T_XX_CDA_YYY_AAAA
D�nde:
XX: es el n�mero asignado a cada T�cnico.
YYY: consecutivo del c�digo que ha sido creado para cada t�cnico
AAAA: Vigencia A�o

     */
    public function Codtecnico(){
        
        
        //Tomando codigo del tecnico ==========================================
        //$codigo = \common\models\cda\UsuarioCodigoTecnico::find()->where(['id_usuario_ap'=>$id_usuarios_ap])->one();
        
//        if(!empty($codigo)){
//            $codigo_tec = $codigo->codigo_tecnico_rh;
//        }else{
//            throw new \yii\web\HttpException(404, 'El tecnico no tiene codigo asignado');
//        }
        
        //Sacando A�o ========================================================
        $Year = date('Y');
        
        //Cantidad de tramites que tiene asignadas para este a�o ===================date_part('year', mydate)
        $count_T = \common\models\cda\CdaTramite::find()->where(["date_part('year',fecha_solicitud)"=>$Year])->count();
        $count_T+=1;
        $consecutivo = str_pad($count_T, 3, "0", STR_PAD_LEFT);
        
        
        //Creando codigo ============================================================
        $codigoTc = "SOL_T_CDA_".$consecutivo."_".$Year;
        
        
        return $codigoTc;
        
    }
    
    /*
     * Funcion que entrega el codigo de solicitud
     * El c�digo se debe generar de la siguiente manera: SOL_CDA_XXXX_YYYY_AAAA
D�nde:
XXXX: Es la demarcaci�n hidrogr�fica. Opciones: DHSE, DHGU, DHJU, DHMA, DHMI, DHNA, DHPA, DHPC, DHSA
YYYY: Consecutivo del c�digo que ha sido generado para la solicitud enviada al director de recursos h�dricos
AAAA: Vigencia a�o

     */
    public function codigoSolicitud(){
        
        
        //Demarcacion hidrografica =====================================================================================================
        //$demarcacion = \common\models\cda\CdaDhCac::findOne($id_dh_cac);
        //$namedemarcacion = $demarcacion->nom_dh_cac;
        
        //A�o de generacion =============================================================================================================
        $Year = date('Y');
        
        //Conteo para la demarcacion hidrografica ========================================================================================
        $count_T = \common\models\cda\CdaSolicitud::find()->where(["date_part('year',fecha_solicitud)"=>$Year])->count();
        $count_T+=1;
        $consecutivo = str_pad($count_T, 4, "0", STR_PAD_LEFT);
        
        
        $codigoCDA = "SOL_CDA_".$consecutivo."_".$Year;
        
        return $codigoCDA;
    }
    
    
    /*
     * 
     */
    public function cdaLast($id_cproceso){
        
        $_modelLastCda = \common\models\cda\Cda::find()
                         ->leftJoin('ps_cactividad_proceso', 'ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')
                         ->leftJoin('ps_actividad', 'ps_actividad.id_actividad =  ps_cactividad_proceso.id_actividad')
                         ->orderBy(['id_cactividad_proceso'=>SORT_DESC])
                         ->where(['=', 'ps_cactividad_proceso.id_cproceso', $id_cproceso])
                         ->one();
        
        return $_modelLastCda;

    }
    
    /*
     * Desde aqui comienzas la funciones usadas para el reporte en PDF, despues de tener la info se pasa a excel
     * ==================================================================================================================================
     */
    
    
    /*puntos Certificados
     *
     */
    public function cdaCertificados($id_cda_tramite){
       
        
        $_modelCdaPuntos = \common\models\cda\CdaSolicitudInformacion::find()
                            ->where(['id_cda_tramite'=>$id_cda_tramite])->one();
        
        return $_modelCdaPuntos;
        
    }
    
    
     public function cdaCertificadosSolicitud($id_cda_solicitud){
       
        
        $_modelCdaPuntos = \common\models\cda\CdaPuntosCertificados::find()
                            ->where(['id_cda_solicitud'=>$id_cda_solicitud])->all();
        
        return $_modelCdaPuntos;
        
    }
    
    /*
     * Tramites asociadso ============================
     */
    public function CdaTramites($id_cda_solicitud){
        
        $_modelCdaTramites = \common\models\cda\CdaTramite::find()
                            ->select(['id_cda_tramite','usuarios_ap.nombres as usuario','num_tramite','cod_solicitud_tecnico','cda_tramite.id_cproceso'])
                            ->leftJoin('usuarios_ap','usuarios_ap.id_usuario = cda_tramite.id_usuario')
                            ->where(['id_cda_solicitud'=>$id_cda_solicitud])->all();
        
        return $_modelCdaTramites;
    }
    
    /*
     * Informacion de registro de datos 
     */
    
    public function CdadatosBasicos($id_cproceso){
        
        $datosBasicos = \common\models\cda\Cda::find()
                 ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')
                 ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso,'id_actividad'=>'207'])
                 ->one();
         
        if(!empty($datosBasicos)){
            return $datosBasicos;
        }else{
            return '';
        }
    }
    
    
    /*
     * Centro atención ciudadano
     */
    public function CentroAtencion($id){
        
        $_centroatencion = \common\models\poc\CentroAtencionCiudadano::findOne($id);
        
        if(!empty($_centroatencion)){
            return $_centroatencion;
        }else{
            return ''; 
        }
    }
    
    /*
     * Demarcaciones
     */
    public function Demarcacion($id){
        $_demarcacion= \common\models\autenticacion\Demarcaciones::findOne($id);
        return $_demarcacion;
    }
    
    /*
     * Solicitud Informacion
     */
    public function SolicitudInformacion($id_cproceso){
        
        $_solicitudinformacion = \common\models\cda\CdaSolicitudInformacion::find()
                                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda_solicitud_informacion.id_cactividad_proceso')
                                ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso,'id_actividad'=>'209'])
                                ->with('idTinfoFaltante')
                                ->all();
        
        return $_solicitudinformacion;
    }
    
    
    /*
     * Oficio Respuesta
     */
    public function RegistraRespuesta($id_cproceso){
        
        
        $_registrarrespuesta = \common\models\cda\CdaSolicitudInformacion::find()
                                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda_solicitud_informacion.id_cactividad_proceso')
                                ->leftJoin('cda_tipo_info_faltante','cda_tipo_info_faltante.id_tinfo_faltante= cda_solicitud_informacion.id_tinfo_faltante')
                                ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso,'id_actividad'=>'205'])
                                ->with('idTinfoFaltante')
                                ->all();
        
        return $_registrarrespuesta;
    }
    
    /*
     * Cda Reporte Informacion 
     */
    public function ReporteInformacion($id_cproceso,$id_actividad){
        
        
        $_reporteinformacion = \common\models\cda\CdaReporteInformacion::find()
                               ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda_reporte_informacion.id_cactividad_proceso')
                               ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso,'ps_cactividad_proceso.id_actividad'=>$id_actividad])
                               ->with('idSubtfuente')
                               ->with('idTfuente')
                               ->with('idCaracteristica')
                               ->with('idTreporte')
                               ->with('idDestino')
                               ->with('fdUbicacion')
                               ->with('idUsoSolicitado')
                               ->with('fdCoordenadas')
                               ->with('psCodCda')
                               ->all();
        
        return $_reporteinformacion;
    }                          
    
    /*
     * Cda Errores
     */
    public function Errorescda($id_cproceso){
        
        $_errores = \common\models\cda\CdaErrores::find()
                     ->select(['cda_tipo_error.nom_terror as tipoerror','cda_errores.observaciones'])
                     ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda_errores.id_cactividad_proceso')
                     ->leftJoin('cda_registro_error','cda_registro_error.id_cda_error = cda_errores.id_error')
                     ->leftJoin('cda_tipo_error','cda_tipo_error.id_terror = cda_registro_error.id_tipo_error')
                     ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])->all();
        
        return $_errores;
        
    }
    
    
    
    public function AnalisisHidrologico($id_cproceso){
        
        
        $_analisishidrologico = \common\models\cda\CdaAnalisisHidrologico::find()
                               ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda_analisis_hidrologico.id_cactividad_proceso')
                               ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])
                               ->with('idCartografia')
                               ->with('idEhidrografica')
                               ->with('idEmeteorologica')
                               ->with('idMetodologia')
                               ->with('idCodCda')
                               ->all();
        
        return $_analisishidrologico;
    }   
    
    /*
     * Esta funcion es para el cronograma
     * entrega los tramites que se encuentran el base de datos 
     */
    protected function cdaTramitesOpen(){
        
        
        $vectorTramites = array();
        
        $sqlTramites = "SELECT
                        cda_solicitud.id_cda_solicitud,
                        cda_tramite.id_cda_tramite,
                        cda_tramite.num_tramite,	
                        usuarios_ap.id_usuario,
                        usuarios_ap.nombres,
                        ps_cactividad_proceso.id_actividad,
                        ps_actividad.subpantalla,
                        ps_actividad.nom_actividad,
                        ps_cactividad_proceso.fecha_creacion,
                        ps_cactividad_proceso.fecha_realizacion,
                        ps_cactividad_proceso.diligenciado	
                        FROM
                        ps_cactividad_proceso
                        LEFT JOIN ps_cproceso ON ps_cproceso.id_cproceso = ps_cactividad_proceso.id_cproceso
                        LEFT JOIN cda_tramite ON cda_tramite.id_cproceso = ps_cproceso.id_cproceso
                        LEFT JOIN cda_solicitud ON cda_solicitud.id_cda_solicitud = cda_tramite.id_cda_solicitud
                        LEFT JOIN usuarios_ap ON usuarios_ap.id_usuario = ps_cactividad_proceso.id_usuario
                        LEFT JOIN ps_actividad ON ps_actividad.id_actividad = ps_cactividad_proceso.id_actividad
                        LEFT JOIN ps_cproceso proc2 ON proc2.id_cproceso = cda_solicitud.id_cproceso_arca
                        LEFT JOIN perfiles ON perfiles.id_usuario = usuarios_ap.id_usuario
                        LEFT JOIN rol ON rol.cod_rol = perfiles.cod_rol
                        WHERE id_cda_tramite is not NULL and proc2.ult_id_actividad < '17'
                        ORDER BY id_cda_tramite,ps_cactividad_proceso.id_cactividad_proceso,fecha_creacion";
        
        $cda_Tramites =  Yii::$app->db->createCommand($sqlTramites)->queryAll();
        
        //Vectores de actividades ===========================================================
        $tipo0 = ['200'];
        $tipo1 = ['201','207'];
        $tipo2 = ['208','209','212','202'];
        $tipo3 = ['213','214','215','216','217','220','222'];
        $tipo4 = ['210','211','218','219','223'];
        $tipo5 = ['203','204','221','224','225','226'];
        $tipo6 = ['205','206','212','227','228'];
                
        
        
        foreach($cda_Tramites as $keyTramite){
            
            $llave = $keyTramite['id_cda_solicitud'];
            $usuario = $keyTramite['id_usuario'];
            $actividad = $keyTramite['id_actividad'];
            $nomactividad = $keyTramite['nom_actividad'];
            
            if(!empty($keyTramite->subpantalla) and $keyTramite->diligenciado == 'S'){
                $estado = 1;
            }else if(!empty($keyTramite->subpantalla) and $keyTramite->diligenciado == 'N'){
                $estado = 2;
            }else{
                $estado = 3;
            }
            
            
            //Asignando actividad tipo 1 ======================================================
            if(in_array($actividad, $tipo0)){
                $vectorTramites[$usuario][$llave]['tip0'] =  ['A',$actividad,$nomactividad,$estado];
            }
            
            else if(in_array($actividad, $tipo1)){
                $vectorTramites[$usuario][$llave]['tip1'] =  ['A',$actividad,$nomactividad,$estado];
            }
            
            else if(in_array($actividad, $tipo2)){
                $vectorTramites[$usuario][$llave]['tip2'] =  ['A',$actividad,$nomactividad,$estado];
            }
            
            else if(in_array($actividad, $tipo3)){
                $vectorTramites[$usuario][$llave]['tip3'] =  ['A',$actividad,$nomactividad,$estado];
            }
            
            else if(in_array($actividad, $tipo4)){
                $vectorTramites[$usuario][$llave]['tip4'] =  ['A',$actividad,$nomactividad,$estado];
            }
            
            else if(in_array($actividad, $tipo5)){
                $vectorTramites[$usuario][$llave]['tip5'] =  ['A',$actividad,$nomactividad,$estado];
            }
            
            else if(in_array($actividad, $tipo6)){
                $vectorTramites[$usuario][$llave]['tip6'] =  ['A',$actividad,$nomactividad,$estado];
            }
            
        }
        
        
        return $vectorTramites;
    }
    
    
    protected function cdaTecnicos(){
        
        
        $sql = "SELECT usuarios_ap.id_usuario,usuarios_ap.nombres FROM usuarios_ap "
                . " LEFT JOIN perfiles ON perfiles.id_usuario = usuarios_ap.id_usuario
                    LEFT JOIN rol ON rol.cod_rol = perfiles.cod_rol 
                    WHERE rol.cod_rol = 1 and estado_usuario='s' ";
        
        
       $cda_Tecnicos =  Yii::$app->db->createCommand($sql)->queryAll(); 
        
       return $cda_Tecnicos;
        
    }
    
    protected function cdaSolicitudesOpen($id_usuario){
        
    
        //========================================Solicitudes====================================================
        $vectorDatos=array();
        $vectorColor=array();
        
        $sql= "SELECT
                    rol.cod_rol,
                    rol.nombre_rol,
                    usuarios_ap.id_usuario,
                    usuarios_ap.nombres,
                    cda_solicitud.id_cda_solicitud,
                    cda_solicitud.num_solicitud,
                    ps_actividad.id_actividad,
                    ps_actividad.nom_actividad
            FROM
                    cda_solicitud
                    INNER JOIN ps_cproceso AS proc1 ON proc1.id_cproceso = cda_solicitud.id_cproceso_arca
                    LEFT JOIN ps_actividad ON ps_actividad.id_actividad = proc1.ult_id_actividad
                    LEFT JOIN usuarios_ap ON usuarios_ap.id_usuario = proc1.ult_id_usuario
                    LEFT JOIN ps_proceso ON ps_proceso.id_proceso = proc1.id_proceso
                    LEFT JOIN perfiles ON perfiles.id_usuario = usuarios_ap.id_usuario
                    LEFT JOIN rol ON rol.cod_rol = perfiles.cod_rol 
                    LEFT JOIN ps_responsables_proceso ON proc1.id_cproceso = ps_responsables_proceso.id_cproceso
            WHERE
                    id_cda_solicitud IS NOT NULL 
                    AND proc1.ult_id_actividad < '17'  ";
                    //AND ps_responsables_proceso.id_usuario =  ".$id_usuario;
        
        
        $cda_Solicitudes =  Yii::$app->db->createCommand($sql)->queryAll();
        
        foreach($cda_Solicitudes as $clave){
            
            Yii::trace("que llega en id_actividad ".$clave['id_actividad'],"DEBUG");
            
            if($clave['id_actividad'] >= '9' and  $clave['id_actividad'] <= '14' ){
                $color = ["green","white","white","white","white","white"];
            }else if($clave['id_actividad'] == '17'){
                $color = ["white","white","white","white","white","green"];
            }else{
                $color = ["white","white","white","white","white","white"];
            }
     
            //Organizando informacion ======================================================================================
            $_llave = $clave['id_usuario'];        
            $vectorRH [$_llave] = [$_llave,$clave['nombres']];
                       
            //Solicitudes ==================================================================================================
            $vectorSol[$_llave][$clave['id_cda_solicitud']]  = $clave['num_solicitud'];
            
            //Color a pintar ===============================================================================================
            $vectorColor[$clave['id_cda_solicitud']] = $color;
            
            //actividad actual ==============================================================================================
            $vectorDatos[$_llave][$clave['id_cda_solicitud']]['actividad'] = $clave['id_actividad'];
            $vectorDatos[$_llave][$clave['id_cda_solicitud']]['cod_rol'] = $clave['cod_rol'];
            $vectorDatos[$_llave][$clave['id_cda_solicitud']]['nombres'] = $clave['nombres'];
            $vectorDatos[$_llave][$clave['id_cda_solicitud']]['num_solicitud'] = $clave['num_solicitud'];
            $vectorDatos[$_llave][$clave['id_cda_solicitud']]['nom_actividad'] = $clave['nom_actividad'];
            
        }
        
        return [$vectorDatos,$vectorRH,$vectorSol,$vectorColor];
    }
    
    
    
    /*
     * Funcion que genera el cronograma para un Director de Recursos Hidricos
     */
    public function genHTMLCronograma(){
        
        //Usuario conectado ==========================================================================
        $_solicitudes = $this->cdaSolicitudesOpen(Yii::$app->user->identity->id_usuario);
        $_tramites = $this->cdaTramitesOpen();
        $_tecnicos = $this->cdaTecnicos();
        $j_user=0;
        
        $string="";
        
        $string.="<table class='tablecronograma'>";
        
        foreach($_solicitudes[1] as $valor){
            
            $_drhidricos = $valor[0];
            
            if($j_user>0){
                $string.="<tr>";
                $string.="<td colspan='7' class='noborders'>&nbsp;</td>";
                $string.="</tr>";
            }
            
            $string.="<tr>";
                $string.="<td rowspan='2'>".$valor[1]."</td>";
               
                //Sacando la fila de solicitudes asociadas al usuario ===================================================
                foreach($_solicitudes[2][$valor[0]] as $numsolicitud){
                     $string.="<td colspan='6'>".$numsolicitud."</td>";
                }
                
            $string.="</tr>";
            
            $string.="<tr>";
            
                //Armando cuadro de casillas por solicitud ===================================================
                foreach($_solicitudes[2][$valor[0]] as $idSol=>$numsolicitud){
                    $string.="<td bgcolor='".$_solicitudes[3][$idSol][0]."'>1</td>";
                    $string.="<td bgcolor='".$_solicitudes[3][$idSol][1]."'>2</td>";
                    $string.="<td bgcolor='".$_solicitudes[3][$idSol][2]."'>3</td>";
                    $string.="<td bgcolor='".$_solicitudes[3][$idSol][3]."'>4</td>";
                    $string.="<td bgcolor='".$_solicitudes[3][$idSol][4]."'>5</td>";
                    $string.="<td bgcolor='".$_solicitudes[3][$idSol][5]."'>6</td>";
                }
            $string.="</tr>";
            
            //Organizando segunda parate la de TECNICOS ======================================================================
                                 
            foreach($_tecnicos as $tecnicosRH){
                
                $string.="<tr>";
                    $string.="<td>".$tecnicosRH['nombres']."</td>";
                        foreach($_solicitudes[2][$valor[0]] as $idSol=>$numsolicitud){
                    
                            if (!empty($tecnicosRH['id_usuario']) ){
                                $_idusuario = $tecnicosRH['id_usuario'];
                            }else{
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                continue;
                            }
                          
                            if(!empty( $_tramites[$_idusuario] )){
                                
                                if(!empty($_tramites[$_idusuario][$idSol]['tip1'])){
                                    $string.="<td bgcolor='blue'>&nbsp;</td>";
                                }else{
                                     $string.="<td></td>";   
                                }
                                
                                if(!empty($_tramites[$_idusuario][$idSol]['tip2'])){
                                    $string.="<td bgcolor='blue'>&nbsp;</td>";
                                }else{
                                     $string.="<td></td>";   
                                }
                                
                                if(!empty($_tramites[$_idusuario][$idSol]['tip3'])){
                                    $string.="<td bgcolor='blue'>&nbsp;</td>";
                                }else{
                                     $string.="<td></td>";   
                                }
                                
                                if(!empty($_tramites[$_idusuario][$idSol]['tip4'])){
                                    $string.="<td bgcolor='blue'>&nbsp;</td>";
                                }else{
                                     $string.="<td></td>";   
                                }
                                
                                if(!empty($_tramites[$_idusuario][$idSol]['tip5'])){
                                    $string.="<td bgcolor='blue'>&nbsp;</td>";
                                }else{
                                     $string.="<td></td>";   
                                }
                                
                                if(!empty($_tramites[$_idusuario][$idSol]['tip6'])){
                                    $string.="<td bgcolor='blue'>&nbsp;</td>";
                                }else{
                                     $string.="<td></td>";   
                                }
                                
                            }else{
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                $string.="<td></td>";   
                                
                            }
                        }
                $string.="</tr>";
            }
            
            $j_user+=1;
        }
        
        
        
        $string.="</table>";
        
        
        return $string;
    }
    
}
