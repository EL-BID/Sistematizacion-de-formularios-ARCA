<?php

namespace frontend\controllers\wiki;

use Yii;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use common\general\documents\genPDF;

/**
 * CorParametroController implementa las acciones a través del sistema CRUD para el modelo CorParametro.
 */
class DocumentopdfController extends ControllerPry
{
  //private $facade =    CorParametroControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  DocumentopdfControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  DocumentopdfControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }


    /**
     * Crea un nuevo dato sobre el modelo CorParametro .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        
//            $pdf = Yii::$app->pdf;
//    $pdf->content = 'madre foca';
//    return $pdf->render();
         
        $datos=[];
        $GeneraPdf = new genPDF();
        $retorno="";
        $propiedades=array('formato'=>Yii::$app->request->post('formato'),'destino'=>Yii::$app->request->post('destino'));
        if(trim(Yii::$app->request->post('destino'))=='F'){
            $nombre='documentos\\pdf\\'.Yii::$app->request->post('nombre');
            $datos=['descarga'=>$nombre];
        }
        else{
            $nombre=Yii::$app->request->post('nombre');
        }
        if(Yii::$app->request->post('nombre')){
            $retorno=$GeneraPdf->generadorPDF(Yii::$app->request->post('contenido'),$nombre,$propiedades);
          
        }
          $datos['pdf']=$retorno;
          return $this->render('/wiki/documentopdf/createpdf', [
                'datos' =>$datos,
          ]);
        
    }

    
}
