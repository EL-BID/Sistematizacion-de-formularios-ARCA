<?php

namespace frontend\controllers\wiki;

use Yii;
use common\controllers\controllerspry\ControllerPry;
use common\general\documents\genExcel;
use yii\db\Query;
use common\models\autenticacion\rol;
use common\models\autenticacion\TipoAcceso;

/**
 * CorParametroController implementa las acciones a través del sistema CRUD para el modelo CorParametro.
 */
class DocumentoexcelController extends ControllerPry
{
  //private $facade =    CorParametroControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  DocumentoexcelControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  DocumentoexcelControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }


   
     /**
     * Crea un nuevo dato sobre el modelo CorParametro .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionManual()
    {
                 
        $hoja1=array(
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            
        );
        $hoja2=array('data'=>array(
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            array('Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4'),
            
        ));
        
        $model1= new \yii\base\DynamicModel(['Columna1','Columna2','Columna3','Columna4']);
        $model1->load($hoja1); $model1->addRule(['Columna1','Columna2','Columna3','Columna4'], 'safe');
       
        //$model1->load( ['Columna1'=>'Dato1','Columna2'=>'Dato2','Columna3'=>'Dato3','Columna4'=>'Dato4']);
        $model2= new \yii\base\DynamicModel(compact('Columna1','Columna2','Columna3','Columna4'));
        $model2->setAttributes($hoja2);
 
//        $datos=array('hoja1'=> $model1,'hoja2'=>$model2);
        $columnas=array('hoja1'=> array('Columna1','Columna2','Columna3'),'hoja2'=> array('Columna1','Columna4','Columna3'));
//        $encabezados=array('hoja1'=> array('Columna1' => 'Primera Columna','Columna2'=>'Alguna Columna','Columna3'=>' Columna'));
        $GeneraPdf = new genExcel();
        $retorno="";
        
        $parroquias= Rol::find()->all();
        $tipo= TipoAcceso::find()->all();
        $datos=array('hoja1'=> $model1,'hoja2'=>$tipo);
        $columnas=array();
        //$encabezados=array('hoja1'=> array('Columna1' => 'Primera Columna','Columna2'=>'Alguna Columna','Columna3'=>' Columna'));
        //
        
        //$propiedades=array('formato'=>Yii::$app->request->post('formato'),'destino'=>Yii::$app->request->post('destino'));
        if(trim(Yii::$app->request->post('destino'))=='F'){$nombre='documentos\\excel\\'.Yii::$app->request->post('nombre');}
        else{

            $nombre=Yii::$app->request->post('nombre');
        }
    
        $GeneraPdf->generadorExcel($datos,$columnas,$nombre,'D');//,$encabezados);
        

           // $datos='<html><br><input type="text"><hr><table><tr><th><b>Column A</b></th><th>Column B</th></tr><tr><td>Value A</td><td>Value B</td></tr></table></html>';
//        $tablas='<html><br><input type="text"><hr><table><tr><th><b>Column A</b></th><th>Column B</th></tr><tr><td>Value A</td><td>Value B</td></tr></table></html>';
//        $datos=array('hoja1'=> $tablas,'hoja2'=> $tablas,'hoja3'=> $tablas);    
//        $GeneraPdf->generadorExcelHTML($datos,null,$nombre,'D');
          //$datos['excel']=$retorno;
          return $this->render('/wiki/documentoexcel/createexcel', [
                'datos' =>$datos,
          ]);
        
    }

     /**
     * Crea un nuevo dato sobre el modelo CorParametro .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionModel()
    {
                 
        
        if (Yii::$app->request->post('tabla')){
            $connection = \Yii::$app->db;
            $GeneraExcel = new genExcel();
//            $model = $connection->createCommand('SELECT * FROM '.Yii::$app->request->post('tabla'));
//            $consulta = $model->queryAll();
            $consulta=null;
            if (Yii::$app->request->post('tabla') =='rol')
            { $consulta= Rol::find()->all();}
            elseif(Yii::$app->request->post('tabla') =='join'){ $consulta = \common\models\autenticacion\Cantones::find()
            ->joinWith('codProvincia')
            ->all();}
            else{ $consulta= TipoAcceso::find()->all();}
            
            	
    //          Multiple hoja
    //        $data=array('hoja1'=> $consulta1,'hoja2'=>$consulta2);
    //          seleccionar columnas especificas
    //        $columnas=array('hoja1'=> array('Columna1' ,'Columna2','Columna3'),'hoja2'=> array('Columna1' ,'Columna2','Columna3'));
    //           cambiar titulos de encabezado
    //        $encabezados=array('hoja1'=> array('Columna1' => 'Primera Columna','Columna2'=>'Alguna Columna','Columna3'=>' Columna'));
    //        
    //        
            if(trim(Yii::$app->request->post('destino'))=='F'){$nombre='documentos\\excel\\'.Yii::$app->request->post('nombre');}
            else{

                $nombre=Yii::$app->request->post('nombre');
            }

            $GeneraExcel->generadorExcel($consulta,null,$nombre,trim(Yii::$app->request->post('destino')),null);

        }
        $datos=[];
          return $this->render('/wiki/documentoexcel/modelexcel', [
                'datos' =>$datos,
          ]);
        
    }

     /**
     * Crea un nuevo dato sobre el modelo CorParametro .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
                 
       

        $datos=[];
        $GeneraExcel = new genExcel();
        if(trim(Yii::$app->request->post('destino'))=='F'){
            $nombre='documentos\\excel\\'.Yii::$app->request->post('nombre');
            $datos=['descarga'=>$nombre];
            
        }
        else{

            $nombre=Yii::$app->request->post('nombre');
        }
    
         if(Yii::$app->request->post('nombre')){
            $GeneraExcel->generadorExcelHTML(Yii::$app->request->post('contenido'),$nombre,trim(Yii::$app->request->post('destino')));
         }

          return $this->render('/wiki/documentoexcel/createexcel', [
                'datos' =>$datos,
          ]);
        
    }

}
