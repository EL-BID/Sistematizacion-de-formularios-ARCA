<?php

namespace frontend\controllers\poc;

use Yii;
use frontend\controllers\poc\FdRespuestaxmesControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use common\models\poc\FdPregunta;
use common\models\poc\FdAdmEstadoSearch;
use common\models\poc\FdRespuesta;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdRespuestaXMesController implementa las acciones a través del sistema CRUD para el modelo FdRespuestaXMes.
 */
class FdRespuestaxmesController extends ControllerPry
{
  //private $facade =    FdRespuestaXMesControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade = new FdRespuestaxmesControllerFachada();
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

     public function actionProgress($urlroute,$id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$btnadd,$botton,$tipo_select=null,$focus){
            $facade =  new  FdRespuestaxmesControllerFachada;
            echo $facade->actionProgress($urlroute,$id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$btnadd,$botton,$tipo_select,$focus);
    }

	
	
    /**
     * Listado todos los datos del modelo FdRespuestaXMes que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  FdRespuestaXMesControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }
    
    
    public function actionIndexdetcapitulo($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$numerar,$nom_prta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$tipo_select,$focus)
    {
          
        //0)Verificando permisos del usuario========================================================
        if(empty(Yii::$app->user->identity->usuario)){
            return $this->redirect(['site/index']);
        }else{
            
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt,$id_cnj_rpta,$_login); 
            
            if(empty($_permisos)){
                return $this->redirect(['site/index']);
            }else if($_permisos['p_actualizar']=='S'){
                $_boton=FALSE;
            }else if($_permisos['p_actualizar']=='N'){
                $_boton=TRUE; 
            }
            
        }
        
         if(empty($id_rpta)){
            
            //1.1) Averiguando si existe respuesta==============================================
            $rpta_exists= FdRespuesta::find()
                          ->where(['=', 'fd_respuesta.id_pregunta', $id_prta])
                          ->andwhere(['=', 'fd_respuesta.id_conjunto_respuesta', $id_cnj_rpta])
                          ->andwhere(['=', 'fd_respuesta.id_tpregunta', '12'])
                          ->andwhere(['=', 'fd_respuesta.id_capitulo', $id_capitulo])
                          ->andwhere(['=', 'fd_respuesta.id_formato', $id_fmt])
                          ->andwhere(['=', 'fd_respuesta.id_conjunto_pregunta', $id_conj_prta])
                          ->andwhere(['=', 'fd_respuesta.id_version', $id_version])
                          ->one();
            
            if(!empty($rpta_exists['id_respuesta'])){
                $id_rpta = $rpta_exists['id_respuesta'];
                
            }else{
                
                //1.2) Si no existe se crea la respuesta, sin respuesta no pueden existir ubicaciones
                $_modelrpta = NEW FdRespuesta();
                $_modelrpta->id_pregunta = $id_prta;
                $_modelrpta->id_conjunto_respuesta = $id_cnj_rpta;
                $_modelrpta->id_tpregunta = "9";
                $_modelrpta->id_capitulo = $id_capitulo;
                $_modelrpta->id_formato = $id_fmt;
                $_modelrpta->id_conjunto_pregunta = $id_conj_prta;
                $_modelrpta->id_version = $id_version;
                $_modelrpta->cantidad_registros = "0";

                if($_modelrpta->save()){
                    $id_rpta = $_modelrpta->id_respuesta;
                }else{
                    throw new \yii\web\HttpException(404, 'No se pudo crear la respuesta asociada.');
                }
            }    
        }
        
        
        $facade =  new FdRespuestaxmesControllerFachada();
        
        $_busquedap=['FdRespuestaXMesSearch'=>[
                        'id_respuesta'=>$id_rpta,
                        'id_pregunta'=>$id_prta,
                        'id_conjunto_respuesta'=>$id_cnj_rpta,
                    ]];
        
        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        $dataAndModel= $facade->actionIndex($_busquedap);
        
        //Contando total de registros en el dataprovider
        $_conteodata = $dataAndModel['dataProvider']->getTotalCount();
        
        //Buscando si la pregunta es de CARACTERISTICA_PREG = 'M' 
        $_modelprta = FdPregunta::findOne($id_prta);
        $caracteristica = $_modelprta->caracteristica_preg;
        
        //Enviando dato para habilitar o no boton adicionar
        if($caracteristica == 'M'){
            $_btnadd = TRUE;
        }else if($caracteristica == 'S' and $_conteodata == 0){
            $_btnadd = TRUE;
        }else{
            $_btnadd = FALSE;
        }
        
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_fmt'=>$id_fmt,
            'id_version'=>$id_version,
            'id_conj_prta'=>$id_conj_prta,
            'id_cnj_rpta'=>$id_cnj_rpta,
            'id_capitulo'=>$id_capitulo,
            'id_prta'=>$id_prta,
            'id_rpta'=>$id_rpta,
            'nom_prta'=>$nom_prta,
            'numerar'=>$numerar,
            'migadepan'=>$migadepan,
            'estado'=>$estado,
            'capitulo'=>$capitulo,
            'cantones'=>$cantones,
            'parroquias'=>$parroquias,
            'periodos'=>$periodos,
            'provincia'=>$provincia,
            'antvista'=>$antvista,
            'btnadd'=>$_btnadd,
            'botton'=>$_boton,
            'tipo_select' => $tipo_select,
            'focus' => $focus
        ]);
        
    }

    /**
     * Presenta un dato unico en el modelo FdRespuestaXMes.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  FdRespuestaXMesControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo FdRespuestaXMes .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new FdRespuestaxmesControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_respuesta_x_mes]);		
			
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
     * Funcion para crear un nuevo registro en fdrespuestaxmes asociada a un id_capitulo,id_pregunta, id_cnj_respuesta,id_respuesta
     * Se accede a través de un formato y se utiliza en las preguntas tipo ubicacion del formato seleccionado por el usuario.
     * Modificada: 2017-09-25
    */
    public function actionCreatedetcapitulo($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$btnadd,$botton,$tipo_select=null,$focus)
    {
        //Averiguando Permisos
        if(empty(Yii::$app->user->identity->usuario)){
            return $this->redirect(['site/index']);
        }else{
            
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt,$id_cnj_rpta,$_login); 
            
            if(empty($_permisos)){
                return $this->redirect(['site/index']);
            }else if($_permisos['p_actualizar']=='S'){
                $_boton=FALSE;
            }else if($_permisos['p_actualizar']=='N'){
                $_boton=TRUE; 
            }
            
        } 
        
       //Averiguando titulo y numero de la pregunta==================================================================== 
        
       $facade =  new FdRespuestaxmesControllerFachada();
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_prta,$id_rpta,$tipo_select);
       $model = $modelE['model'];
       
        if ($modelE['create'] == 'True') {
            
            //1) Aumentando el valor de cantidad_registros=============================================================
            $_savecantregistros= $this->addCantregistro($id_rpta, '1');
            if($_savecantregistros === FALSE){
            
                 return $this->redirect(['deletep','id'=>$model->id,'id_fmt'=>$id_fmt,
                            'id_version'=>$id_version,
                            'id_conj_prta'=>$id_conj_prta,
                            'id_cnj_rpta'=>$id_cnj_rpta,
                            'id_capitulo'=>$id_capitulo,
                            'id_prta'=>$id_prta,
                            'id_rpta'=>$id_rpta,
                            'numerar'=>$numerar,
                            'nom_prta'=>$nom_prta, 
                            'estado' => $estado,
                            'capitulo'=>$capitulo,
                            'cantones'=>$cantones,
                            'provincia'=>$provincia,
                            'parroquias'=>$parroquias,
                            'periodos'=>$periodos,
                            'antvista'=>$antvista,
                            'migadepan'=>$migadepan,
                            'btnadd'=>$btnadd,
                            'botton'=>$_boton,
                            'tipo_select' => $tipo_select,
                            'focus' => $focus]);
                
            }else{
            
                //Buscando Tipo de Pregunta ===============================================================================
                $_modelprta = FdPregunta::findOne($id_prta);
                $caracteristica = $_modelprta->caracteristica_preg;

                if($caracteristica == 'M'){
                    $redireccionar_a="indexdetcapitulo";
                }else{
                    $redireccionar_a=$migadepan;
                }
            
                //2) Redireccionando ======================================================================================
                Yii::$app->session->setFlash('FormSubmitted','2');
                return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 'id_fmt'=>$id_fmt,
                                'id_version'=>$id_version,
                                'id_conj_prta'=>$id_conj_prta,
                                'id_cnj_rpta'=>$id_cnj_rpta,
                                'id_capitulo'=>$id_capitulo,
                                'id_prta'=>$id_prta,
                                'id_rpta'=>$id_rpta,
                                'numerar'=>$numerar,
                                'nom_prta'=>$nom_prta, 
                                'estado' => $estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'provincia'=>$provincia,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'antvista'=>$antvista,
                                'migadepan'=>$migadepan,
                                'btnadd'=>$btnadd,
                                'botton'=>$_boton,
                                'tipo_select' => $tipo_select,
                                'focus' => $focus]);	
            }
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,
                        'id_fmt'=>$id_fmt,
                        'id_version'=>$id_version,
                        'id_conj_prta'=>$id_conj_prta,
                        'id_cnj_rpta'=>$id_cnj_rpta,
                        'id_capitulo'=>$id_capitulo,
                        'id_prta'=>$id_prta,
                        'id_rpta'=>$id_rpta,
                        'numerar'=>$numerar,
                        'nom_prta'=>$nom_prta,
                        'estado' => $estado,
                        'capitulo'=>$capitulo,
                        'cantones'=>$cantones,
                        'provincia'=>$provincia,
                        'parroquias'=>$parroquias,
                        'periodos'=>$periodos,
                        'antvista'=>$antvista,
                        'migadepan'=>$migadepan,
                        'btnadd'=>$btnadd,
                        'botton'=>$_boton,
                        'tipo_select' => $tipo_select,
                        'focus' => $focus
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'id_fmt'=>$id_fmt,
                'id_version'=>$id_version,
                'id_conj_prta'=>$id_conj_prta,
                'id_cnj_rpta'=>$id_cnj_rpta,
                'id_capitulo'=>$id_capitulo,
                'id_prta'=>$id_prta,
                'id_rpta'=>$id_rpta,
                'numerar'=>$numerar,
                'nom_prta'=>$nom_prta,
                'estado' => $estado,
                'capitulo'=>$capitulo,
                'cantones'=>$cantones,
                'provincia'=>$provincia,
                'parroquias'=>$parroquias,
                'periodos'=>$periodos,
                'antvista'=>$antvista,
                'migadepan'=>$migadepan,
                'btnadd'=>$btnadd,
                'botton'=>$_boton,
                'tipo_select' => $tipo_select,
                'focus' => $focus
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo FdRespuestaXMes.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  FdRespuestaXMesControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_respuesta_x_mes]);
            
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
     * Modifica un dato existente en el modelo DetalleMensual el cual esta añadido a traves de un formato
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatedetcapitulo($id,$id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$btnadd,$botton,$tipo_select=null,$focus)
    {
        
          //Averiguando Permisos
        if(empty(Yii::$app->user->identity->usuario)){
            return $this->redirect(['site/index']);
        }else{
            
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt,$id_cnj_rpta,$_login); 
            
            if(empty($_permisos)){
                return $this->redirect(['site/index']);
            }else if($_permisos['p_actualizar']=='S'){
                $_boton=FALSE;
            }else if($_permisos['p_actualizar']=='N'){
                $_boton=TRUE; 
            }
            
        } 
        
        $facade =  new  FdRespuestaXMesControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];
        
        
         if ($modelE['update'] == 'True') {
             
            $_modelprta = FdPregunta::findOne($id_prta);
            $caracteristica = $_modelprta->caracteristica_preg;

            if($caracteristica == 'M'){
                $redireccionar_a="indexdetcapitulo";
            }else{
                $redireccionar_a=$migadepan;
            }
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 'id_fmt'=>$id_fmt,
                                'id_version'=>$id_version,
                                'id_conj_prta'=>$id_conj_prta,
                                'id_cnj_rpta'=>$id_cnj_rpta,
                                'id_capitulo'=>$id_capitulo,
                                'id_prta'=>$id_prta,
                                'id_rpta'=>$id_rpta,
                                'numerar'=>$numerar,
                                'nom_prta'=>$nom_prta, 
                                'estado' => $estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'provincia'=>$provincia,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'antvista'=>$antvista,
                                'migadepan'=>$migadepan,
                                'btnadd'=>$btnadd,
                                'botton'=>$_boton,
                                'tipo_select' => $tipo_select,
                                'focus' => $focus]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model, 'id_version'=>$id_version,
                                'id_conj_prta'=>$id_conj_prta,
                                'id_cnj_rpta'=>$id_cnj_rpta,
                                'id_capitulo'=>$id_capitulo,
                                'id_prta'=>$id_prta,
                                'id_rpta'=>$id_rpta,
                                'numerar'=>$numerar,
                                'nom_prta'=>$nom_prta, 
                                'estado' => $estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'provincia'=>$provincia,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'antvista'=>$antvista,
                                'migadepan'=>$migadepan,
                                'btnadd'=>$btnadd,
                                'botton'=>$_boton,
                                'tipo_select' => $tipo_select,
                                'focus' => $focus
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model, 'id_version'=>$id_version,
                                'id_conj_prta'=>$id_conj_prta,
                                'id_cnj_rpta'=>$id_cnj_rpta,
                                'id_capitulo'=>$id_capitulo,
                                'id_prta'=>$id_prta,
                                'id_rpta'=>$id_rpta,
                                'numerar'=>$numerar,
                                'nom_prta'=>$nom_prta, 
                                'estado' => $estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'provincia'=>$provincia,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'antvista'=>$antvista,
                                'migadepan'=>$migadepan,
                                'btnadd'=>$btnadd,
                                'botton'=>$_boton,
                                'tipo_select' => $tipo_select,
                                'focus' => $focus
            ]);
        }
        
        
    }
    

    /**
     * Deletes an existing FdRespuestaXMes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id,$id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$btnadd,$botton,$tipo_select=null,$focus)
    {
        $facade =  new  FdRespuestaXMesControllerFachada;
        $facade->actionDeletep($id);

        $_savecantregistros= $this->addCantregistro($id_rpta, '2');
        
        return $this->redirect(['indexdetcapitulo','id_fmt'=>$id_fmt,
                             'id_version'=>$id_version,
                                'id_conj_prta'=>$id_conj_prta,
                                'id_cnj_rpta'=>$id_cnj_rpta,
                                'id_capitulo'=>$id_capitulo,
                                'id_prta'=>$id_prta,
                                'id_rpta'=>$id_rpta,
                                'numerar'=>$numerar,
                                'nom_prta'=>$nom_prta, 
                                'estado' => $estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'provincia'=>$provincia,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'antvista'=>$antvista,
                                'migadepan'=>$migadepan,
                                'btnadd'=>$btnadd,
                                'botton'=>$botton,
                                'tipo_select' => $tipo_select,
                                'focus' => $focus]);
    }
    
    
     /*Funcion que aumenta o disminuye la cantidad de registro en la tabla fd_respuesta
     * @id_rpta => id de la respuesta que se va a afectar
     * @tipo => '1' aumenta, '2' disminuye
     */
    protected function addCantregistro($id_rpta,$tipo){
        
       $modelrpta = FdRespuesta::findOne($id_rpta);
        
        if($tipo==1){
            $cant_registro= $modelrpta->cantidad_registros;
            $cant_registro+=1;
            
            $modelrpta->cantidad_registros = $cant_registro;
            
            if($modelrpta->save()){
                return TRUE;
            }else{
                return FALSE;
            }
            
        }else{
            
            $cant_registro= $modelrpta->cantidad_registros;
            $cant_registro=$cant_registro-1;
            
            $modelrpta->cantidad_registros = $cant_registro;
            
            if($modelrpta->save()){
                return TRUE;
            }else{
                return FALSE;
            }
            
        }
        
    }

    
}
