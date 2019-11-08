<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\controllers\wiki\ProyectosControllerFachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;


//Se organizan los modelos a utilizar, en este caso se trabajara con dos modelos Proyectos y ciudadesproyectos
use common\models\wiki\Proyectos;
use common\models\wiki\ProyectosSearch;
use common\models\wiki\Ciudadesproyectos;

/**
 * ProyectosControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Proyectos.
 */
class ProyectosControllerFachada extends ProyectosControllerFachadaPry
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors();
    }


	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/

	public function actionProgress($urlroute=null,$id=null){


            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='text-align:center'>Guardando</div>";
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
            return $progressbar;
	}



    /**
     * Listado todos los datos del modelo Proyectos que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
        $searchModel = new ProyectosSearch();
        $dataProvider = $searchModel->search($queryParams);


        return [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
                ];
    }

    /**
     * Presenta un dato unico en el modelo Proyectos.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
            return $this->findModel($id);

    }

    /**
     * Crea un nuevo dato sobre el modelo Proyectos .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     * Indicaciones para guardar multiples record en un modelo:  Este ejemplo llama a dos modelos
     * Proyectos  y ciudadesproyectos
     * Un proyecto puede estar asociado a varias ciudades
     * al momento de guardar se debe redeclarar el modelo sobre el cual se guardaran varios registros en el este caso ciudadesproyectos
     */
    public function actionCreate()
    {
        $model = new Proyectos();
        $model2 = new Ciudadesproyectos();                  //Se agrega modelo 2 con ciudad proyectos

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {    //se carga el modelo2 los datos obtenidos del formulario asociados a model2


                if($model->save())                          //Si se obtiene guardado del proyecto se procede a sacar el Id del proyecto crado
                {
                        $proyecto=$model->Id;               //Id del proyecto que se acabo de crear
                        $ciudades=$model2->ciudad_id;       //vector de ciudades que envia el combobox de seleccion multiple

                        foreach($ciudades as $clave){

                            $model_temp = new Ciudadesproyectos();      //Modelo temporal para guardar en la tabla ciudadesproyectos
                            $model_temp->proyecto_id = $proyecto;
                            $model_temp->ciudad_id = $clave;
                            $model_temp->save();

                        }

                        Yii::$app->session->setFlash('FormSubmitted','2');

                        return [                                        //Se retornan ambos modelos
                            'model' => $model,
                            'model2'=> $model2,
                            'create' => 'True'
                        ];

                }else{
                        return [
                            'model' => $model,
                            'model2'=> $model2,                        //Se agrega model2
                            'create' => 'False'
                        ];
                }

        }elseif (Yii::$app->request->isAjax) {

                return [
                    'model' => $model,
                    'model2'=> $model2,                              //Se agrega model2
                    'create' => 'Ajax'
                ];

        }else {

                 return [
                    'model' => $model,
                    'model2'=> $model2,                              //Se agrega model2
                    'create' => 'False'
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo Proyectos.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * Se agrega la funcion findModel2 que buscara la ciudades asociadas al proyecto y las enviara al formulario update, estas ciudades deben ser enviadas
     * en modelo vector
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model2 = $this->findModel2($id);                           //Se agrega model2 que llega de findModel2, se envia el id del proyecto para busqueda de ciudades asociadas

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {    //se cargan los datos asociadas al id del proyecto enel modelo1 y modelo2 segun corresponda

                if($model->save()){                                                         //se guardan los datos del modelo1 enviados por el usuario desde el formulario

                        $proyecto=$model->Id;                                               //se captura el id del proyecto que el cliente seleccion y envio para modificar
                        $ciudades=(!empty($model2->ciudad_id))? implode(",",$model2->ciudad_id):""; //se convierte en string las ciudades seleccionadas por el cliente para enviar a funcion
                        $this->updateciudades($proyecto,$ciudades);                         //se ejecuta funcion updateciudades la cual revisara si el cliente quito ciduades, agrego ciudes o no hubieron cambios
                }

                Yii::$app->session->setFlash('FormSubmitted','1');
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'update' => 'True'
                ];
        }
         elseif (Yii::$app->request->isAjax) {

                return [
                    'model' => $model,
                    'model2' => $model2,
                    'update' => 'Ajax'
                ];

        }
        else {
                return [
                   'model' => $model,
                   'model2' => $model2,
                   'update' => 'False'
               ];
        }
    }

    /**
     * Deletes an existing Proyectos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Finds the Proyectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Proyectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
          if (($model = Proyectos::findOne($id)) !== null) {
                return $model;
          } else {
                throw new NotFoundHttpException('The requested page does not exist.');
          }
    }


    /***
     *
     * Funcion para buscar las ciudades asociadas al proyecto
     @id->id del proyecto seleccionado por el usuario
     *      */
    protected function findModel2($id)
    {
        $model2= new Ciudadesproyectos();           //Se agrega modelo vacio
        $v_model=array();                           //se crea variable tipo array para desarrollo de la funcion
        $_sql= Ciudadesproyectos::find()
                ->select(['ciudad_id'])
                ->where(['=', 'proyecto_id', $id])
                ->all();                            //Se realiza busqueda de ciudades asociadas al proyecto en la tabla ciudadesproyecto

        /*Se transforma en vector con posicion de 0 a n para pasarlo al combobox*/
        if(count($_sql)>0){

                foreach($_sql as $_clave){
                    $v_model[]=$_clave->ciudad_id;      //se llena vector con las ciudades obtenidas de la consulta
                }

                $model2->ciudad_id=$v_model;            //se envia vector de ciudades asociadas al campo ciudad_id para el combobox recordar que este recibe los datos en vector
                return $model2;                         //se retorna el modelo si hay ciudades asocidas
        }else{

            return $model2;                             //se retorna el modelo vacio si no hay ciudade asociadas
               //throw new NotFoundHttpException('The requested page does not exist.');
       }
    }


    /*Funcion para modificar registros en la tabla ciudades*/
    protected function updateciudades($proyecto,$ciudades){


        //1 se debe realizar consulta para saber si las ciudades ya existian, si ya esistian no se hace nada
        $_ciudades=explode(",",$ciudades);
        $_model=array();
        $_sql= Ciudadesproyectos::find()
                ->select(['ciudad_id'])
                ->where(['=', 'proyecto_id', $proyecto])
                ->all();


        /*Posibles casos de cambios al dar update a ciudades
         * Caso 1: Existen ciudades asociadas al proyecto y el usuario envio ciudades seleccionadas
         * Caso 2: No hay ciudades asociadas al proyecto y se van a asociar por primera vez
         * Caso 3: Existen ciudades asociadas pero se quieren eliminar todas
         */

        if(count($_sql)>0 and count($_ciudades)>0){              //Existen ciudades asociadas al proyecto y el usuario envio ciudades seleccionadas

            foreach($_sql as $_clave){
                $_model[]=$_clave->ciudad_id;                   //se crea vector con las ciudades que estan asociadas al proyecto en BD
            }

            //Buscando ciudad el vector $_model==================================================
            foreach($_ciudades as $_clave2){

                if (in_array($_clave2, $_model)===FALSE) {    //Si la ciudad que el lciente selecciono no se encuentra aun asociada en BD se guarda
                    $model_c=new Ciudadesproyectos();
                    $model_c->proyecto_id=$proyecto;
                    $model_c->ciudad_id=$_clave2;
                    $model_c->save();
                }
            }


            //Borrando ciudades que salieron del modelo=========================================
            $_erase = array_diff($_model, $_ciudades);      //Si existen ciudades que el cliente deselecciono se borran
            if(!empty($_erase)){


                foreach($_erase as $_clave3){
                    $_sql2 = Ciudadesproyectos::deleteAll('proyecto_id = :proyecto AND ciudad_id = :ciudad',
                            [':proyecto' => $proyecto, ':ciudad' => $_clave3]);
                }

            }

            return TRUE;            //se retorna TRUE

        }else if(count($_sql)==0 and count($_ciudades)>0){           //No hay ciudades asociadas al proyecto y se van a asociar por primera vez

            foreach($_ciudades as $_clave2){

                if (in_array($_clave2, $_model)===FALSE) {

                    $model_c=new Ciudadesproyectos();
                    $model_c->proyecto_id=$proyecto;
                    $model_c->ciudad_id=$_clave2;
                    $model_c->save();

                }

            }

            return TRUE;

        }else if(count($_sql)>0 and count($_ciudades)==0){       //Existen ciudades asociadas pero el cliente quiere desasociar todas

            foreach($_sql as $_clave3){

                    $_sql2 = Ciudadesproyectos::deleteAll('proyecto_id = :proyecto AND ciudad_id = :ciudad',
                            [':proyecto' => $proyecto, ':ciudad' => $_clave3->ciudad_id]);

            }
            return TRUE;
        }




    }
}
