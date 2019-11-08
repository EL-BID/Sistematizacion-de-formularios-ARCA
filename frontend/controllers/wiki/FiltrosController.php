<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\models\wiki\Cantones;                   //Se agrega modelo cantones
use frontend\models\wiki\Parroquias;                 //Se agrega modelo parroquias
use frontend\models\wiki\Admestado;                  //Se agrega modelo Admestado
use frontend\models\wiki\Trperiodo;                  //Se agrega modelo Trperiodo
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



/**
 * Controlador para el sistema service REST
 */

class FiltrosController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /*Listado de cantones segun provincia seleccionada*/

    public function actionListado($id){

         $cantonesPost=Cantones::find()
                ->where(["cod_provincia"=>$id])
                ->all();

       if(count($cantonesPost)>0){
        foreach($cantonesPost AS $clave){
            echo "<option value='".$clave->cod_canton."'>".$clave->nombre_canton."</option>";
        }
       }else{
           "<option value=''></option>";
       }

    }

    /*Listado de parroquias segun cantones  seleccionada*/

    public function actionListadop($id){

        $cantonesPost=Parroquias::find()
                ->where(["cod_canton"=>$id])
                ->all();

       if(count($cantonesPost)>0){
        foreach($cantonesPost AS $clave){
            echo "<option value='".$clave->cod_parroquia."'>".$clave->nombre_parroquia."</option>";
        }
       }else{
           "<option value=''></option>";
       }

    }


     public function actionListadoe($id){

        $variable1="";
        $estadosPost=Admestado::find()
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

        $periodosPost=Trperiodo::find()
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

        echo $variable1;

    }

}