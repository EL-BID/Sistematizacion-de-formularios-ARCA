<?php

namespace console\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	
use yii\helpers\Url;	
use yii\jui\ProgressBar;

use common\controllers\controllerspry\ControllerPry;
use backend\controllers\notificaciones\TarTareaProgramadaControllerFachada;
use backend\controllers\notificaciones\CorCorreoControllerFachada;
use backend\controllers\notificaciones\CorParametroControllerFachada;
use backend\controllers\notificaciones\CorDestinatarioControllerFachada;
use backend\controllers\notificaciones\CorMensajeEnviadoControllerFachada;


class ImplTareaAlertaController extends \yii\console\Controller
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            
        ];
    }
    /**
     * 
     * @return type TarTareaProgramada
     * Consulta las tareas programadas que esten activas
     */
    public function actionEjecutaTareas(){
        $facadeTareas =  new  TarTareaProgramadaControllerFachada();
        $tarTareas = $facadeTareas->cargaTareas(['estado'=>'s','id_ttarea'=>2]);
        $hoy = date("d-m-Y",time());
        $proxima= date("d-m-Y",time());
       
        foreach ($tarTareas as $tarea){
            
            $fechaEjecucion=date("d-m-Y",time());
            $fecha_termina=date("d-m-Y",time());
            $ahora=strtotime($hoy);
            
            if(is_null($tarea['fecha_proxima_eje'])){//se asigna fecha de proxima ejecucion en caso de que este null
                $fechaEjecucion=strtotime ( '+'.$tarea['intervalo_ejecucion']. ' second' , strtotime ($tarea['fecha_inicio'])); 
                $proxima=date("d-m-Y",strtotime ( '+'.$tarea['intervalo_ejecucion']. ' second' , strtotime ($tarea['fecha_inicio'])));
                
            } else{
                $fechaEjecucion=strtotime($tarea['fecha_proxima_eje']);
                $proxima=date("d-m-Y",strtotime ( '+'.$tarea['intervalo_ejecucion']. ' second' , strtotime ($tarea['fecha_proxima_eje'])));
            }
            if(is_null($tarea['fecha_termina'])){ // se asigna la fecha de terminacion si esta fue ingresada en la base de datos, de lo contratio se suma un dia a la fecha actual
                $fecha_termina=strtotime ( '+1 day' , strtotime ($hoy));
                
            }else{
                $fecha_termina=strtotime ($tarea['fecha_termina']);                 
            }             
            if($ahora <= $fecha_termina && $ahora >= $fechaEjecucion ){
                
                $this->tareas($tarea);
                
            }
        }
            
            /// SI la fecha >= proxima ejecucion, o si es nullo y fecha < fech_inicio+ intervalo y todo lo anterior < fecha_termina
            // se consultan los correos activos a enviar
            // por cada correo se cargan los paramtros, tomando la consulta sql o de lo contrario el valor por defecto, si el tipo es ciclico, se toma el nombre del parametro y se colca un consecutivo por cada columna, si es de otro tipo se toma la primera columna
            // con los parametros se procede a realizar la busqueda de los destinatarios, pasando como parametros los que se hayan consultado de ser necesario
            // se arma el array de acuerdo al tipo de destinatario
            // se adjunta el html 
            // se adjuntan los paramtros
            // se ejecuta la funcion de envio
            // se toma la fecha + intervalo y se actualiza, si esta fecha supera la fecha_termina, se cambia el estado a n de la tarea
    }
    
    
    private function tareas($tarea){
    
       
                        $facadeActividad = new \frontend\controllers\cda\PsActividadControllerFachada();
                        $psActividades = $facadeActividad->cargaPsActividadAlerta();

                        $fechaAlerta=NULL;
                        $fechaAhora=strtotime(date("d-m-Y",time()));
                        $envio=array();
                        foreach($psActividades as $actividad){
                          if($actividad['campo_fecha_alerta'] === "FECHA_CREACION"){
                               $fechaAlerta=strtotime($actividad['fecha_creacion']);
                          }
                          if($actividad['campo_fecha_alerta'] === "FECHA_PREVISTA"){
                               $fechaAlerta=strtotime($actividad['fecha_prevista']);
                          }
                          
                          if($fechaAlerta && $actividad['plazo_alerta'] && $actividad['plazo_alerta']>0){
                               $fechaAlerta=strtotime ( '+'.$actividad['plazo_alerta'].' second' ,  $fechaAlerta  ) ;
                          }
                          

                          if($fechaAlerta){
                            try{

                                switch (trim($actividad['id_talerta'])) {
                                  case '1':
                                      
                                      //ALarma tareas por terminar, fecha actual mayor a la esperada menos el tiempo del rango indicado para esta alerta en el campo seg_ejecucion de la tabla alerta
                                      $fechaAlertaI=strtotime ( '-'.$actividad['seg_ejecucion'].' second' ,  $fechaAlerta  ) ;   
                                      if ($fechaAhora>$fechaAlertaI && $fechaAhora<=$fechaAlerta){
                                          //

                                          $psCprocesoFacade= new \frontend\controllers\cda\PsCprocesoControllerFachada();
                                          $psCproceso = $psCprocesoFacade->cargaPsCprocesoUsuario($actividad['id_cproceso']);

                                          $proximas[]=['proximas0'=>$psCproceso['numero'],'proximas1'=>$actividad['nom_actividad']
                                                  ,'proximas2'=> date('m/d/Y', $fechaAlerta),'proximas3'=>$actividad['mensaje']];
                                            $alertaActividad=['fecha_envio'=> date('m/d/Y', $fechaAhora),'texto_enviado'=>'','id_usuario'=>$psCproceso[0]['ult_id_usuario']
                                               ,'id_cproceso'=>$actividad['id_cproceso'],'id_cactividad_proceso'=>$actividad['id_cactividad_proceso']
                                                   ,'id_actividad'=>$actividad['id_actividad'],'id_tarea_programada'=>$tarea['id_tarea_programada']];
                                            
                                             if(array_key_exists($psCproceso[0]['ult_id_usuario'], $envio)===false) {
                                                $datos[]=['NombreUsuario'=>$psCproceso[0]['nombres'],'email'=>$psCproceso[0]['email']];
                                                $envio[$psCproceso[0]['ult_id_usuario']]['datos']=$datos;
                                            }
                                           $envio[$psCproceso[0]['ult_id_usuario']]['proximas'][]=$proximas;
                                           $envio[$psCproceso[0]['ult_id_usuario']]['alertaActividad'][]=$alertaActividad;

                                      }
                                  break;
                                  case '2':
                                      //Alarma paraactividades vencidas
                                     
                                       if ($fechaAhora>$fechaAlerta){
                                          $psCprocesoFacade= new \frontend\controllers\cda\PsCprocesoControllerFachada();
                                          $psCproceso = $psCprocesoFacade->cargaPsCprocesoUsuario($actividad['id_cproceso']); 
                                          // echo var_dump($psCproceso);
                                           $vencidas=['vencidas0'=>$psCproceso[0]['numero'],'vencidas1'=>$actividad['nom_actividad']
                                                   ,'vencidas2'=>date('m/d/Y', $fechaAlerta),'vencidas3'=>$actividad['mensaje']];

                                           $alertaActividad=['fecha_envio'=>date('m/d/Y', $fechaAhora),'texto_enviado'=>'','id_usuario'=>$psCproceso[0]['ult_id_usuario']
                                               ,'id_cproceso'=>$actividad['id_cproceso'],'id_cactividad_proceso'=>$actividad['id_cactividad_proceso']
                                                   ,'id_actividad'=>$actividad['id_actividad'],'id_tarea_programada'=>$tarea['id_tarea_programada']];
//                                           echo var_dump($alertaActividad);  
                                            if(array_key_exists($psCproceso[0]['ult_id_usuario'], $envio)===false) {
                                                $datos[]=['NombreUsuario'=>$psCproceso[0]['nombres'],'email'=>$psCproceso[0]['email']];
                                                $envio[$psCproceso[0]['ult_id_usuario']]['datos']=$datos;
                                            }
                                           $envio[$psCproceso[0]['ult_id_usuario']]['vencidas'][]=$vencidas;
                                           $envio[$psCproceso[0]['ult_id_usuario']]['alertaActividad'][]=$alertaActividad;
//                                           echo var_dump($envio); 
                                      }  
                                  break;
                                }
                            }catch(\yii\base\Exception $e){
                               echo 'Caught exception cargando evaluando las alertas: ',  $e->getMessage(), "\n";
                            }
                          }
                        }
                        
                        $facadeCorreos= new CorCorreoControllerFachada();
                        $corCorreos= $facadeCorreos->cargaCorreos(['id_tarea_programada' => $tarea['id_tarea_programada'], 'estado' => 's']);
                        
                        $parametros=array();
                        $destinatarios=array();
                        foreach($corCorreos as $correo){
                            foreach($envio as $env){
                                $parametros["variable"]= $env['datos'];
                                if(array_key_exists('vencidas', $env)) {
                                    $parametros["ciclo"]['vencidas'] = $env['vencidas'];
                                    
                                }else{
                                    $patternTabla='/\<table.*\>(.*)t#vencidas(.*)\<\/table\>/';
                                    $correo['cuerpo']= preg_replace('[\n]', '', $correo['cuerpo']);
                                    $correo['cuerpo']= preg_replace($patternTabla, '', $correo['cuerpo']);
                                }
                                if(array_key_exists('proximas', $env)) {
                                    $parametros["ciclo"]['proximas'] = $env['proximas'];
                                    
                                }else{
                                    $patternTabla='/Actividades por vencerse(.*?)\<(\s*table(.*?))\>(.*?)t#proximas(.*?)\<\/(\s*table(.*?))\>/';
                                    $correo['cuerpo']= preg_replace('[\n]', '', $correo['cuerpo']);
                                    $correo['cuerpo']= preg_replace($patternTabla, '', $correo['cuerpo']);
                                    
                                }
                                
                                 $destinatarios["PARA"][0]=$env['datos'][0]['email'];

                            }
                            
                            $this->envioCorreo($correo,$parametros,$destinatarios);
                        }
                        

    }
    
  
}