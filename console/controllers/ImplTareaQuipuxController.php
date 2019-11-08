<?php

namespace console\controllers;

use Yii;

use backend\controllers\notificaciones\TarTareaProgramadaControllerFachada;
use common\general\documents\genExcel;


class ImplTareaQuipuxController extends \yii\console\Controller
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
    
         $facadeCargue = new \frontend\controllers\cargaquipux\PsCargueControllerFachada();
         $psCargue= $facadeCargue->cargaPsCargue(['procesado' => 'N']);
         $detArcCargue=array();
               
         foreach($psCargue as $cargue){
             //se obtiene la configuracion de cada columna y hoja par el tipo de archivo cargador
             $detArcCargue=$this->detalleCargue($cargue ->id_archivo_cargue);
             //Se obtiene la configuracion del tipo de archivo cargado
             $psArchivoCargue=$this->archivoCargue($cargue ->id_archivo_cargue);
            
             $hoja=array();

             //Se agrupa la configuracion por cada hoja
             foreach($detArcCargue as $detalle){
                   
                    $hoja[$detalle["num_nom_hoja"]][]=$detalle;

             }
             // se recorre la configuracion de cada hoja
             foreach($hoja as $key => $sheet){
                //echo "<br><br><br>".var_dump($key)."         ";
                 //Se abre la hoja indicada del archivo de excel
                  $genExcel=new genExcel();
                  echo var_dump('CARGANDO ARCHIVO:  '.realpath(Yii::$app->basePath) . "/../frontend/web/".Yii::$app->params['routeQuipux'].$cargue['ruta']);
                  $dataExcel=$genExcel->cargaExcelSheet(realpath(Yii::$app->basePath) . "/../frontend/web/".Yii::$app->params['routeQuipux'].$cargue['ruta'],$key);
//                                 echo "<br><br>".$cargue['ruta'];
//                                 echo "<r>".$key;
////                                 echo var_dump($dataExcel);

                   $columnasHoja=array(); //columnas para el comando
                   $filasHoja=array();
                  //Se recorren los datos de la hoja desde la fila indicada en la configuracion
                  for($ii=$psArchivoCargue[0]['fila_inicio'];$ii<=count($dataExcel);$ii++){
                      //se buscan en la fila los valores de las columnas configuradas

                      $valores=array();
                      $canCol=0;
                      $nullos=0;

                      //se itera por los campos de la hoja
                      foreach($sheet as $columna){
                          //se crea con la primera iteracion el array de nombres de columnas para mas adelante insertar en batch
                          if($ii==$psArchivoCargue[0]['fila_inicio']){
                               $columnasHoja[$canCol]=strtolower($columna["nom_columna_cargue"]);

                          }
                          // si el dato en la hoja de excel es nulo, se verifica si pertenece a un agrupador y se duplica el valor de la fila anterior
                         if( $dataExcel[$ii][$genExcel->getLetterColumn($columna["num_columna_excel"])] === NULL){
                           //  echo $columna["agr_columna_excel"];
                             $nullos=$nullos+1;
                             if($columna["agr_columna_excel"]=='S'){
                                 try{
                                   $valores[$canCol]=ltrim(rtrim(trim($filasHoja[count($filasHoja)-1][$canCol])));
                                    // $valores[$canCol]=$dataExcel[$ii][$genExcel->getLetterColumn($columna["num_columna_excel"])];
                                 }catch(\yii\base\Exception $e){
                                     echo 'Caught exception: ',  $e->getMessage(), "\n Datos Nullos en la fila inicial y tiene indicado el campo agr_columna_excel en S";
                                 }
                             }else{
                                  $valores[$canCol]=trim($dataExcel[$ii][$genExcel->getLetterColumn($columna["num_columna_excel"])]," ");
                             }
                         }
                         else{
                             // se normalizan las fechas, los campos en la tabla son date y vienen con horas o con GMT
                             $textoins=$this->normalFecha(trim($dataExcel[$ii][$genExcel->getLetterColumn($columna["num_columna_excel"])]));
                             // se normalizan los campos que sean de dias, horas, minutos y segundos
                             if($textoins==$dataExcel[$ii][$genExcel->getLetterColumn($columna["num_columna_excel"])]){
                                $textoins=$this->normalSegundos($dataExcel[$ii][$genExcel->getLetterColumn($columna["num_columna_excel"])]);
                             }
                             $valores[$canCol]=rtrim($textoins," ");
                             //se limpian los caracteres extraños con los que vienen los valores al final de cada campo del excel, para evitar datos incorrectos y desbordamientos

                                  $find = array( '&amp;', "\r\n", "\n",'\t','/[\x00-\x1F\x7F]/','/[\x00-\x1F\x7F\xA0]/u');
                                  $valores[$canCol] = trim(str_replace($find, '', $valores[$canCol]));
                                  if (ord(substr( $valores[$canCol],-1))===160){
                                      $valores[$canCol]=trim(substr( $valores[$canCol],0, strlen($valores[$canCol])-2));
                                  }

                         }

                        $canCol=$canCol+1;


                      }
                      $valores[$canCol]=$cargue->id_cargues;
                      $valores[$canCol+1]=$cargue->id_archivo_cargue;
                      $valores[$canCol+2]=date("Y-m-d");
                      $valores[$canCol+3]=$cargue->fecha_cargue;
                      $valores[$canCol+4]="NO";

                      // si la cantidad de columnas es igual a las que son nulas ya se llego al final de los registros, se elimina el ultimo registro que en el excel muestra solo la cantidad de registros
                     if($canCol==$nullos){
                         array_pop($filasHoja);
                         break;
                     }
                     $filasHoja[]=$valores;
                      //echo "<br><br>".var_dump($valores);
                     //echo  "<br><br>".var_dump($columnasHoja);
                  } 
                 // echo gmdate('D, d M Y H:i:s \G\M\T', time());
                  $columnasHoja[]="id_cargues";
                  $columnasHoja[]="id_archivo_cargue";  
                  $columnasHoja[]="fecha_proceso";  
                  $columnasHoja[]="fecha_cargue";  
                  $columnasHoja[]="procesado";  
                  // se cargan en la tabla temporal
                 try{
                     Yii::$app->db->createCommand()->batchInsert(strtolower($psArchivoCargue[0]['nom_tabla_cargue']), $columnasHoja, $filasHoja)->execute(false);
                    // echo var_dump($resultados);
                 }catch(\yii\base\Exception $e){
                     echo 'Caught exception cargando los datos en ps_tmp_quipux: ',  $e->getMessage(), "\n";
                 }
                 // se homologan en ps_Actividad_quipux
                 try{
                    $data= Yii::$app->db->createCommand("SELECT homologa_quipux()")->query();
//                    echo var_dump($data);
                 }catch(\yii\base\Exception $e){
                     echo 'Caught exception homologando los datos en ps_Actividad_quipux: ',  $e->getMessage(), "\n";
                 }
             }

             //$facadeCargue->actualizaPscargueProcesado($cargue->id_cargues);
             //echo "<br><br><br>".var_dump($cargue);

         }



    }
    
     
    /*******************************************************FUNCIONES  EXCEL*****************************************************************/
    private function detalleCargue($idArchivoCargue){
        $facadeDetalle = new \frontend\controllers\cargaquipux\PsDetArcCargueControllerFachada();
        return $facadeDetalle->cargaPsDetArcCargue(['id_archivo_cargue'=>$idArchivoCargue]);
         
    }
    
    private function archivoCargue($idArchivoCargue){
        $facadeCargue = new \frontend\controllers\cargaquipux\PsArchivoCargueControllerFachada();
        return $facadeCargue->cargaPsArchivoCargue(['id_archivo_cargue'=>$idArchivoCargue]);
    }
    
    private function normalFecha($texto){
        $patternDateTimeGMT="/(\d{4})-(\d{2})-(\d{2})\s*(\d{2}):(\d{2}):(\d{2})\s*\(GMT-\d{1,2}\)/";
        $patternDate="/(\d{4})-(\d{2})-(\d{2})\s*\(GMT-\d{1,2}\)/";
         $patternDateTime="/(\d{4})-(\d{2})-(\d{2})\s*(\d{2}):(\d{2}):(\d{2})/";
        $retorno="";
        if (preg_match($patternDateTimeGMT, $texto)){
            $valores = preg_split("/[\s]+/",trim($texto));
            $retorno=$valores[0];
           // $retorno=preg_replace("/\(GMT-\d{1,2}\)/","",$texto);
        }elseif (preg_match($patternDate, $texto)){
             $valores = preg_split("/[\s]+/",trim($texto));
            $retorno=$valores[0];
            //$retorno=preg_replace("/\(GMT-\d{1,2}\)/","",$texto);
        }elseif (preg_match($patternDateTime, $texto)){
             $valores = preg_split("/[\s]+/",trim($texto));
            $retorno=$valores[0];
            //$retorno=preg_replace("/\(GMT-\d{1,2}\)/","",$texto);
        }else{
            $retorno=ltrim(rtrim(trim($texto)));
        }
        return ltrim(rtrim(trim($retorno)));
    }
    private function normalSegundos($texto){
        $patternDiaHora="/\d\s*((\bdias\b)|(\bdías\b)|(\bdía\b)|(\bdía\b))\s*(\d{2}):(\d{2}):(\d{2})/";
        $patternDia="/\d\s*((\bdias\b)|(\bdías\b)|(\bdía\b)|(\bdía\b))/";
        $patternHoras="/(\d{2}):(\d{2}):(\d{2})/";
        $retorno="";
        if (preg_match($patternDiaHora, $texto)){
            
            $valores = preg_split("/[\s]+/",trim($texto));
            $dias= (integer)$valores[0]*24*60*60;
            $horas=preg_split("/\:/",trim($valores[2]));
            $segundos=$dias+ (integer)$horas[0]*60*60 +(integer)$horas[1]*60 +(integer)$horas[2];
            $retorno=$segundos;
            
        }elseif (preg_match($patternDia, $texto)){
            $horas=preg_split("/[\s]+/",$texto);
            if(is_numeric($horas[0])){
                $segundos=(integer)$horas[0]*24*60*60;
                $retorno=$segundos;
            }else{$retorno=ltrim(rtrim(trim($texto)));}
        }
         elseif (preg_match($patternHoras, $texto)){
            $horas=preg_split("/\:/",$texto);
            if(is_numeric($horas[0])){
                $segundos=(integer)$horas[0]*60*60 +(integer)$horas[1]*60 +(integer)$horas[2];
                $retorno=$segundos;
            }else{$retorno=ltrim(rtrim(trim($texto)));}
        
        }else{
            $retorno=ltrim(rtrim(trim($texto)));
        }
        return ltrim(rtrim(trim($retorno)));
    }

}