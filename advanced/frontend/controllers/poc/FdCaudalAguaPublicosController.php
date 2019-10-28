<?php

namespace frontend\controllers\poc;

use Yii;
use frontend\controllers\poc\FdCaudalAguaPublicosControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use common\models\poc\FdPregunta;
use common\models\poc\FdAdmEstadoSearch;
use common\models\poc\FdRespuesta;

/**
 * FdCaudalAguaPublicosController implementa las acciones a través del sistema CRUD para el modelo FdCaudalAguaPublicos.
 */
class FdCaudalAguaPublicosController extends ControllerPry
{
  //private $facade =    FdCaudalAguaPublicosControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  FdCaudalAguaPublicosControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute, $id_fmt, $id_version, $id_conj_prta, $id_cnj_rpta, $id_capitulo, $id_prta, $id_rpta, $nom_prta, $numerar, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista, $focus,$fuentes){
            $facade =  new  FdCaudalAguaPublicosControllerFachada;
            echo $facade->actionProgress($urlroute, $id_fmt, $id_version, $id_conj_prta, $id_cnj_rpta, $id_capitulo, $id_prta, $id_rpta, $nom_prta, $numerar, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista, $focus,$fuentes);
    }

	
	
    /**
     * Listado todos los datos del modelo FdCaudalAguaPublicos que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  FdCaudalAguaPublicosControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Lista de la tabla fd_caudal_agua_publicos
     * id_cnj_rpta => id conjunto respuesta
     * id_rpta => id respuesta si no existe crea una respuesa asociada
     * id_prta => id pregunta.
     *
     * @return mixed
     */
    public function actionIndexdetcapitulo($id_fmt, $id_version, $id_conj_prta, $id_cnj_rpta, $id_capitulo, $id_prta, $id_rpta, $numerar, $nom_prta, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista, $focus,$fuentes)
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

        //1) Creando la respuesta a la pregunta==================================================
        if (empty($id_rpta)) {
            //1.1) Averiguando si existe respuesta==============================================
            $rpta_exists = FdRespuesta::find()
                          ->where(['=', 'fd_respuesta.id_pregunta', $id_prta])
                          ->andwhere(['=', 'fd_respuesta.id_conjunto_respuesta', $id_cnj_rpta])
                          ->andwhere(['=', 'fd_respuesta.id_tpregunta', '27'])
                          ->andwhere(['=', 'fd_respuesta.id_capitulo', $id_capitulo])
                          ->andwhere(['=', 'fd_respuesta.id_formato', $id_fmt])
                          ->andwhere(['=', 'fd_respuesta.id_conjunto_pregunta', $id_conj_prta])
                          ->andwhere(['=', 'fd_respuesta.id_version', $id_version])
                          ->one();

            if (!empty($rpta_exists['id_respuesta'])) {
                $id_rpta = $rpta_exists['id_respuesta'];
            } else {
                //1.2) Si no existe se crea la respuesta, sin respuesta no pueden existir ubicaciones
                $_modelrpta = new FdRespuesta();
                $_modelrpta->id_pregunta = $id_prta;
                $_modelrpta->id_conjunto_respuesta = $id_cnj_rpta;
                $_modelrpta->id_tpregunta = '27';
                $_modelrpta->id_capitulo = $id_capitulo;
                $_modelrpta->id_formato = $id_fmt;
                $_modelrpta->id_conjunto_pregunta = $id_conj_prta;
                $_modelrpta->id_version = $id_version;
                $_modelrpta->cantidad_registros = '0';

                if ($_modelrpta->save()) {
                    $id_rpta = $_modelrpta->id_respuesta;
                } else {
                    throw new \yii\web\HttpException(404, 'No se pudo crear la respuesta asociada.');
                }
            }
        }

        
        $facade = new FdCaudalAguaPublicosControllerFachada();;
        //FdInvolucradoSearch
        $_busquedap = ['FdCaudalAguaPublicosSearch' => [
                        'id_respuesta' => $id_rpta,
                        'id_pregunta' => $id_prta,
                        'id_conjunto_respuesta' => $id_cnj_rpta,
                    ]];

        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        $dataAndModel = $facade->actionIndex($_busquedap);

        //Contando total de registros en el dataprovider
        $_conteodata = $dataAndModel['dataProvider']->getTotalCount();

        //Buscando si la pregunta es de CARACTERISTICA_PREG = 'M'
        $_modelprta = FdPregunta::findOne($id_prta);
        $caracteristica = $_modelprta->caracteristica_preg;

        //Enviando dato para habilitar o no boton adicionar
        if ($caracteristica == 'M') {
            $_btnadd = true;
        } elseif ($caracteristica == 'S' and $_conteodata == 0) {
            $_btnadd = true;
        } else {
            $_btnadd = false;
        }

        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_fmt' => $id_fmt,
            'id_version' => $id_version,
            'id_conj_prta' => $id_conj_prta,
            'id_cnj_rpta' => $id_cnj_rpta,
            'id_capitulo' => $id_capitulo,
            'id_prta' => $id_prta,
            'id_rpta' => $id_rpta,
            'nom_prta' => $nom_prta,
            'numerar' => $numerar,
            'migadepan' => $migadepan,
            'estado' => $estado,
            'capitulo' => $capitulo,
            'cantones' => $cantones,
            'parroquias' => $parroquias,
            'periodos' => $periodos,
            'provincia' => $provincia,
            'antvista' => $antvista,
            'btnadd' => $_btnadd,
            'botton' => $_boton,
            'focus' => $focus,
            'fuentes' => $fuentes,
        ]);
    }
    
    /**
     * Presenta un dato unico en el modelo FdCaudalAguaPublicos.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  FdCaudalAguaPublicosControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo FdCaudalAguaPublicos .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  FdCaudalAguaPublicosControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_caudal_agua_publicos]);		
			
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
     * mceron Funcion para crear un nuevo caudal de agua público
     * Se accede a través de un formato y se utiliza en las preguntas tipo ubicacion del formato seleccionado por el usuario.
     * Modificada: 2019-01-30
     */
    public function actionCreatedetcapitulo($id_fmt, $id_version, $id_conj_prta, $id_cnj_rpta, $id_capitulo, $id_prta, $id_rpta, $nom_prta, $numerar, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista, $focus,$fuentes)
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
        
        $facade = new FdCaudalAguaPublicosControllerFachada();
        $modelE = $facade->actionCreate(Yii::$app->request->post(), Yii::$app->request->isAjax, $id_cnj_rpta, $id_prta, $id_rpta, $focus); //aqui cayo
        $model = $modelE['model'];

        if ($modelE['create'] == 'True') {
            //1) Aumentando el valor de cantidad_registros=============================================================
            $_savecantregistros = $this->addCantregistro($id_rpta, '1');
            if ($_savecantregistros === false) {
                return $this->redirect(['deletep', 'id' => $model->id, 'id_fmt' => $id_fmt,
                            'id_version' => $id_version,
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta,
                            'id_capitulo' => $id_capitulo,
                            'id_prta' => $id_prta,
                            'id_rpta' => $id_rpta,
                            'numerar' => $numerar,
                            'nom_prta' => $nom_prta,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos,
                            'antvista' => $antvista,
                            'migadepan' => $migadepan,
                            'focus' => $focus, 
                            'fuentes' => $fuentes,]);
            } else {
                $_modelprta = FdPregunta::findOne($id_prta);
                $caracteristica = $_modelprta->caracteristica_preg;

                /*if ($caracteristica == 'M') {
                    $redireccionar_a = 'indexdetcapitulo';
                } else {
                    $redireccionar_a = $migadepan;
                }*/
                $redireccionar_a = 'indexdetcapitulo';

                //2) Redireccionando ======================================================================================
                Yii::$app->session->setFlash('FormSubmitted', '2');

                return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 'id_fmt' => $id_fmt,
                                'id_version' => $id_version,
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta,
                                'id_capitulo' => $id_capitulo,
                                'id_prta' => $id_prta,
                                'id_rpta' => $id_rpta,
                                'numerar' => $numerar,
                                'nom_prta' => $nom_prta,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista,
                                'migadepan' => $migadepan,
                                'focus' => $focus, 
                                'fuentes' => $fuentes,
                                ]);
            }
        } elseif ($modelE['create'] == 'Ajax') {
            return $this->renderAjax('create', [
                        '_ajax' => true,
                        'model' => $model,
                        'id_fmt' => $id_fmt,
                        'id_version' => $id_version,
                        'id_conj_prta' => $id_conj_prta,
                        'id_cnj_rpta' => $id_cnj_rpta,
                        'id_capitulo' => $id_capitulo,
                        'id_prta' => $id_prta,
                        'id_rpta' => $id_rpta,
                        'numerar' => $numerar,
                        'nom_prta' => $nom_prta,
                        'estado' => $estado,
                        'capitulo' => $capitulo,
                        'cantones' => $cantones,
                        'provincia' => $provincia,
                        'parroquias' => $parroquias,
                        'periodos' => $periodos,
                        'antvista' => $antvista,
                        'migadepan' => $migadepan,
                        'botton' => $_boton,
                        'focus' => $focus,
                        'fuentes' => $fuentes,
						
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id_fmt' => $id_fmt,
                'id_version' => $id_version,
                'id_conj_prta' => $id_conj_prta,
                'id_cnj_rpta' => $id_cnj_rpta,
                'id_capitulo' => $id_capitulo,
                'id_prta' => $id_prta,
                'id_rpta' => $id_rpta,
                'numerar' => $numerar,
                'nom_prta' => $nom_prta,
                'estado' => $estado,
                'capitulo' => $capitulo,
                'cantones' => $cantones,
                'provincia' => $provincia,
                'parroquias' => $parroquias,
                'periodos' => $periodos,
                'antvista' => $antvista,
                'migadepan' => $migadepan,
                'botton' => $_boton,
                'focus' => $focus,
		'fuentes' => $fuentes,	
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo FdCaudalAguaPublicos.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  FdCaudalAguaPublicosControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_caudal_agua_publicos]);
            
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
     * Modifica un dato existente en el modelo FdCaudalAguaPublicos asociadas a un formato
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdatedetcapitulo($id, $id_fmt, $id_version, $id_conj_prta, $id_cnj_rpta, $id_capitulo, $id_prta, $id_rpta, $nom_prta, $numerar, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista, $focus,$fuentes)
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
        
        $facade = new FdCaudalAguaPublicosControllerFachada();
        $modelE = $facade->actionUpdate($id, Yii::$app->request->post(), Yii::$app->request->isAjax);
        $model = $modelE['model'];
		
        
		
		if ($modelE['update'] == 'True') {
            //Buscando Tipo de Pregunta ===============================================================================
            $_modelprta = FdPregunta::findOne($id_prta);
            $caracteristica = $_modelprta->caracteristica_preg;

            /*if ($caracteristica == 'M') {
                $redireccionar_a = 'indexdetcapitulo';
            } else {
                $redireccionar_a = $migadepan;
            }*/
            $redireccionar_a = 'indexdetcapitulo';

            Yii::$app->session->setFlash('FormSubmitted', '2');

            return  $this->redirect(['progress', 'urlroute' => $redireccionar_a, 'id_fmt' => $id_fmt,
                                'id_version' => $id_version,
                                'id_conj_prta' => $id_conj_prta,
                                'id_cnj_rpta' => $id_cnj_rpta,
                                'id_capitulo' => $id_capitulo,
                                'id_prta' => $id_prta,
                                'id_rpta' => $id_rpta,
                                'numerar' => $numerar,
                                'nom_prta' => $nom_prta,
                                'estado' => $estado,
                                'capitulo' => $capitulo,
                                'cantones' => $cantones,
                                'provincia' => $provincia,
                                'parroquias' => $parroquias,
                                'periodos' => $periodos,
                                'antvista' => $antvista,
                                'migadepan' => $migadepan,
                                'focus' => $focus,
                                'fuentes' => $fuentes,
				]);
        } elseif ($modelE['update'] == 'Ajax') {
            return $this->renderAjax('update', [
                        '_ajax' => true,
                        'model' => $model,
                        'id_fmt' => $id_fmt,
                        'id_version' => $id_version,
                        'id_conj_prta' => $id_conj_prta,
                        'id_cnj_rpta' => $id_cnj_rpta,
                        'id_capitulo' => $id_capitulo,
                        'id_prta' => $id_prta,
                        'id_rpta' => $id_rpta,
                        'numerar' => $numerar,
                        'nom_prta' => $nom_prta,
                        'estado' => $estado,
                        'capitulo' => $capitulo,
                        'cantones' => $cantones,
                        'provincia' => $provincia,
                        'parroquias' => $parroquias,
                        'periodos' => $periodos,
                        'antvista' => $antvista,
                        'migadepan' => $migadepan,
                        'botton' => $_boton,
                        'focus' => $focus,
                        'fuentes' => $fuentes,

            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'id_fmt' => $id_fmt,
                'id_version' => $id_version,
                'id_conj_prta' => $id_conj_prta,
                'id_cnj_rpta' => $id_cnj_rpta,
                'id_capitulo' => $id_capitulo,
                'id_prta' => $id_prta,
                'id_rpta' => $id_rpta,
                'numerar' => $numerar,
                'nom_prta' => $nom_prta,
                'estado' => $estado,
                'capitulo' => $capitulo,
                'cantones' => $cantones,
                'provincia' => $provincia,
                'parroquias' => $parroquias,
                'periodos' => $periodos,
                'antvista' => $antvista,
                'migadepan' => $migadepan,
                'botton' => $_boton,
                'focus' => $focus,
                'fuentes' => $fuentes,
            ]);
        }
    }


    /**
     * Deletes an existing FdCaudalAguaPublicos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id, $id_fmt, $id_version, $id_conj_prta, $id_cnj_rpta, $id_capitulo, $id_prta, $id_rpta, $nom_prta, $numerar, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista, $focus,$fuentes)
    {        
        $facade =  new FdCaudalAguaPublicosControllerFachada();
        $facade->actionDeletep($id);

        $_savecantregistros = $this->addCantregistro($id_rpta, '2');

        return $this->redirect(['indexdetcapitulo', 'id_fmt' => $id_fmt,
                            'id_version' => $id_version,
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta,
                            'id_capitulo' => $id_capitulo,
                            'id_prta' => $id_prta,
                            'id_rpta' => $id_rpta,
                            'numerar' => $numerar,
                            'nom_prta' => $nom_prta,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos,
                            'antvista' => $antvista,
                            'migadepan' => $migadepan,
                            'focus' => $focus, 
                            'fuentes' => $fuentes,
                            ]);
    }
    
    /*Funcion que aumenta o disminuye la cantidad de registro en la tabla fd_respuesta
    * @id_rpta => id de la respuesta que se va a afectar
    * @tipo => '1' aumenta, '2' disminuye
    */
    protected function addCantregistro($id_rpta, $tipo)
    {
        $modelrpta = FdRespuesta::findOne($id_rpta);

        if ($tipo == 1) {
            $cant_registro = $modelrpta->cantidad_registros;
            ++$cant_registro;

            $modelrpta->cantidad_registros = $cant_registro;

            if ($modelrpta->save()) {
                return true;
            } else {
                return false;
            }
        } else {
            $cant_registro = $modelrpta->cantidad_registros;
            $cant_registro = $cant_registro - 1;

            $modelrpta->cantidad_registros = $cant_registro;

            if ($modelrpta->save()) {
                return true;
            } else {
                return false;
            }
        }
    }
	
	
	
	///Busquedas para pronvicias, cantones y parroquias
        public function actionListado($id){
            $html="";    

            $cantonesPost=Cantones::find()
                          ->where(['=', 'cantones.cod_provincia', $id])
                          ->all();

            $html.="<option value=''>Seleccione un Canton</option>"; 

            if(count($cantonesPost)>0){
             foreach($cantonesPost AS $clave){
                 $html .= "<option value='".$clave->cod_canton."'>".$clave->nombre_canton."</option>";
             }
            }else{
                  $html .="<option value=''></option>";
            }  

            echo $html;
        }
	
	public function actionListadopd($id_prov,$id){

        $variable1="";
       
        $variable1.="<option value=''>Seleccione una Parroquia</option>"; 
        
        $parroquiasPost= Parroquias::find()
        ->where(['=', 'parroquias.cod_canton', $id])
        ->andwhere(['=', 'parroquias.cod_provincia', $id_prov])
        ->all();
        
         if(count($parroquiasPost)>0){
            foreach($parroquiasPost AS $clave){
                $variable1.="<option value='".$clave->cod_parroquia."'>".$clave->nombre_parroquia."</option>";
            }
        
        }else{
            $variable1.="<option value=''></option>";
        }  
       
        echo $variable1;
        
    }



    
}
