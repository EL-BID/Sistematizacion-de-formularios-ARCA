<?php

namespace frontend\controllers\poc;

use Yii;
use frontend\controllers\poc\FdParamIndicadoresControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use common\models\poc\FdRespuesta;

/**
 * FdParamIndicadoresController implementa las acciones a través del sistema CRUD para el modelo FdParamIndicadores.
 */
class FdParamIndicadoresController extends ControllerPry
{
  //private $facade =    FdParamIndicadoresControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  FdParamIndicadoresControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  FdParamIndicadoresControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo FdParamIndicadores que se encuentran en el tablename.
     * @return mixed
     */
    
         
    public function actionIndex($id_conj_rpta,$id_conj_prta, $id_fmt, $last,$estado,$provincia,$cantones)
    {
        $facade =  new  FdParamIndicadoresControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        $dataAndModel['dataProvider']->pagination->pageSize=40;   
        
        $datosriego = \common\models\poc\FdDatosGeneralesRiego::find()
                ->where(['=', 'fd_datos_generales_riego.id_conjunto_respuesta', $id_conj_rpta])->one();
             
        $ubicacion = \common\models\poc\FdUbicacion::find()
                ->where(['=', 'fd_ubicacion.id_conjunto_respuesta', $id_conj_rpta])->one();
        
        $demarcacion = \common\models\autenticacion\Demarcaciones::find()
                ->where(['=','demarcaciones.id_demarcacion',$ubicacion->id_demarcacion])->one();
        
        $provincias_n = \common\models\autenticacion\Provincias::find()
                ->where(['=','provincias.cod_provincia',$ubicacion->cod_provincia])->one();
        
        $cantones_n = \common\models\autenticacion\Cantones::find()
                ->where(['=','cantones.cod_canton',$ubicacion->cod_canton])
                ->andWhere(['=','cantones.cod_provincia',$ubicacion->cod_provincia])
                ->one();
        
        $parroquias = \common\models\autenticacion\Parroquias::find()
                ->where(['=','parroquias.cod_canton',$ubicacion->cod_canton])
                ->andWhere(['=','parroquias.cod_provincia',$ubicacion->cod_provincia])
                ->andWhere(['=','parroquias.cod_parroquia',$ubicacion->cod_parroquia])
                ->one();

        $indicadores = \common\models\poc\FdParamIndicadores::find()
				->where(["periodo"=>date('Y')-1])
                ->orderBy(["id_indicador" => SORT_ASC])->all();
        
        $resp_indica= Yii::$app->request->post();
   
        if(!empty($resp_indica)){
        $contador=0;
        $cuenta=0;
        $tempo_array =array();
        $nuevo_arr=array();
        $facade = new FdResulIndicadoresControllerFachada();
        foreach ($resp_indica['FdResulIndicadores'] as $clave=>$valor){         
            $sep_c = explode("/",$clave);
            $n_arr = array($sep_c[0]=>$valor);              
            $tempo_array[$contador]=$n_arr;
            if($contador==2){
              $nuevo_arr['FdResulIndicadores'][$cuenta]=$tempo_array;
              $contador=0;
              $cuenta++;
            }
            else                
             $contador++;       
        }
        foreach($nuevo_arr as $val)
        {
            $array_o=array();
            foreach($val as $k=>$v){
            $array_o['FdResulIndicadores']=array(
                'id_indicador'=>$v[0]['id_indicador'],
                'resultado'=>$v[1]['id_resultado'],
                'recomendacion'=>$v[2]['recomendacion']
            );
            $modelE = $facade->actionCreate($v[0]['id_indicador'],$array_o, Yii::$app->request->isAjax, $id_conj_rpta); //aqui cayo 
            }
                 
        }

        }

      
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
            'indicadores'=>$indicadores,
            'id_fmt' => $id_fmt,
            'id_conj_prta' => $id_conj_prta,
            'estado' => $estado,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo FdParamIndicadores.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  FdParamIndicadoresControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo FdParamIndicadores .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id_conj_rpta)
    {
       /*$facade =  new  FdParamIndicadoresControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_indicador]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
        //print_r(Yii::$app->request->post());
        $facade = new FdResulIndicadoresControllerFachada;
        $modelE = $facade->actionCreate(Yii::$app->request->post(), $isAjax, $id_conj_rpta);
    }

    /**
     * Modifica un dato existente en el modelo FdParamIndicadores.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  FdParamIndicadoresControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_indicador]);
            
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
     * Deletes an existing FdParamIndicadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  FdParamIndicadoresControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }
    public function Buscarvalorpregunta($id_pregunta,$id_conj_rpta)
    {
        $respuesta=0;
        $valo=0;
        if (strpos($id_pregunta, '+') !== false) 
        {
            $sep_pre= explode("+",$id_pregunta);
            foreach($sep_pre as $val)
            {
                $valo+= FdParamIndicadoresController::Obtenrespuestaportipo($val,$id_conj_rpta);
            }
            $respuesta=$valo;
        }
        else
        {
            $respuesta = FdParamIndicadoresController::Obtenrespuestaportipo($id_pregunta,$id_conj_rpta);
            
        }
        if(empty($respuesta))$respuesta=0;
        return $respuesta;
    }
    public function Obtenrespuestaportipo($id_pregunta,$id_conj_rpta)
    {
        $respuesta=0;
            $resp = FdRespuesta::findOne(['id_pregunta'=>$id_pregunta,'id_conjunto_respuesta'=>$id_conj_rpta]);  
            $tipo_pregu =$resp['id_tpregunta'];
            if($tipo_pregu==5)$respuesta=$resp['ra_entero'];
            else if($tipo_pregu==6)$respuesta=round($resp['ra_decimal'],2);
            else if($tipo_pregu==8)$respuesta=$resp['ra_moneda'];  
            
        return $respuesta;
    }
    public function Calcularesultado($valor_a,$valor_b,$formula)
    {
        //(((A*B)/100)/B)*100
        $resul="";
        $resultado="";
        $sep_for = explode(")",$formula);
        $ini = $sep_for[0];
        $fin = $sep_for[1];
        if(count($sep_for)>2)
        {
            if($valor_b==0)return 0;            
            $resul = $valor_a*$valor_b;
            $resul2=$resul/100;
            $resul3=$resul2/$valor_b;
            $resultado = $resul3*100;
        }
        else {
               if (strpos($ini, '/') !== false) 
               {
                   if($valor_b>0)
                     $resul=$valor_a/$valor_b;
               }
               else if (strpos($ini, '-') !== false) 
               {
                    $resul=$valor_a-$valor_b;
               }

               if (strpos($fin, '*') !== false) 
               {
                   $resultado=$resul*100;
               }
               else
               {
                   $resultado=$resul;
               }
        }
        return round($resultado,2);
    }
    
    public function Semaforizacion ($total)
    {
        $color="";

           if((float)$total>=90.6){
                   $color="#4AB767";
           }
          else if((float)$total<=50.5){
                   $color="#F91B03";
          }
         else if((float)$total>=50.6 && (float)$total <=70.5){
                  
                   $color="#FFB300";
         }
         else
             $color = "#FCFC0E";                                                       
       return $color;
    }
    
}
