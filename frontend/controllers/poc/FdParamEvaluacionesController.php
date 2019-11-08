<?php

namespace frontend\controllers\poc;

use Yii;
use frontend\controllers\poc\FdParamEvaluacionesControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use common\models\poc\FdRespuesta;
use common\general\documents\genExcel;




/**
 * FdParamEvaluacionesController implementa las acciones a través del sistema CRUD para el modelo FdParamEvaluaciones.
 */
class FdParamEvaluacionesController extends ControllerPry
{
  //private $facade =    FdParamEvaluacionesControllerFachada;
    /**
     * @inheritdoc
     */
    
    
public $_stringvista;

/*===========================================================================================================================================*/
/*=================================Construyendo el modelo=====================================================================================*/
/*===========================================================================================================================================*/

   
    public function behaviors()
    {
        $facade =  new  FdParamEvaluacionesControllerFachada;
        return $facade->behaviors();
    }
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  FdParamEvaluacionesControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

    public function obtenerEvaluaciones()
    {
        $evaluaciones = \common\models\poc\FdParamEvaluaciones::find()
                ->where(["periodo"=>date('Y')-1])
                ->orderBy(["id_evaluacion" => SORT_ASC])->all();
        return $evaluaciones;
    }
	
    /**
     * Listado todos los datos del modelo FdParamEvaluaciones que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_conj_rpta,$id_conj_prta, $id_fmt, $last,$estado,$provincia,$cantones)
    {
        $array_componentes = array();              
        $facade =  new  FdParamEvaluacionesControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams); 
        $dataAndModel['dataProvider']->pagination->pageSize=45;            
                       
        $datosriego = $this->ObtenerDatosRiego($id_conj_rpta);
        $ubicacion = $this->ObtenerUbicacion($id_conj_rpta);                     
        $demarcacion =$this->ObtenerDemarcacion($ubicacion);
        $provincias_n =$this->ObtenerProvincia($ubicacion);
        $cantones_n =$this->ObtenerCantones($ubicacion);
        $parroquias =$this->ObtenerParroquias($ubicacion);

        $evaluaciones = $this->obtenerEvaluaciones();

        $facade = new FdResulEvaluacionesControllerFachada();        
        
        $array_comp = array();        
        foreach($evaluaciones as $eval)
        {        
                 $var_v = FdParamEvaluacionesController::Calcularpuntaje($eval['id_pregunta'],$eval['puntuacion'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta,$eval['componente'],$eval['id_evaluacion']);                
                 $modelE = $facade->actionCreate($eval['id_evaluacion'],$var_v,$id_conj_rpta ); //aqui cayo
                 $array_componentes[$eval['id_evaluacion']]=array($eval['componente']=>$var_v.'|'.$eval['puntuacion']);                     
                 if(!in_array($eval['componente'], $array_comp))
                 {
                    $array_comp[]=$eval['componente'];                   
                 }                                                
        }
        
        $n_array2=array();
        $sum_pun=0;  
        $sum_niv =0;        
        $suma_total=0;
        $n_array=array();        
        $n_componente=array();
        $contar=0;
        for($i=0;$i<count($array_comp);$i++)
        {
            foreach($array_componentes as $key=>$val)
            {   
                    foreach($val as $k=>$v)
                    {      
                           $separa = explode("|",$v);
                            if($k==$array_comp[$i])
                            {
                                $contar++;
                                $sum_niv+=$separa[0];
                                $sum_pun+=$separa[1];                                
                                $n_array[$k]=array($contar=>$sum_niv);  
                                $n_array2[$k]=array($contar=>$sum_pun);  
                                $n_componente[$k] = $sum_niv;
                                $suma_total+=$v;                    
                            } 
                            else  
                            {
                                $sum_niv =0;
                                $sum_pun =0;
                                 $contar=0;
                            }
                        }                
                }           
        }    
        $eval_desemp = explode("|",FdParamEvaluacionesController::EvaluarDesempeño($suma_total));
        $nivel_desempenio = $eval_desemp[0];
        $semaforo = $this->Semaforizacion($eval_desemp[1]);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'datosriego' => $datosriego,
            'demarcacion'=>$demarcacion,
            'provincia'=>$provincia,
            'cantones'=>$cantones,
            'provincias_n'=>$provincias_n,
            'cantones_n'=>$cantones_n,
            'parroquias'=>$parroquias,
            'id_conj_rpta'=>$id_conj_rpta,
            'n_array'=>$n_array,
            'n_array2'=>$n_array2,
            'suma_total'=>$suma_total,
            'nivel_desempenio'=>$nivel_desempenio,
            'evaluaciones'=>$evaluaciones,
            'n_componente'=>$n_componente,
            'semaforo'=>$semaforo,
             'id_fmt' => $id_fmt,
            'id_conj_prta' => $id_conj_prta,
            'estado' => $estado,
        ]);
    }

    public function Semaforizacion ($id_color)
    {
        if($id_color==0)
            return "_rojo";
        else if($id_color==1)
            return "_naranja";
        else if($id_color==11)
            return "_amarillo";
        else if($id_color==111)
            return "_verde";
    }
    public function ObtenerDatosRiego($id_conj_rpta)
    {
        $datosriego = \common\models\poc\FdDatosGeneralesRiego::find()
                ->where(['=', 'fd_datos_generales_riego.id_conjunto_respuesta', $id_conj_rpta])->one();
        return $datosriego;
    }
     public function ObtenerUbicacion($id_conj_rpta)
    {
        $ubicacion = \common\models\poc\FdUbicacion::find()
                    ->where(['=', 'fd_ubicacion.id_conjunto_respuesta', $id_conj_rpta])->one();
        return $ubicacion;
    }
    public function ObtenerDemarcacion($ubicacion)
    {
        $demarcacion = \common\models\autenticacion\Demarcaciones::find()
                   ->where(['=','demarcaciones.id_demarcacion',$ubicacion->id_demarcacion])->one();
        return $demarcacion;
    }
    public function ObtenerProvincia($ubicacion)
    {  
        $provincias = \common\models\autenticacion\Provincias::find()
                ->where(['=','provincias.cod_provincia',$ubicacion->cod_provincia])->one();
        return $provincias;
    }
    public function ObtenerCantones($ubicacion)    
    {
        $cantones = \common\models\autenticacion\Cantones::find()
                ->where(['=','cantones.cod_canton',$ubicacion->cod_canton])
                ->andWhere(['=','cantones.cod_provincia',$ubicacion->cod_provincia])
                ->one();
        return $cantones;
    }
    public function ObtenerParroquias($ubicacion)    
    {
        $parroquias = \common\models\autenticacion\Parroquias::find()
                ->where(['=','parroquias.cod_canton',$ubicacion->cod_canton])
                ->andWhere(['=','parroquias.cod_provincia',$ubicacion->cod_provincia])
                ->andWhere(['=','parroquias.cod_parroquia',$ubicacion->cod_parroquia])
                ->one();
        return $parroquias;
    }
    
    /**
     * Presenta un dato unico en el modelo FdParamEvaluaciones.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  FdParamEvaluacionesControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo FdParamEvaluaciones .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  FdParamEvaluacionesControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_evaluacion]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo FdParamEvaluaciones.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  FdParamEvaluacionesControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_evaluacion]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FdParamEvaluaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  FdParamEvaluacionesControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }
    
    public function Buscarpregunta($id_pregunta,$tipo_valoracion,$adicionales,$id_conj_rpta)
    {
         $_respuesta = FdRespuesta::findOne(['id_pregunta'=>$id_pregunta,'id_conjunto_respuesta'=>$id_conj_rpta]);
         $tipo_pregunta = $_respuesta['id_tpregunta'];
         $val_opc= $_respuesta['id_opcion_select'];
         
         $respuesta="NO?";
         $resp_op="";
         
         if($tipo_valoracion==1)
         {
                 if($val_opc==1)
                {
                    $respuesta= "SI?";
                }
                else
                    $respuesta= "NO?";
         }
         elseif($tipo_valoracion==2)
         {
             if($tipo_pregunta==5)
             {
                 $val_res = $_respuesta['ra_entero'];
                 if($val_res>0) $respuesta="SI?".$val_res;
             }
             else if($tipo_pregunta==6)
            {
                   $val_res = $_respuesta['ra_decimal'];
                   if($val_res>0) $respuesta="SI?".round($val_res,2);
            }
         }
         elseif($tipo_valoracion==3)
         {
             $obras_capta = FdParamEvaluacionesController::Obtenerobrascaptacion($id_conj_rpta,$adicionales); 
             if($obras_capta>0)
               $respuesta= "SI?".$obras_capta;
         }
         elseif($tipo_valoracion==6 || $tipo_valoracion==4 || $tipo_valoracion==9 || $tipo_valoracion==10)
         {
                  if(!empty($val_opc)){
                   $resp_op = FdParamEvaluacionesController::Obteneropcionselect($val_opc);
                   $respuesta="SI?".$resp_op;
                 }
                 
                 return $respuesta;           
         }
         elseif($tipo_valoracion==7)
         {
             if(!empty($val_opc))
                 $respuesta="SI?";
         }
         elseif($tipo_valoracion==8)
         {
             $resp_mr = FdParamEvaluacionesController::ValidarMetodosRiego($adicionales,$id_conj_rpta);
             //print "esta ".$resp_mr;
             if(!empty($resp_mr))
               $respuesta = "SI?".$resp_mr;
         }
         elseif($tipo_valoracion==11)
         {
             $resp_cregla = FdParamEvaluacionesController::CalculoRegla($adicionales,$id_conj_rpta,1);
             $respuesta=$resp_cregla.'?';
         }
         elseif($tipo_valoracion==12)
         {
                $fuentes="";
                $tipo_preg="";
                if($tipo_pregunta==5)
                {
                    $val_res = $_respuesta['ra_entero'];
                    if($val_res>0)
                    {                        
                        //return "SI";
                        $separa_preg = explode(",",$adicionales);
                        if(!empty($separa_preg[1]))
                        {
                            $preg_adicio = $separa_preg[1];
                            $tipo_preg = FdParamEvaluacionesController::Obtentipopregunta($preg_adicio, $id_conj_rpta);
                        }
                        if($tipo_preg==17)
                        {
                            $fuentes = FdParamEvaluacionesController::Obtenerfuentes($id_conj_rpta);  
                            $cuenta_f =  \common\models\poc\FdFuentesHidricas::find()
                                ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                                ->count();    
                            if($val_res==$cuenta_f)
                              $respuesta= 'SI?'.$fuentes;
                        }
                        else if($tipo_preg==18)
                        {
                            $obras = FdParamEvaluacionesController::Obtenerubicacionobras($id_conj_rpta);                            
                            if($obras==$val_res)
                              $respuesta= 'SI?';
                        }
                        return $respuesta;

                    }
                    else
                    {
                        return $respuesta;
                    }   
                }
         }
         elseif($tipo_valoracion==13)
         {
             $separa_p = explode(",",$adicionales);
             foreach($separa_p as $preg)
             {
                 $_respuesta = FdRespuesta::findOne(['id_pregunta'=>$preg,'id_conjunto_respuesta'=>$id_conj_rpta]);
                 $res = $_respuesta['ra_check'];
                 if($res=='S'){
                     $respuesta="SI?";
                     break;
                 }
             }
         }
         elseif($tipo_valoracion==14)
         {
             $separa_p = explode(",",$adicionales);
            foreach($separa_p as $preg)
             {
                 $_respuesta = FdRespuesta::findOne(['id_pregunta'=>$preg,'id_conjunto_respuesta'=>$id_conj_rpta]);
                 $res = $_respuesta['id_opcion_select'];
                 if($res==1){
                     $respuesta="SI?";
                     break;
                 }
             }             
         }
         elseif($tipo_valoracion==15)
         {
             $separa_p = explode(",",$adicionales);
             $val1 = $separa_p[0];
             $val2 = $separa_p[1];
             $val3 = $separa_p[2];
             $val4 = $separa_p[3];
             
             $_respuesta2 = FdRespuesta::findOne(['id_pregunta'=>$val2,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res2 = $_respuesta2['ra_entero'];
             
             $_respuesta1 = FdRespuesta::findOne(['id_pregunta'=>$val1,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res1 = $_respuesta1['ra_entero'];
             
             $_respuesta4 = FdRespuesta::findOne(['id_pregunta'=>$val4,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res4 = $_respuesta4['ra_entero'];
             
             $_respuesta3 = FdRespuesta::findOne(['id_pregunta'=>$val3,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res3 = $_respuesta3['ra_entero'];
             
             
             if(!empty($res1)){
                if($res2>=$res1 )$respuesta="SI?";
                else if($res2>=$res1/2)$respuesta="SI?";
                else $respuesta="NO?";
             }
             else
             {
                 if($res1==0)$respuesta="NO?";
             }
                      
         }
         elseif($tipo_valoracion==16)
         {
             $separa_p = explode(",",$adicionales);
             $val1 = $separa_p[0];
             $val3 = $separa_p[1];
             $val4 = $separa_p[2];
                         
             $_respuesta1 = FdRespuesta::findOne(['id_pregunta'=>$val1,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res1 = $_respuesta1['id_opcion_select'];
             
             $_respuesta4 = FdRespuesta::findOne(['id_pregunta'=>$val4,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res4 = $_respuesta4['ra_entero'];
             
             $_respuesta3 = FdRespuesta::findOne(['id_pregunta'=>$val3,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res3 = $_respuesta3['ra_entero'];
             
            
            if($res1==1)
            {
                $respuesta="SI?";
            }
            
            /*if(!empty($res4)){
            if($res4>=$res3)$respuesta="SI?";
            else if($res4>=$res3/2)$respuesta="SI?";
            else $respuesta="NO?";
            }         */     
         }
         return $respuesta;         
    }
    
   
    public function Calcularpuntaje($id_pregunta,$puntuacion,$tipo_valoracion,$adicionales,$id_conj_rpta,$componente,$id)
    {              
        $_respuesta = FdRespuesta::findOne(['id_pregunta'=>$id_pregunta,'id_conjunto_respuesta'=>$id_conj_rpta]);
        $respuesta=0;
        $_array_componente=array(); 
        $tipo_pregunta = $_respuesta['id_tpregunta'];
        $val_opc= $_respuesta['id_opcion_select'];
        
        if($tipo_valoracion==1)
         {            
            if($val_opc==1)
            {
                $respuesta=$puntuacion;                
            }            
         }
         else if($tipo_valoracion==2)
         {
              if($tipo_pregunta==5)
             {
                 $val_res = $_respuesta['ra_entero'];
                 if($val_res>0){
                     $respuesta=$puntuacion;                     
                 }
             }
             else if($tipo_pregunta==6)
            {
                   $val_res = $_respuesta['ra_decimal'];
                   if($val_res>0){
                       $respuesta=$puntuacion;                       
                   }
            }
         }
         else if($tipo_valoracion==3)
         {
             $resp= FdParamEvaluacionesController::ValorarObrasCaptacion($id_conj_rpta,$adicionales,$puntuacion); 
             if($resp>0)$respuesta=$resp;             
             
         }
         else if($tipo_valoracion==6 || $tipo_valoracion==4  || $tipo_valoracion==9 || $tipo_valoracion==10)
         {
             
             if($tipo_pregunta==3)
             {
                 
                  if(!empty($val_opc)){
                   $val_calc = FdParamEvaluacionesController::Obtenervalorponderacion($val_opc,$puntuacion);
                   $respuesta=$val_calc;                   
                 }                                 
              }              
         }
         else if($tipo_valoracion==7)
         {
             if(!empty($val_opc))
               $respuesta = $puntuacion;
         }
         else if($tipo_valoracion==8)
         {
             $resp_mr = FdParamEvaluacionesController::ValidarValorMetodosRiego($adicionales,$id_conj_rpta,$puntuacion);
             if(count($resp_mr)>0){
               $respuesta=$resp_mr;               
             }
         }
         elseif($tipo_valoracion==11)
         {
             $resp_cregla = FdParamEvaluacionesController::CalculoRegla($adicionales,$id_conj_rpta,2,$puntuacion);
             $respuesta=$resp_cregla;             
         }
         
         elseif($tipo_valoracion==12)
         {
                $fuentes="";
                $tipo_preg="";
                if($tipo_pregunta==5)
                {
                    $val_res = $_respuesta['ra_entero'];
                    if($val_res>0)
                    {                        
                        $separa_preg = explode(",",$adicionales);
                        if(!empty($separa_preg[1]))
                        {
                            $preg_adicio = $separa_preg[1];
                            $tipo_preg = FdParamEvaluacionesController::Obtentipopregunta($preg_adicio, $id_conj_rpta);
                        }
                        if($tipo_preg==17)
                        {                            
                            $fuentes = \common\models\poc\FdFuentesHidricas::find()
                                ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                                ->count();   
                            if($fuentes==$val_res)
                              $respuesta= $puntuacion;
                        }
                        else if($tipo_preg==18)
                        {
                            $obras = FdParamEvaluacionesController::Obtenerubicacionobras($id_conj_rpta);                            
                            if($obras==$val_res)
                              $respuesta= $puntuacion;
                        }  
                        /*else if($tipo_preg==19)
                        {
                            $obras = FdParamEvaluacionesController::Obtenerobrascaptacion($id_conj_rpta);                            
                            if($obras==$val_res)
                              $respuesta= $puntuacion;
                        } */

                    }                      
                }
         }
         elseif($tipo_valoracion==13)
         {
             $separa_p = explode(",",$adicionales);
             foreach($separa_p as $preg)
             {
                 $_respuesta = FdRespuesta::findOne(['id_pregunta'=>$preg,'id_conjunto_respuesta'=>$id_conj_rpta]);
                 $res = $_respuesta['ra_check'];
                 if($res=='S'){
                     $respuesta=$puntuacion;                     
                     break;
                 }
             }
         }
         elseif($tipo_valoracion==14)
         {
             $separa_p = explode(",",$adicionales);
            foreach($separa_p as $preg)
             {
                 $_respuesta = FdRespuesta::findOne(['id_pregunta'=>$preg,'id_conjunto_respuesta'=>$id_conj_rpta]);
                 $res = $_respuesta['id_opcion_select'];
                 if($res==1){
                     $respuesta=$puntuacion;                     
                     break;
                 }
             }
             
         }
         elseif($tipo_valoracion==15)
         {
             $suma_res=0;
             $separa_p = explode(",",$adicionales);
             $val1 = $separa_p[0];
             $val2 = $separa_p[1];
             $val3 = $separa_p[2];
             $val4 = $separa_p[3];
             

             
             $_respuesta1 = FdRespuesta::findOne(['id_pregunta'=>$val1,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res1 = $_respuesta1['ra_entero'];
             
           
             
             $_respuesta2 = FdRespuesta::findOne(['id_pregunta'=>$val2,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res2 = $_respuesta2['ra_entero'];
             
             $_respuesta4 = FdRespuesta::findOne(['id_pregunta'=>$val4,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res4 = $_respuesta4['ra_entero'];
             
             $_respuesta3 = FdRespuesta::findOne(['id_pregunta'=>$val3,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res3 = $_respuesta3['ra_entero'];
             
             
            if(!empty($res1)){
                if($res2>=$res1)$suma_res+=$puntuacion/2;
                else if($res2>=$res1/2)$suma_res+=($puntuacion/4);
                else $suma_res+=0;

                if(!empty($res3)&&(!empty($res4)))$suma_res+=$puntuacion/2;
                /*else
                {
                    if($res4>=$res3)$suma_res+=$puntuacion/2;
                    else if($res4>=$res3/2)$suma_res+=($puntuacion/2);
                    else $suma_res+=0;
                }*/
            }
            else
             {
                 $suma_res=0;
             }
            $respuesta= $suma_res;             
         }
         elseif($tipo_valoracion==16)
         {
             $separa_p = explode(",",$adicionales);
             $val1 = $separa_p[0];
             $val3 = $separa_p[1];
             $val4 = $separa_p[2];
             $suma_res =0;
                         
             $_respuesta1 = FdRespuesta::findOne(['id_pregunta'=>$val1,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res1 = $_respuesta1['id_opcion_select'];
             
             $_respuesta4 = FdRespuesta::findOne(['id_pregunta'=>$val4,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res4 = $_respuesta4['ra_entero'];
             
             $_respuesta3 = FdRespuesta::findOne(['id_pregunta'=>$val3,'id_conjunto_respuesta'=>$id_conj_rpta]);
             $res3 = $_respuesta3['ra_entero'];
             
            
            if($res1==1)$suma_res+=$puntuacion/2;
            
            if(!empty($res4)){
                if($res4>=$res3)$suma_res+=$puntuacion/2;
                else if($res4>=$res3/2)$suma_res+=$puntuacion/4;
                else $suma_res+=0;
            }      
            $respuesta= $suma_res;           
         }         
         return $respuesta;
    }
    
    public function rules()
    {
        return $this->v_rules;
    }
    public function Obtentipopregunta($id_pregunta,$id_conj_rpta)
    {
        $_respuesta = FdRespuesta::findOne(['id_pregunta'=>$id_pregunta,'id_conjunto_respuesta'=>$id_conj_rpta]);
        return $_respuesta['id_tpregunta'];
    }
    public function Obtenerfuentes($id_conj_rpta)
    {
        $fuentes = \common\models\poc\FdFuentesHidricas::find()
                                ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                                ->all();        
        $retorno="";
        $i=1;
        foreach($fuentes as $val)
        {
            $retorno.= $i.'. '.$val['nom_fuente'].'<br>';
            $i++;
        }
        return $retorno;
    }
    public function Obtenerubicacionobras($id_conj_rpta)
    {
        $obras = \common\models\poc\FdUbicacionGeografica::find()
                                ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                                ->count();        
        return $obras;
    }
    
    public function Obtenerobrascaptacion($id_conj_rpta,$campo)
    {
        $obras = \common\models\poc\FdObrasCaptacionRiego::find()
                                ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                                ->all();    
        $alma_clave="";
        $i=1;
        foreach ($obras as $clave=>$valor)
        {
            $alma_clave.=$i.". ".FdParamEvaluacionesController::Obteneropcionselect($valor[$campo]).'<br>';
            $i++;
        }
        return $alma_clave;
    }
    public function ValorarObrasCaptacion($id_conj_rpta,$campo,$puntuacion)
    {
        $obras = \common\models\poc\FdObrasCaptacionRiego::find()
                                ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                                ->all();   
        $total_obras = count($obras);        
        $promedio = 0;
        $suma = 0;
        foreach ($obras as $clave=>$valor)
        {
           $suma+=FdParamEvaluacionesController::Obtenervalorponderacion($valor[$campo],$puntuacion);          
        }
        if($total_obras>0)$promedio= $suma/$total_obras;        
        return $promedio;
    }
    
    public function Obteneropcionselect($id_select)
    {
       $opcion_select = \common\models\poc\FdOpcionSelect::find()
                ->where(['id_opcion_select'=>$id_select])
                ->one();
       return $opcion_select->nom_opcion_select;
    }
    public function Obtenervalorponderacion($id_select,$puntuacion)
    {         
        $valor_opcion = \common\models\poc\FdPonderacionRespuesta::find()
                ->where(['id_opcion_select'=>$id_select])
                ->one();
        $pcvalor= $valor_opcion->porcentaje_valor;        
        $calculo= ($pcvalor*$puntuacion)/100;         
        return $calculo;        
    }
    public function ValidarMetodosRiego($adicionales,$id_conj_rpta)
    {
        $separa_adicio = explode(",",$adicionales);
        $retorno="";
        $i=1;
        foreach($separa_adicio as $val)
        {             
             $resp = FdRespuesta::findOne(['id_pregunta'=>$val,'id_conjunto_respuesta'=>$id_conj_rpta]);        
             $valor =$resp['ra_entero'];
             if($valor>0)
             {
                 $retorno.=$i.". ".FdParamEvaluacionesController::BuscarNombrePregunta($val)." ".$valor.'<br>';
                 $i++;
             }             
        }
        return $retorno;
    }
    public function BuscarNombrePregunta($id_pregunta)
    {
         $resp = \common\models\poc\FdPregunta::findOne(['id_pregunta'=>$id_pregunta]);  
         return $resp['nom_pregunta'];
    }
    
    public function ValidarValorMetodosRiego($adicionales,$id_conj_rpta,$puntuacion)
    {
        $separa_adicio = explode(",",$adicionales);
        $suma=0;
        $promedio =0;
        $contar=0;
        foreach($separa_adicio as $val)
        {
             $val_porc = \common\models\poc\FdPonderacionRespuesta::findOne(['ref_pregunta'=>$val]);  
             $valos = $val_porc['porcentaje_valor'];
             $resp = FdRespuesta::findOne(['id_pregunta'=>$val,'id_conjunto_respuesta'=>$id_conj_rpta]);        
             $valor =$resp['ra_entero'];
             if($valor>0)
             {
                $suma+= ($valos*$puntuacion)/100;
                $contar++;
             }
        }
        if($contar>0)
          $promedio=$suma/$contar;
        return $promedio;
    }
    public function CalculoRegla($adicionales,$id_conj_rpta,$id_proceso,$puntuacion="")
    {
        $responde="";
        $separa_val = explode(",",$adicionales);
        $resp1 = FdRespuesta::findOne(['id_pregunta'=>$separa_val[0],'id_conjunto_respuesta'=>$id_conj_rpta]);
        $r1= $resp1['ra_entero'];
        $resp2 = FdRespuesta::findOne(['id_pregunta'=>$separa_val[1],'id_conjunto_respuesta'=>$id_conj_rpta]);
        $r2= $resp2['ra_entero'];
        
        /*
        4.4.2 es = 0 > a la 4.4.1 = 100% de la PUNTUACIÓN
        4.4.2 > 0 = a la mitad de la 4.4.1 = 50% de la PUNTUACIÓN
        4.4.2 < a la mitad de la 4.4.1 = 0% de la PUNTUACIÓN
         */
        if($id_proceso==1)
        {
            if($r2>=$r1)$responde="SI";
            else if($r2>=$r1/2)$responde="SI";
            else $responde="NO";
        }
        else
        {
            if($r2>=$r1)$responde=$puntuacion;
            else if($r2>=$r1/2)$responde=$puntuacion/2;
            else $responde=0;
        }
        return $responde;        
    }
    public function EvaluarDesempeño($total)
    {
        $n_des = \common\models\poc\FdNivelDesempenio::find()
               ->orderBy(["id_nivel" => SORT_ASC])->all();        
       $ret = "";
       foreach($n_des as $val)
       {
           $inter_ini = $val['intervalo_inicio'];
           $inter_fin = $val['intervalo_fin'];           
           if(empty($inter_fin))
           {
               if((float)$total>=(float)$inter_ini){
                   $ret= $val['descripcion']."|".$val['semaforizacion'];
               }
           }
           elseif(empty($inter_ini))
           {               
               if((float)$total<=(float)$inter_fin){
                   $ret= $val['descripcion']."|".$val['semaforizacion'];
               }
           }
           else
           {
               if((float)$total>=(float)$inter_ini && (float)$total <=(float)$inter_fin){
                  
                    $ret= $val['descripcion']."|".$val['semaforizacion'];
               }
           }                                             
       }
       return $ret;
    }
    
  public function actionGenexcelresul($id_conj_rpta){                
        /*Generando contenido HTML*/       
        $_stringprint = utf8_decode($this->actionGenhtmlresul($id_conj_rpta));       
        $array_graf_radial = $this->ObtenArrayGraficaRadial($id_conj_rpta);
        $array_graf_barras = $this->ObtenerGraficaBarras($id_conj_rpta);
        $nombre_formato="REPORTE EVALUACION PSRD";      
        $GeneraExcel = new genExcel();        
        $GeneraExcel->generadorExcelHTML2($_stringprint,$nombre_formato,'css/formato.css','',1,$array_graf_radial,$array_graf_barras);
    }
    public function ObtenerGraficaBarras($id_conj_rpta)
    {
        $indicadores = \common\models\poc\FdParamIndicadores::find()
                ->orderBy(["id_indicador" => SORT_ASC])->all();
        $n_componente=array();
        foreach($indicadores as $eval)
        {            
            $valor_a = FdParamIndicadoresController::Buscarvalorpregunta($eval['variable_a'],$id_conj_rpta);
            $valor_b = FdParamIndicadoresController::Buscarvalorpregunta($eval['variable_b'],$id_conj_rpta);
            $resul =   FdParamIndicadoresController::Calcularesultado($valor_a,$valor_b,$eval['formula']);
            $eval['indicador']=str_replace("Porcentaje","%",$eval['indicador']);
            if($eval['item']!=14){                
                $color=FdParamIndicadoresController::Semaforizacion($resul);
                $n_componente[$eval['indicador']]=array('valor'=>$resul,'color'=>$color);
            }            
        }
        return $n_componente;
    }
    public function ObtenArrayGraficaRadial($id_conj_rpta)
    {
        $evaluaciones = $this->obtenerEvaluaciones();        
        $array_comp = array();
        foreach($evaluaciones as $eval)
        {            
                 $var_v = FdParamEvaluacionesController::Calcularpuntaje($eval['id_pregunta'],$eval['puntuacion'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta,$eval['componente'],$eval['id_evaluacion']);                                 
                 $array_componentes[$eval['id_evaluacion']]=array($eval['componente']=>$var_v.'|'.$eval['puntuacion']);                     
                 if(!in_array($eval['componente'], $array_comp))
                 {
                    $array_comp[]=$eval['componente'];
                 }
        }       
        $sum_niv =0;
        $sum_pun=0;
        $n_array=array();
        $n_array2=array();
        $n_componente=array();
        $contar=0;
        for($i=0;$i<count($array_comp);$i++)
        {
            foreach($array_componentes as $key=>$val)
            {   
                    foreach($val as $k=>$v)
                    {              
                        $separa = explode("|",$v);
                            if($k==$array_comp[$i])
                            {
                                $contar++;
                                $sum_niv+=$separa[0];
                                $sum_pun+=$separa[1];   
                                $n_array[$k]=$sum_niv;  
                                $n_array2[$k]=$sum_pun;  
                                $n_componente[$k] = round(($n_array[$k]/$n_array2[$k]),2);                               
                            } 
                            else  
                            {
                                 $sum_niv =0;
                                 $contar=0;
                                 $sum_pun =0;
                            }
                        }                
                }           
        }  
        return $n_componente;
    }
    public function actionGenhtmlresul($id_conj_rpta)
    {
        $datosriego = $this->ObtenerDatosRiego($id_conj_rpta);
        $ubicacion=$this->ObtenerUbicacion($id_conj_rpta);
        $demarcacion=$this->ObtenerDemarcacion($ubicacion);
        $provincias=$this->ObtenerProvincia($ubicacion);
        $cantones=$this->ObtenerCantones($ubicacion);
        $parroquias=$this->ObtenerParroquias($ubicacion);        
        $evaluaciones = $this->obtenerEvaluaciones();        
        $array_comp = array();
        foreach($evaluaciones as $eval)
        {            
                 $var_v = FdParamEvaluacionesController::Calcularpuntaje($eval['id_pregunta'],$eval['puntuacion'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta,$eval['componente'],$eval['id_evaluacion']);                                 
                 $array_componentes[$eval['id_evaluacion']]=array($eval['componente']=>$var_v.'|'.$eval['puntuacion']);                     
                 if(!in_array($eval['componente'], $array_comp))
                 {
                    $array_comp[]=$eval['componente'];
                 }
        }                  
        $n_array2=array();
        $sum_pun=0;
        $sum_niv =0;
        $suma_total=0;
        $n_array=array();
        $n_componente=array();
        $contar=0;
        for($i=0;$i<count($array_comp);$i++)
        {
            foreach($array_componentes as $key=>$val)
            {   
                    foreach($val as $k=>$v)
                    {           
                           $separa = explode("|",$v);
                            if($k==$array_comp[$i])
                            {
                                $contar++;
                                $sum_niv+=$separa[0];
                                $sum_pun+=$separa[1];   
                                $n_array[$k]=array($contar=>$sum_niv);                                  
                                $n_array2[$k]=array($contar=>$sum_pun);  
                                $n_componente[$k] = $sum_niv;
                                $suma_total+=$v;
                            } 
                            else  
                            {
                                $sum_niv =0;
                                $sum_pun =0;
                                $contar=0;
                            }
                        }                
                }           
        }                       
        $eval_desemp = explode("|",FdParamEvaluacionesController::EvaluarDesempeño($suma_total));
        $nivel_desempenio = $eval_desemp[0];
        $semaforo = $this->Semaforizacion($eval_desemp[1]);
        
        /*Construcción evaluación*/
        $html="";
        $html.="<table>";
        $html.="<tr>";
        $html.="<td class='capituloeval' colspan='9'>REPORTE DEL DIAGNÓSTICO DE LA PRESTACIÓN DEL SERVICIO PÚBLICO DE RIEGO</td>";
        $html.="</tr>";
        $html.="<tr><td class='seccioneval1' colspan='9'>IDENTIFICACIÓN Y UBICACIÓN DEL PRESTADOR DEL SERVICIO</td></tr>";
        $html.="<tr><td class='celdageneral' colspan='9'>Nombre del Prestador del Servicio: ".$datosriego->nombres_prestador_servicio."</td></tr>";
        $html.="<tr><td class='celdageneral' colspan='9'>Dirección de las oficinas: ".$datosriego->direccion_oficinas."</td></tr>";
        $html.="<tr><td class='celdageneral' colspan='9'>Nombre del Representante legal: ".$datosriego->nombres_apellidos_replegal."</td></tr>";
        $html.="<tr><td class='celdageneral' colspan='3'>Teléfono:</td><td  class='celdageneral' colspan='2'>Convencional: ".$datosriego->num_convencional."</td><td class='celdageneral' colspan='4'>Celular: ".$datosriego->num_celular."</td></tr>";
        $html.="<tr><td class='celdageneral' colspan='9'>Correo electrónico: ".$datosriego->correo_electronico."</td></tr>";
        $html.="<tr><td class='celdageneral' colspan='3'>Demarcación Hidrográfica: ".$demarcacion->nombre_demarcacion."</td><td class='celdageneral' colspan='6'>Provincia: ".$provincias->nombre_provincia ."</td></tr>";
        $html.="<tr><td class='celdageneral' colspan='3'>Cantón: ".$cantones->nombre_canton."</td><td class='celdageneral' colspan='6'>Parroquia: ".$parroquias->nombre_parroquia."</td></tr>";
        //$html.="</table><table>";
        $html.="<tr><td class='seccioneval' colspan='9'>I. RESULTADO DEL CUMPLIMIENTO A LA RESOLUCIÓN  Nro. ARCA-DE-006-2018 <br/>  NORMA TÉCNICA SOBRE LOS CRITERIOS MÍNIMOS DE CALIDAD DE LA PRESTACIÓN DEL SERVICIO PÚBLICO DE RIEGO</td></tr>";         
        $html.="<tr><td colspan='2'>COMPONENTE</td><td colspan='2'>CONDICIONANTE</td><td  colspan='2'>CUMPLIMIENTO DEL CONDICIONANTE</td><td>RESULTADO</td><td>PUNTAJE</td><td>% CUMPLIMIENTO</td></tr>";
        
        $cont =1;
        $sumar_porcen=0;
        foreach($evaluaciones as $eval)
        {            
             $valo = $n_array[$eval['componente']];
             $clave = key($valo);
             $valor = current($valo);
             $valo2 = $n_array2[$eval['componente']];
             $valor2 = current($valo2);
             $html.="<tr>";
                if($cont==1)
                   $html.="<td  rowspan='$clave' class='celdaevalcenter'>".$eval['componente']."</td>";            
                $html.= "<td class='celdageneral'>".$eval['criterio']."</td>";
                $html.= "<td class='celdaevalcenter' >".$eval['item']."</td>";
                $html.= "<td>".$eval['condicionante']."</td>";
                $var_pregu = FdParamEvaluacionesController::Buscarpregunta($eval['id_pregunta'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta);
                $separa = explode('?',$var_pregu);
                $html.= "<td class='celdaevalcenter'>".$separa[0]."</td>";
                $html.= "<td class='celdageneral'>".$separa[1]."</td>";
                $var_v = FdParamEvaluacionesController::Calcularpuntaje($eval['id_pregunta'],$eval['puntuacion'],$eval['tipo_valoracion'],$eval['detalle'],$id_conj_rpta,$eval['componente'],$eval['id_evaluacion']);                               
                if($cont==1){
                  $html.= "<td class='celdaevalcenter' rowspan='$clave'>".round($valor,2)."</td>";       
                  $html.= "<td class='celdaevalcenter' align='center' rowspan=$clave>".round($valor2,2)."</td>";           
                  $html.= "<td class='celdaevalcenter' align='center' rowspan=$clave>".round(($valor/$valor2)*100,2)."%</td>";          
                  $n_componente2[$eval['componente']]=round(($valor/$valor2)*100,2);
                }
                if($cont==$clave)
                {
                    $cont=1;
                    $sumar_porcen=0;
                }
                else
                  $cont++;
            $html.="</tr>";
        }
        
        $html.= "<tr>";
        $html.="<td  colspan ='6' >PUNTAJE TOTAL</td>";
        $html.= "<td class='inputpreguntaevaluacionres$semaforo'>".round($suma_total,2)."</td>";
        $html.= "</tr>";
        $html.= "<tr>";
        $html.="<td  colspan ='6' >NIVEL DE DESEMPEÑO</td>";
        $html.= "<td class='inputpreguntaevaluacionres$semaforo'>".strtoupper($nivel_desempenio)."</td>";
        $html.= "</tr>";
        $html.="</table>";
        
        $categorias= array_keys($n_componente);
        $valores=array_values($n_componente);        
        
        /*Construcción indicadores*/
        
        $html.="<table>";
        $html.="<tr>";
        $html.="<td class='seccioneval' colspan='9'>II. RESULTADO DE INDICADORES</td>";
        $html.="</tr>";
        $html.="<tr><td colspan='2'>TIPO DE INDICADOR</td><td>N°</td><td  colspan='5'>INDICADOR</td><td>RESULTADO</td></tr>";
                
        $indicadores = \common\models\poc\FdParamIndicadores::find()
                ->orderBy(["id_indicador" => SORT_ASC])->all();
        
            $n_componente=array();
            $inicio ="";
            $cont =1;
            $bande = true;
            $cuenta=0;
        foreach($indicadores as $eval)
        {            
            $html.= "<tr>";     
                
                $html.= "<td class='celdaevalcenter' colspan='2'>".$eval['tipo_indicador']."</td>";
                $html.= "<td class='celdaevalcenter' >".$eval['item']."</td>";
                $html.= "<td class='celdaevalcenter' colspan='5'>".$eval['indicador']."</td>";                
                $valor_a = FdParamIndicadoresController::Buscarvalorpregunta($eval['variable_a'],$id_conj_rpta);
                
                $valor_b = FdParamIndicadoresController::Buscarvalorpregunta($eval['variable_b'],$id_conj_rpta);
                
                $resul = FdParamIndicadoresController::Calcularesultado($valor_a,$valor_b,$eval['formula']);
                $html.= "<td class='celdaevalcenter' style='text-align:center'>".round($resul,2)."</td>";                                  
                                
            $html.= "</tr>";
            
            $eval['indicador']=str_replace("Porcentaje","%",$eval['indicador']);
            if($eval['item']!=14){
                $n_componente[$eval['indicador']]=$resul;
            }
            $cuenta++;
        }
        $html.="</table>";
        
         $html.="<table>";
         $html.="<tr></tr><tr>";
         $html.="<td class='seccioneval' colspan='9'>III. GRÁFICOS </td>";
         $html.="</tr>";
         $html.= "<tr><td class='celdaevalcenter' colspan='9'>3.1. GRÁFICO DE LOS COMPONENTES ANALIZADOS</td></tr>";
         for($i=0;$i<22;$i++)
           $html.= "<tr><td class='celdaevalcenter' colspan='9'></td></tr>";
         $html.= "<tr><td class='celdaevalcenter' colspan='9'>3.2. GRÁFICO DE LOS RESULTADOS DE INDICADORES</td></tr>";
         for($i=0;$i<27 ;$i++)
           $html.= "<tr><td class='celdaevalcenter' colspan='9'></td></tr>";
         $html.= "<tr><td class='seccioneval' colspan='9'>VI. RECOMENDACIONES</td></tr>";
         
        
         $res_indicadores = \common\models\poc\FdResulIndicadores::find()
                                ->where(['id_conjunto_respuesta'=>$id_conj_rpta])                                
                                ->orderBy(["id_resul_indicadores" => SORT_ASC])->all();
                 
         $cuenta=1;
         $datosriego = $this->ObtenerDatosRiego($id_conj_rpta);
         $texto="Sobre la base del análisis de la información levantada con  las herramientas (Artículo 20 de la Regulación Nro. 
             DIR-ARCA-RG-009-2018), para la determinación del estado situacional de la prestación del servicio público de 
             riego y proporcionada por la ".$datosriego['nombres_prestador_servicio']." , se recomienda 
             considerar las siguientes acciones:";

         $html.= "<tr><td class='celdaevalcenter' colspan='9'></td></tr>";
         $html.= "<tr><td class='celdageneral' colspan='9'>".$texto."</td></tr>";         
         $html.= "<tr><td class='celdageneral' colspan='9'></td></tr>";        
         foreach($res_indicadores as $eval)
        { 
             if(!empty($eval['recomendacion']))
             {
                $html.= "<tr>";   
                $html.= "<td class='celdageneral' colspan='1'>".$cuenta.". </td>";                                                                                 
                $html.= "<td class='celdageneral' colspan='8'>".$eval['recomendacion']."</td>";                                                                                 
                $html.= "</tr>";
                $cuenta++;
             }
         }
         $fecha = date('Y-m-d');
         $usuario = Yii::$app->user->id;
         $obt_usu = \common\models\autenticacion\UsuariosAp::findOne(['id_usuario'=>$usuario]);
         $dif = 17-$cuenta;
         for($i=0;$i<$dif;$i++)
           $html.= "<tr><td></td><td class='celdaevalcenter' colspan='6'></td></tr>";
        $html.= "<tr><td class='celdageneral' colspan='5'>Técnico que realiza el diagnóstico:  ".$obt_usu['nombres']."</td>";    
        $html.= "<td class='celdageneral' colspan='4'   >Fecha de evaluación:  $fecha</td></tr>";  
        for($i=0;$i<3;$i++)
           $html.= "<tr><td class='celdaevalcenter' colspan='9'></td></tr>";
        
        $html.= "<tr><td></td><td class='celdageneral' colspan='2'>Aprobado por:  </td><td colspan='2'>Mgs. Segundo Churuchumbi</td></tr>";
        $html.= "<tr><td class='celdageneral' colspan='3'></td><td class='celdaevalcenter' colspan='4'>DIRECTOR DE REGULACIÓN Y CONTROL DE RIEGO Y DRENAJE</td></tr>";
        for($i=0;$i<3;$i++)
           $html.= "<tr><td class='celdaevalcenter' colspan='9'></td></tr>";
        $html.= "<tr><td></td><td class='celdageneral' colspan='2'>Validado por:  </td><td colspan='2'>Lcda. Jessica Palacios</td></tr>";
        $html.= "<tr><td class='celdageneral' colspan='3'></td><td class='celdaevalcenter' colspan='3'>COORDINADORA GENERAL TÉCNICA</td></tr>";
        $html.="</table>";
        return $html;
    }
    
    
}
