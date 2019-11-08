<?php

namespace frontend\controllers\hidricos;

use Yii;
use common\models\hidricos\Cda;
use common\models\hidricos\CdaSearch;
use frontend\controllers\hidricos\ModulocdaControllerFachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use frontend\controllers\hidricos\ModulocdaControllerFachada;
/**
 * ModulocdaControllerFachadaTest implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Cda.
 */
class ModulocdaControllerFachadaTest extends \Codeception\Test\Unit
{

    
    public function _before()
    {
       // declaraciones y asignacion de valores que se deben tener para realizar las funciones test
    }

                                                               
                                                                                             
    protected function _after()                                                              
    {             
            // funcion que se ejecuta despues de los test                                                      
    }                
    
 
    /**
     * @inheritdoc
     */
    public function testBehaviors()
    {
        //Se declara el objeto a verificar
        $tester = new  ModulocdaControllerFachada;
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,                                                          
            'Se devolvio vacio behaviors');  
            
        /** caso no exitoso
        $this->assertEmpty($rules,                                                          
            'Se devolvio lleno behaviors '); **/
    }
	
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function testActionProgress(){

     //Se declara el objeto a verificar
        $tester = new  ModulocdaControllerFachada;
     
     // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
      $urlroute='/cda/index';
      $id=null;
     //Se obtiene los valores para la barra de progreso
        $progressbar= $tester->actionProgress($urlroute,$id);
     //Se evalua caso exitoso   
     $this->assertNotEmpty($progressbar,                                                          
        'Se devolvio Vacio el html de actionProgress con el siguiente contenido: '.$progressbar);  
        
     /** Caso no exitoso
        $this->assertEmpty($rules,                                                          
            'Se devolvio lleno ActionProgress '); */
    }

	
	
    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
       //Se declara el objeto a verificar
        $tester = new  ModulocdaControllerFachada;
    
        // Se declaran los $queryParams a enviar
                     $queryParams = array("CdaSearch" =>
                                          array("fecha_ingreso" => "Ingresar valor de pruebas para el campo fecha_ingreso de tipo string")
                        ,
                       
                                           array("fecha_solicitud" => "Ingresar valor de pruebas para el campo fecha_solicitud de tipo string")
                        ,
                       
                                           array("tramite_administrativo" => "Ingresar valor de pruebas para el campo tramite_administrativo de tipo string")
                        ,
                       
                                           array("id_cproceso_arca" => "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo integer")
                        ,
                       
                                           array("id_cproceso_senagua" => "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo integer")
                        ,
                       
                                           array("rol_en_calidad" => "Ingresar valor de pruebas para el campo rol_en_calidad de tipo string")
                        ,
                       
                                           array("id_cda" => "Ingresar valor de pruebas para el campo id_cda de tipo integer")
                        ,
                       
                                           array("id_usuario_enviado_por" => "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo integer")
                                               
                              );
                    /** $queryParams["CdaSearch"]["fecha_ingreso"] = "Ingresar valor de pruebas para el campo fecha_ingreso de tipo string";*/
                    /** $queryParams["CdaSearch"]["fecha_solicitud"] = "Ingresar valor de pruebas para el campo fecha_solicitud de tipo string";*/
                    /** $queryParams["CdaSearch"]["tramite_administrativo"] = "Ingresar valor de pruebas para el campo tramite_administrativo de tipo string";*/
                    /** $queryParams["CdaSearch"]["id_cproceso_arca"] = "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo integer";*/
                    /** $queryParams["CdaSearch"]["id_cproceso_senagua"] = "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo integer";*/
                    /** $queryParams["CdaSearch"]["rol_en_calidad"] = "Ingresar valor de pruebas para el campo rol_en_calidad de tipo string";*/
                    /** $queryParams["CdaSearch"]["id_cda"] = "Ingresar valor de pruebas para el campo id_cda de tipo integer";*/
                    /** $queryParams["CdaSearch"]["id_usuario_enviado_por"] = "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo integer";*/
                     
       
        // Se obtiene el resultado de action index
        $actionindex= $tester->actionIndex($queryParams);
                         
              // se evaluan los casos exitosos
                $this->assertNotNull($actionindex['dataProvider'],                                                          
                    'Se devolvio nullo dataProvider de actionIndex ');  
                $this->assertNotNull($actionindex['searchModel'],                                                          
                    'Se devolvio nullo searchModel de actionIndex '); 
                    

              /** Caso no exitoso
                $this->assertNotNull($actionindex['dataProvider'],                                                          
                    'Se devolvio lleno dataProvider '); 
                $this->assertNull($actionindex['searchModel'],                                                          
                    'Se devolvio lleno searchModel '); */

            }

    /**
     * Presenta un dato unico en el modelo Cda.
     * @param integer $id
     * @return mixed
     */
    public function testActionView()
    {       
       //Se declara el objeto a verificar
        $tester = new  ModulocdaControllerFachada;
    
        // se deben declarar los valores de $id        
        $id        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
             $actionView= $tester->actionView($id);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                                                          
                    'Se devolvio nullo actionView ');  
                    
            /** Caso no exitoso
            $this->assertNull($actionView,                                                          
                    'Se devolvio lleno actionView '); 
            */
 
    }

    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
            //Se declara el objeto a verificar
               $tester = new  ModulocdaControllerFachada;
             
                // Se declaran el post
            Yii::$app->request->post =  array('form' => array(
                                                          array('fecha_ingreso' => 'Ingresar valor de pruebas para el campo fecha_ingreso de tipo string')
                        ,
                       
                                           array('fecha_solicitud' => 'Ingresar valor de pruebas para el campo fecha_solicitud de tipo string')
                        ,
                       
                                           array('tramite_administrativo' => 'Ingresar valor de pruebas para el campo tramite_administrativo de tipo string')
                        ,
                       
                                           array('id_cproceso_arca' => 'Ingresar valor de pruebas para el campo id_cproceso_arca de tipo integer')
                        ,
                       
                                           array('id_cproceso_senagua' => 'Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo integer')
                        ,
                       
                                           array('rol_en_calidad' => 'Ingresar valor de pruebas para el campo rol_en_calidad de tipo string')
                        ,
                       
                                           array('id_cda' => 'Ingresar valor de pruebas para el campo id_cda de tipo integer')
                        ,
                       
                                           array('id_usuario_enviado_por' => 'Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo integer')
                                               
                              ));
            $actionCreate= $this->tester->actionCreate();
            
            // se evaluan los casos exitosos            
            $this->assertNotNull($actionCreate['model'],                                                          
                    'Se devolvio nullo el model de actionCreate');  
            $this->assertNotNull($actionCreate['create'],                                                          
                    'NO ee devolvio nullo el create de actionCreate '); 
           
            /** Caso no exitoso       
            $this->assertNull($actionindex['model'],                                                          
                    'Se devolvio lleno el model actionCreate);  
            $this->assertNull($actionindex['create'],                                                          
                    'NO ee devolvio lleno el create actionCreate '); */
       
    }

    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function testActionUpdate($id)
    {
        $actionCreate= $this->tester->actionCreate();
            $this->assertNotNull($actionCreate['model'],                                                          
                    'Se devolvio correctamente ActionUpdate con el siguiente contenido: '.$actionCreate['model']);  
            $this->assertNotNull($actionCreate['model'],                                                          
                    'NO ee devolvio correctamente ActionUpdate '); 
            $this->assertNotNull($actionindex['create'],                                                          
                    'Se devolvio correctamente ActionUpdate con el siguiente contenido: '.$actionindex['create']);  
            $this->assertNotNull($actionindex['create'],                                                          
                    'NO ee devolvio correctamente ActionUpdate '); 
    }


}
