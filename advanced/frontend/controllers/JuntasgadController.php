<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\JuntasgadControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use common\models\poc\FdAdmEstadoSearch;


/**
 * JuntasGadController implementa las acciones a través del sistema CRUD para el modelo JuntasGad.
 */
class JuntasgadController extends ControllerPry
{
  //private $facade =    JuntasGadControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  JuntasgadControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/


            
    public function actionProgress($urlroute, $id_fmt, $id_conj_prta, $id_cnj_rpta,$migadepan,$estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista){
            $facade =  new  JuntasgadControllerFachada;
            echo $facade->actionProgress($urlroute, $id_fmt, $id_conj_prta, $id_cnj_rpta,$migadepan,$estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista);
    }

	
	
    /**
     * Listado todos los datos del modelo JuntasGad que se encuentran en el tablename.
     * @return mixed
     */
    

    
    public function actionIndex($id_fmt,$id_conj_prta,$id_cnj_rpta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista)
    {
        
       if (empty(Yii::$app->user->identity->usuario)) {
            return $this->redirect(['site/index']);
        } else {
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt, $id_cnj_rpta, $_login);
            if (empty($_permisos)) {
                return $this->redirect(['site/index']);
            } elseif ($_permisos['p_actualizar'] == 'S') {
                $_boton = false;
            } elseif ($_permisos['p_actualizar'] == 'N') {
                $_boton = true;
            }
        }
         $facade =  new  JuntasgadControllerFachada;
        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        $_busquedap = ['JuntasgadSearch' => [
                        'id_conjunto_respuesta' => $id_cnj_rpta,
                    ]];

        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        $dataAndModel = $facade->actionIndex($_busquedap);
        
         //Contando total de registros en el dataprovider
        $_conteodata = $dataAndModel['dataProvider']->getTotalCount();
        
        $_respuesta_juntas = \common\models\Juntasgad::find()->where(['id_conjunto_respuesta'=>$id_cnj_rpta])->count();
        $_respuesta_informacion_pres = \common\models\Informacionprestadores::find()->where(['id_conjunto_respuesta'=>$id_cnj_rpta])->one();
        $num_pres = $_respuesta_informacion_pres->numero_prestadores;
            
        if(!empty($num_pres) and $num_pres>0){
                //Aqui vamos a comprar la cantidad de datos recibos para la pregunta actual en el boton, con las habilitadas
                //Esto es tipo 5 asi que debe estar en entero...vamos a ver si no nos toca consultar la tabla
                if($num_pres>0  and $num_pres<=$_respuesta_juntas){
                    
                    $_btnadd = FALSE;
                    
                    //Aqui va la alerta =========================================================
                    Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'No es posible agregar más Prestadores',
                       ]);
                    
                }else{
                    
                    $_btnadd = TRUE;
                }
            }else{
                
                //Aqui vamos a crear nuestra primera respuesta, si esa pregunta no se ha contestado entonces
                //debemos sacar una alerta diciendo que primero se responsa esta pregunta
                $_btnadd = FALSE;
                
                Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'Por favor primero ingrese el número de prestadores ',
                       ]);
                
                
            }

        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_fmt' => $id_fmt,            
            'id_conj_prta' => $id_conj_prta,
            'id_cnj_rpta' => $id_cnj_rpta,  
            'migadepan'=>$migadepan,
            'estado' => $estado,
            'capitulo' => $capitulo,
            'cantones' => $cantones,
            'parroquias' => $parroquias,
            'periodos' => $periodos,
            'provincia' => $provincia,    
            'antvista' => $antvista,
            'btnadd' => $_btnadd,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo JuntasGad.
     * @param string $id
     * @return mixed
     */
    
    
    public function actionView($id)
    {
        $facade =  new  JuntasgadControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo JuntasGad .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */

    public function actionCreate($id_fmt, $id_conj_prta, $id_cnj_rpta,$migadepan, $estado, $capitulo, $cantones,$provincia, $parroquias, $periodos, $antvista)
    {
        //Averiguando Permisos
        if (empty(Yii::$app->user->identity->usuario)) {
            return $this->redirect(['site/index']);
        } else {
			
			/*//Enviando datos de parroquias en la base de datos
			$parroquiasPost=$this->getParroquias();*/
		
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt, $id_cnj_rpta, $_login);

            if (empty($_permisos)) {
                return $this->redirect(['site/index']);
            } elseif ($_permisos['p_actualizar'] == 'S') {
                $_boton = false;
            } elseif ($_permisos['p_actualizar'] == 'N') {
                $_boton = true;
            }
        }

        //Averiguando titulo y numero de la pregunta====================================================================
        
        
        $_post= Yii::$app->request->post();
        if(!empty($_post)){
          $nombre = $_post['Juntasgad']['nombre_junta'];
          if($this->actionValidanjunta($id_cnj_rpta,$nombre)>0)
          {
                   Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'El nombre del prestador ya existe, ingrese otro nombre',
                   ]);  
                           $redireccionar_a = 'index';
                           return  $this->redirect(['index', 
                                'id_fmt' => $id_fmt,                                
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta, 
                                'migadepan' =>$migadepan,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista, 
                            ]);
          }
        }
        
        $facade = new JuntasgadControllerFachada();
        $modelE = $facade->actionCreate(Yii::$app->request->post(), Yii::$app->request->isAjax, $id_cnj_rpta); //aqui cayo
        $model = $modelE['model'];

        if ($modelE['create'] == 'True') {
            //1) Aumentando el valor de cantidad_registros=============================================================
            //$_savecantregistros = $this->addCantregistro($id_rpta, '1');
            $_savecantregistros = true;
            if ($_savecantregistros === false) {
                return $this->redirect(['deletep', 'id' => $model->id, 'id_fmt' => $id_fmt,                            
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta, 
                            'migadepan' =>$migadepan,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos,                           
                            ]);
            } else {
                $redireccionar_a = 'index';
                //2) Redireccionando ======================================================================================
                Yii::$app->session->setFlash('FormSubmitted', '2');                
                return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 
                                'id_fmt' => $id_fmt,                                
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta, 
                                'migadepan' =>$migadepan,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista, 
                            ]);
            }
        } elseif ($modelE['create'] == 'Ajax') {
            return $this->renderAjax('create', [
                        '_ajax' => true,
                        'model' => $model,
                        'id_fmt' => $id_fmt,                        
                        'id_conj_prta' => $id_conj_prta,
                        'id_cnj_rpta' => $id_cnj_rpta,   
                        'migadepan' =>$migadepan,
                        'estado' => $estado,
                        'capitulo' => $capitulo,
                        'cantones' => $cantones,
                        'provincia' => $provincia,
                        'parroquias' => $parroquias,
                        'periodos' => $periodos,
                        'antvista' => $antvista,                      
						
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id_fmt' => $id_fmt,              
                'id_conj_prta' => $id_conj_prta,
                'id_cnj_rpta' => $id_cnj_rpta,     
                'migadepan' =>$migadepan,
                'estado' => $estado,
                'capitulo' => $capitulo,
                'cantones' => $cantones,
                'provincia' => $provincia,
                'parroquias' => $parroquias,
                'periodos' => $periodos,
                'antvista' => $antvista,			
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo JuntasGad.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */       
    public function actionUpdate($id, $id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista)
    {
        //Averiguando Permisos
        if (empty(Yii::$app->user->identity->usuario)) {
            return $this->redirect(['site/index']);
        } else {
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt, $id_cnj_rpta, $_login);

            if (empty($_permisos)) {
                return $this->redirect(['site/index']);
            } elseif ($_permisos['p_actualizar'] == 'S') {
                $_boton = false;
            } elseif ($_permisos['p_actualizar'] == 'N') {
                $_boton = true;
            }
        }
        
                $_post= Yii::$app->request->post();
        if(!empty($_post)){
          $nombre = $_post['Juntasgad']['nombre_junta'];          
          if($this->actionValidanjuntau($id_cnj_rpta,$nombre,$id)>0)
          {
                   Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'El nombre del prestador ya existe, ingrese otro nombre',
                   ]);  
                           $redireccionar_a = 'index';
                           return  $this->redirect(['index', 
                                'id_fmt' => $id_fmt,                                
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta, 
                                'migadepan' =>$migadepan,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista, 
                            ]);
          }
          $buscajunta = $this->actionUpdateNombreJunta($id_cnj_rpta,$nombre,$id);
        }

        $facade = new JuntasgadControllerFachada();
        $modelE = $facade->actionUpdate($id, Yii::$app->request->post(), Yii::$app->request->isAjax);
        $model = $modelE['model'];
		
        
		
		if ($modelE['update'] == 'True') {
            //Buscando Tipo de Pregunta ===============================================================================

            $redireccionar_a = 'index';
           

            Yii::$app->session->setFlash('FormSubmitted', '2');

            return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 'id_fmt' => $id_fmt,                                
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta,  
                                'migadepan' =>$migadepan,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista,
				]);
        } elseif ($modelE['update'] == 'Ajax') {
            return $this->renderAjax('update', [
                        '_ajax' => true,
                        'model' => $model,
                        'id_fmt' => $id_fmt,                        
                        'id_conj_prta' => $id_conj_prta,
                        'id_cnj_rpta' => $id_cnj_rpta,
                        'migadepan' =>$migadepan,
                        'estado' => $estado,
                        'capitulo' => $capitulo,
                        'cantones' => $cantones,
                        'provincia' => $provincia,
                        'parroquias' => $parroquias,
                        'periodos' => $periodos,
                        'antvista' => $antvista,

            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'id_fmt' => $id_fmt,                
                'id_conj_prta' => $id_conj_prta,
                'id_cnj_rpta' => $id_cnj_rpta,
                'migadepan' =>$migadepan,
                'estado' => $estado,
                'capitulo' => $capitulo,
                'cantones' => $cantones,
                'provincia' => $provincia,
                'parroquias' => $parroquias,
                'periodos' => $periodos,
                'antvista' => $antvista,
            ]);
        }
    }


    /**
     * Deletes an existing JuntasGad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id, $id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista)
    {
        /*$facade =  new  JuntasgadControllerFachada;
        $facade->actionDeletep($id);*/
        $this->actionBorrarjunta($id,$id_cnj_rpta);

        $redireccionar_a = 'index';
           

            Yii::$app->session->setFlash('FormSubmitted', '2');

            return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 'id_fmt' => $id_fmt,                                
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta,  
                                'migadepan' =>$migadepan,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista,
                 ]);
    }
    public function actionAcceder($vista_formato,$id_conj_rpta,$id_conj_prta,$id_fmt,$last,$migadepan,$estado,$provincia,$cantones,$parroquias,$periodos)
    {
        return $this->redirect(['index']);
    }
    
   public function actionValidaborrarjunta(){
       $_id = Yii::$app->request->post()['id_junta']; 
       $id_conj_preg = Yii::$app->request->post()['id_conjrpta']; 
       $_juntas= \common\models\poc\FdRespuesta::find()
                        ->where(['id_junta'=>$_id])
                        ->andwhere(['id_conjunto_respuesta'=>$id_conj_preg])
                        ->count();
       return $_juntas;        
    }
    
     public function actionBorrarjunta($id_junta,$id_conj_res){        
       /*$id_junta = Yii::$app->request->post()['id_junta']; 
       $id_conj_res = Yii::$app->request->post()['id_conjrpta'];       */ 
       $g_sql = "DELETE FROM fd_respuesta WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction = Yii::$app->db->beginTransaction();
       $g_sql2 = "DELETE FROM juntas_gad WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction2 = Yii::$app->db->beginTransaction();        
       $g_sql3 = "DELETE FROM fd_potabiliz_plantatra_apscom WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction3 = Yii::$app->db->beginTransaction();        
       $g_sql4 = "DELETE FROM fd_conduccion_impulsion_apscom WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction4 = Yii::$app->db->beginTransaction();        
       $g_sql5 = "DELETE FROM fd_tratagua_desinfeccion_apscom WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction5 = Yii::$app->db->beginTransaction();        
       $g_sql6 = "DELETE FROM fd_detalles_fuente WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction6 = Yii::$app->db->beginTransaction();        
       $g_sql7 = "DELETE FROM fd_detalles_captacion WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction7 = Yii::$app->db->beginTransaction();     
       $g_sql8 = "DELETE FROM fd_bombas_captacion WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction8 = Yii::$app->db->beginTransaction();     
       $g_sql9 = "DELETE FROM fd_conduccion_gravedad_ap WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction9 = Yii::$app->db->beginTransaction(); 
       $g_sql10 = "DELETE FROM fd_tanques_almacena_apscom WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction10 = Yii::$app->db->beginTransaction(); 
       $g_sql11 = "DELETE FROM fd_operacion_planta_apscom WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction11 = Yii::$app->db->beginTransaction(); 
       $g_sql12 = "DELETE FROM fd_datos_generales_comunitario_ap WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction12 = Yii::$app->db->beginTransaction(); 
       $g_sql13 = "DELETE FROM fd_ubicacion WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj_res;
       $_transaction13 = Yii::$app->db->beginTransaction(); 
        
        try {
            Yii::$app->db->createCommand($g_sql3)->execute();
            $_transaction3->commit();
            Yii::$app->db->createCommand($g_sql4)->execute();
            $_transaction4->commit();            
            Yii::$app->db->createCommand($g_sql5)->execute();
            $_transaction5->commit();
            Yii::$app->db->createCommand($g_sql6)->execute();
            $_transaction6->commit();
            Yii::$app->db->createCommand($g_sql7)->execute();
            $_transaction7->commit();            
            Yii::$app->db->createCommand($g_sql8)->execute();
            $_transaction8->commit();            
            Yii::$app->db->createCommand($g_sql9)->execute();
            $_transaction9->commit();            
            Yii::$app->db->createCommand($g_sql10)->execute();
            $_transaction10->commit();            
            Yii::$app->db->createCommand($g_sql11)->execute();
            $_transaction11->commit();            
            Yii::$app->db->createCommand($g_sql12)->execute();
            $_transaction12->commit();   
            Yii::$app->db->createCommand($g_sql13)->execute();
            $_transaction13->commit();     
            Yii::$app->db->createCommand($g_sql)->execute();
            $_transaction->commit();
            Yii::$app->db->createCommand($g_sql2)->execute();
            $_transaction2->commit();
            return TRUE;
        }catch (\Exception $e) {            
            $_transaction3->rollBack();
            $_transaction4->rollBack();            
            $_transaction5->rollBack();
            $_transaction6->rollBack();
            $_transaction7->rollBack();
            $_transaction8->rollBack();            
            $_transaction9->rollBack();
            $_transaction10->rollBack();
            $_transaction11->rollBack();
            $_transaction12->rollBack();            
            $_transaction13->rollBack();   
            $_transaction->rollBack();
            $_transaction2->rollBack();
            throw $e;
            return FALSE;
        } catch (\Throwable $e) {                 
            $_transaction3->rollBack();
            $_transaction4->rollBack();            
            $_transaction5->rollBack();
            $_transaction6->rollBack();
            $_transaction7->rollBack();
            $_transaction8->rollBack();            
            $_transaction9->rollBack();
            $_transaction10->rollBack();
            $_transaction11->rollBack();
            $_transaction12->rollBack();            
            $_transaction13->rollBack(); 
            $_transaction->rollBack();
            $_transaction2->rollBack();
            throw $e;
            return FALSE;
        }      
    }
    
     public function actionValidanjunta($id,$nombre){
       $_juntas= \common\models\Juntasgad::find()
                        ->where(['id_conjunto_respuesta'=>$id])
                        ->andwhere(['nombre_junta'=>$nombre])
                        ->count();
       return $_juntas;        
    } 
    public function actionValidanjuntau($id_conj,$nombre,$id_junta)
    {
       $_juntas= \common\models\Juntasgad::find()
                        ->where(['id_conjunto_respuesta'=>$id_conj])
                        ->andwhere(['nombre_junta'=>$nombre])
                        ->andwhere(['<>','id_junta',$id_junta])
                        ->count();
       return $_juntas;  
        
    }
    
    public function actionUpdateNombreJunta($id_conj,$nombre,$id_junta)
    {        
        $_registro= \common\models\poc\FdDatosGeneralesComunitarioAp::find()
                        ->where(['id_conjunto_respuesta'=>$id_conj])                        
                        ->andwhere(['id_junta'=>$id_junta])
                        ->count();
        if($_registro>0)
        {            
            $g_sql = "UPDATE fd_datos_generales_comunitario_ap set nombres_prestador='".$nombre."' WHERE id_junta=".$id_junta." AND id_conjunto_respuesta=".$id_conj;
            $_transaction = Yii::$app->db->beginTransaction();
            Yii::$app->db->createCommand($g_sql)->execute();
            $_transaction->commit();
        }
    }
}
