<?php

namespace frontend\controllers\wiki;

use Yii;
use common\controllers\controllerspry\ControllerPry;
use common\general\documents\genWord;
use yii\db\Query;
use common\models\autenticacion\rol;
use common\models\autenticacion\TipoAcceso;

/**
 * CorParametroController implementa las acciones a través del sistema CRUD para el modelo CorParametro.
 */
class DocumentowordController extends ControllerPry
{
  //private $facade =    CorParametroControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  DocumentowordControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  DocumentowordControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }


   
     
     /**
     * Crea un nuevo dato sobre el modelo CorParametro .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
                 
       

        $datos=[];
        $GeneraWord = new genWord();
        $nombre="";
        
        if(Yii::$app->request->post('nombre')){
            
            if(trim(Yii::$app->request->post('destino'))=='F'){
                $nombre='documentos\\word\\'.Yii::$app->request->post('nombre');
                $datos['descarga']=$nombre;
            }
            else{

                $nombre=Yii::$app->request->post('nombre');
            }
            
            $GeneraWord->generadorWordHTML(Yii::$app->request->post('contenido'),$nombre,Yii::$app->request->post('destino'),Yii::$app->request->post('portada'),trim(Yii::$app->request->post('indice')));
        }
        
          return $this->render('/wiki/documentoword/createword', [
                'datos' =>$datos,
          ]);
        
    }

}
