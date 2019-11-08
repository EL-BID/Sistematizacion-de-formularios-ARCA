<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\controllers\AplicativonewControllerFachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

//Agregando Modelos
use frontend\models\wiki\Cantones_new;                   //Se agrega modelo cantones
use frontend\models\wiki\Parroquias_new;                 //Se agrega modelo parroquias
use frontend\models\wiki\Admestado_new;                  //Se agrega modelo Admestado
use frontend\models\wiki\Trperiodo_new;                  //Se agrega modelo Trperiodo
use frontend\models\wiki\Provinciasnew;                  //Se agrega modelo Provincias

/**
 * ProvinciasControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Provincias.
 */
class AplicativonewControllerFachada extends AplicativonewControllerFachadaPry
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors();
    }




    /**
     * Esta accion nos lleva al index y envia en un primer acceso el array para la grilla vacio y ademas pasa la list de valores de provincias
	 * segun usuario conectado
     * @return mixed
     */
    public function actionIndex()
    {
            $dataProvider = "";
            $user_login=(isset(Yii::$app->user->identity->username))? Yii::$app->user->identity->username:'';

            $provinciasPost = Yii::$app->db2->createCommand('SELECT provincias.* '
                                . 'FROM provincias '
                                . 'INNER JOIN entidades ON entidades.cod_provincia=provincias.cod_provincia '
                                . 'INNER JOIN regionentidades ON regionentidades.id_entidad=entidades.id_entidad '
                                . 'INNER JOIN region ON region.cod_region=regionentidades.cod_region '
                                . 'INNER JOIN perfil_region ON perfil_region.cod_region=region.cod_region '
                                . 'INNER JOIN usuarios_ap ON usuarios_ap.id_usuario=perfil_region.id_usuario '
                                . 'WHERE usuarios_ap."login"=:usuario ')
                                ->bindValue(':usuario',$user_login)
                                ->queryAll();

            $list   = ArrayHelper::map($provinciasPost,'cod_provincia','nombre_provincia');


            return [
                'dataProvider' => $dataProvider,'list' => $list
            ];
    }


    /* Esta accion envia los datos a la grilla a tráves de una consulta por createCommand
     */
    public function actionGrilla($provincia,$cantones,$parroquias,$formato,$periodos,$estado)
    {
       /*$provincia=1;
       $cantones=1;
       $parroquias=2;
       $formato=1;
       $periodos=1;
       $estado=1;*/


        $grillaPost = Yii::$app->db2->createCommand('SELECT fd_conjunto_respuesta.id_conjunto_respuesta,'
                    . 'fd_conjunto_respuesta.id_conjunto_pregunta,'
                    . 'entidades.nombre_entidad,fd_formato.nom_formato,fd_adm_estado.nom_adm_estado,'
                    . 'fd_formato.id_formato,fd_formato.ult_id_version,fd_formato.id_tipo_view_formato '
                    . 'FROM fd_conjunto_respuesta '
                    . 'LEFT JOIN entidades ON entidades.id_entidad=fd_conjunto_respuesta.id_entidad '
                    . 'LEFT JOIN fd_formato ON fd_formato.id_formato=fd_conjunto_respuesta.id_formato '
                    . 'LEFT JOIN fd_adm_estado ON fd_adm_estado.id_adm_estado=fd_conjunto_respuesta.ult_id_adm_estado '
                    . 'WHERE entidades.cod_canton=:cantones '
                    . 'AND entidades.cod_provincia=:provincia '
                    . 'AND entidades.cod_parroquia=:parroquias '
                    . 'AND fd_conjunto_respuesta.id_formato=:formato '
                    . 'AND fd_conjunto_respuesta.id_periodo=:periodos '
                    . 'AND fd_conjunto_respuesta.ult_id_adm_estado=:estado')
                    ->bindValue(':cantones',$cantones)
                    ->bindValue(':parroquias', $parroquias)
                    ->bindValue(':formato', $formato)
                    ->bindValue(':provincia', $provincia)
                    ->bindValue(':periodos', $periodos)
                    ->bindValue(':estado', $estado)
                    ->queryAll();

         Yii::trace('error practica gilla'.$provincia."&cantones=".$cantones."&parroquias=".$parroquias."&formato=".$formato."&periodos=".$periodos."&estado=".$estado, 'DEBUG');

        $datos = new ArrayDataProvider([
                   'allModels' => $grillaPost,
                   'pagination' => [
                       'pageSize' => 10,
                   ],
                   'sort' => [
                       'attributes' => ['nombre_entidad', 'nom_formato','nom_adm_estado'],
                   ],
               ]);

        return $datos;
    }

    /*Listado de cantones segun provincia seleccionada => Este ejemplo se hace con find()*/
    public function actionListado($id){

       $html="";
       $user_login=(isset(Yii::$app->user->identity->username))? Yii::$app->user->identity->username:'';
       $cantonesPost=Cantones_new::find()
                        ->innerJoin('entidades', 'entidades.cod_canton=cantones.cod_canton')
                        ->innerJoin('regionentidades', 'regionentidades.id_entidad=entidades.id_entidad')
                        ->innerJoin('region', 'region.cod_region=regionentidades.cod_region')
                        ->innerJoin('perfil_region', 'perfil_region.cod_region=region.cod_region')
                        ->innerJoin('usuarios_ap', 'usuarios_ap.id_usuario=perfil_region.id_usuario')
                        ->where(['=', 'cantones.cod_provincia', $id])
                        ->andwhere(['=', 'usuarios_ap.login', $user_login])
                        ->all();

       if(count($cantonesPost)>0){
        foreach($cantonesPost AS $clave){
            $html .= "<option value='".$clave->cod_canton."'>".$clave->nombre_canton."</option>";
        }
       }else{
             $html .="<option value=''></option>";
       }

       return $html;



    }


    /*Listado de parroquias segun canton seleccionado el ejemplo se hace a través del modelo*/

    public function actionListadop($id){

        $html="";
        $modelo = new Parroquias_new();
        $cantonesPost= $modelo->getParroquiasD($id);

       if(count($cantonesPost)>0){
        foreach($cantonesPost AS $clave){
            $html.="<option value='".$clave->cod_parroquia."'>".$clave->nombre_parroquia."</option>";
        }
       }else{
           $html.="<option value=''></option>";
       }

       return $html;

    }


     public function actionListadoe($id){

        $variable1="";
        $estadosPost=Admestado_new::find()
        ->leftJoin('fd_modulo', 'fd_modulo.id_modulo=fd_adm_estado.id_modulo')
        ->leftJoin('fd_formato', 'fd_formato.id_modulo=fd_modulo.id_modulo')
        ->where(['=', 'fd_formato.id_formato', $id])
        ->all();

        if(count($estadosPost)>0){
            foreach($estadosPost AS $clave){
                $variable1.="<option value='".$clave->id_adm_estado."'>".$clave->nom_adm_estado."</option>";
            }

        }else{
            $variable1.="<option value=''></option>";
        }

        $variable1.="::";

        $periodosPost=Trperiodo_new::find()
        ->leftJoin('fd_periodo_formato', 'fd_periodo_formato.id_periodo=tr_periodo.id_periodo')
        ->leftJoin('fd_formato', 'fd_formato.id_formato=fd_periodo_formato.id_formato')
        ->where(['=', 'fd_formato.id_formato', $id])
        ->all();

         if(count($periodosPost)>0){
            foreach($periodosPost AS $clave){
                $variable1.="<option value='".$clave->id_periodo."'>".$clave->nom_periodo."</option>";
            }

        }else{
            $variable1.="<option value=''></option>";
        }

        return $variable1;

    }




}
