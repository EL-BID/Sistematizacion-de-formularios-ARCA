<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\InformacionprestadoresControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use common\models\poc\FdAdmEstadoSearch;
use common\models\poc\FdTipoSelect;
use common\models\poc\FdOpcionSelect;

/**
 * InformacionprestadoresController implementa las acciones a través del sistema CRUD para el modelo Informacionprestadores.
 */
class InformacionprestadoresController extends ControllerPry
{
  //private $facade =    InformacionprestadoresControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  InformacionprestadoresControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute, $id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan,$estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista){
            $facade =  new  InformacionprestadoresControllerFachada;
            echo $facade->actionProgress($urlroute, $id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista);
    }

	
	
    /**
     * Listado todos los datos del modelo Informacionprestadores que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_fmt,$id_conj_prta,$id_cnj_rpta,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista)
    {
        
                //0)Verificando permisos del usuario========================================================
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
        
        $facade =  new InformacionprestadoresControllerFachada;
        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        $_busquedap = ['InformacionprestadoresSearch' => [
                        'id_conjunto_respuesta' => $id_cnj_rpta,
                    ]];

        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        $dataAndModel = $facade->actionIndex($_busquedap);
        
        $_conteodata = $dataAndModel['dataProvider']->getTotalCount();

        

        //Enviando dato para habilitar o no boton adicionar
        if ($_conteodata == 0) {
            $_btnadd = true;
        } else {
            $_btnadd = false;
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
     * Presenta un dato unico en el modelo Informacionprestadores.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  InformacionprestadoresControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Informacionprestadores .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan,$estado, $capitulo, $cantones,$provincia, $parroquias, $periodos, $antvista)
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
        
        $facade = new InformacionprestadoresControllerFachada();
        $modelE = $facade->actionCreate(Yii::$app->request->post(), Yii::$app->request->isAjax, $id_cnj_rpta); //aqui cayo
        $model = $modelE['model'];
        
       $_nombrevalor = FdTipoSelect::find()
            ->where(['nom_tselect' => 'SI/NO'])
            ->one();       
       $valor_tselect=FdOpcionSelect::find()->where(['id_tselect'=>$_nombrevalor->id_tselect])->all();

        if ($modelE['create'] == 'True') {
            //1) Aumentando el valor de cantidad_registros=============================================================
            //$_savecantregistros = $this->addCantregistro($id_rpta, '1');
            $_savecantregistros = true;
            if ($_savecantregistros === false) {
                return $this->redirect(['deletep', 'id' => $model->id, 
                            'id_fmt' => $id_fmt,                            
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta, 
                            'migadepan' => $migadepan,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos, 
                            'antvista' => $antvista, 
                            'valor_tselect'=>$valor_tselect,
                            ]);
            } else {
                $redireccionar_a = 'index';
                //2) Redireccionando ======================================================================================
                Yii::$app->session->setFlash('FormSubmitted', '2');                
                return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 
                                'id_fmt' => $id_fmt,                                
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta,  
                                'migadepan' => $migadepan,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista, 
                                'valor_tselect'=>$valor_tselect,
                            ]);
            }
        } elseif ($modelE['create'] == 'Ajax') {
            return $this->renderAjax('create', [
                        '_ajax' => true,
                        'model' => $model,
                        'id_fmt' => $id_fmt,                        
                        'id_conj_prta' => $id_conj_prta,
                        'id_cnj_rpta' => $id_cnj_rpta,   
                        'migadepan' => $migadepan,
                        'estado' => $estado,
                        'capitulo' => $capitulo,
                        'cantones' => $cantones,
                        'provincia' => $provincia,
                        'parroquias' => $parroquias,
                        'periodos' => $periodos,
                        'antvista' => $antvista,  
                        'valor_tselect'=>$valor_tselect,
						
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id_fmt' => $id_fmt,              
                'id_conj_prta' => $id_conj_prta,
                'id_cnj_rpta' => $id_cnj_rpta,   
                'migadepan' => $migadepan,
                'estado' => $estado,
                'capitulo' => $capitulo,
                'cantones' => $cantones,
                'provincia' => $provincia,
                'parroquias' => $parroquias,
                'periodos' => $periodos,
                'antvista' => $antvista,	
                'valor_tselect'=>$valor_tselect,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Informacionprestadores.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id, $id_fmt, $id_conj_prta, $id_cnj_rpta,$migadepan,$estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista)
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
        
        $facade = new InformacionprestadoresControllerFachada();
        $modelE = $facade->actionUpdate($id, Yii::$app->request->post(), Yii::$app->request->isAjax);
        $model = $modelE['model'];
		
        $_nombrevalor = FdTipoSelect::find()
            ->where(['nom_tselect' => 'SI/NO'])
            ->one();       
       $valor_tselect=FdOpcionSelect::find()->where(['id_tselect'=>$_nombrevalor->id_tselect])->all();
		
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
                                'valor_tselect'=>$valor_tselect,
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
                        'valor_tselect'=>$valor_tselect,
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
                'valor_tselect'=>$valor_tselect,
            ]);
        }
    }

    /**
     * Deletes an existing Informacionprestadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  InformacionprestadoresControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
