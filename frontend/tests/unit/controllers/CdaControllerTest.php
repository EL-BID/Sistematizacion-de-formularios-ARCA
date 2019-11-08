<?php

namespace frontend\tests\unit\controllers;

use Yii;
use frontend\controllers\CdaController;


/**
 * CdaControllerTest implementa las acciones a través del sistema CRUD para el modelo Cda.
 */
class CdaControllerTest extends \Codeception\Test\Unit
{
    public function _before()
    {
       // declaraciones y asignacion de valores que se deben tener para realizar las funciones test
    }

                                                               
                                                                                             
    protected function _after()                                                              
    {             
            // funcion que se ejecuta despues de los test                                                      
    }                
   
    
    public function testBehaviors()
    {
        //Se declara el objeto a verificar
        $tester = new  CdaController('CdaController','frontend\controllers\CdaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\CdaController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  CdaController('CdaController','frontend\controllers\CdaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\CdaController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/cda/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaController('CdaController','frontend\controllers\CdaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\CdaController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['CdaSearch' => [
                                             'fecha_ingreso' => "Ingresar valor de pruebas para el campo fecha_ingreso de tipo date",       
                                              'fecha_solicitud' => "Ingresar valor de pruebas para el campo fecha_solicitud de tipo date",       
                                              'tramite_administrativo' => "Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar",       
                                              'id_cproceso_arca' => "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4",       
                                              'id_cproceso_senagua' => "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4",       
                                              'rol_en_calidad' => "Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar",       
                                              'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",       
                                              'id_usuario_enviado_por' => "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo int4",       
                                              'numero_tramites' => "Ingresar valor de pruebas para el campo numero_tramites de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('CdaController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  CdaController('CdaController','frontend\controllers\CdaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\CdaController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('CdaController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaController('CdaController','frontend\controllers\CdaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\CdaController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['CdaController' => [
                                             'fecha_ingreso' => "Ingresar valor de pruebas para el campo fecha_ingreso de tipo date",       
                                              'fecha_solicitud' => "Ingresar valor de pruebas para el campo fecha_solicitud de tipo date",       
                                              'tramite_administrativo' => "Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar",       
                                              'id_cproceso_arca' => "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4",       
                                              'id_cproceso_senagua' => "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4",       
                                              'rol_en_calidad' => "Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar",       
                                              'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",       
                                              'id_usuario_enviado_por' => "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo int4",       
                                              'numero_tramites' => "Ingresar valor de pruebas para el campo numero_tramites de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('CdaController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  CdaController('CdaController','frontend\controllers\CdaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\CdaController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['CdaController' => [
                                         'fecha_ingreso' => "Ingresar valor de pruebas para el campo fecha_ingreso de tipo date",       
                                          'fecha_solicitud' => "Ingresar valor de pruebas para el campo fecha_solicitud de tipo date",       
                                          'tramite_administrativo' => "Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar",       
                                          'id_cproceso_arca' => "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4",       
                                          'id_cproceso_senagua' => "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4",       
                                          'rol_en_calidad' => "Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar",       
                                          'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",       
                                          'id_usuario_enviado_por' => "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo int4",       
                                          'numero_tramites' => "Ingresar valor de pruebas para el campo numero_tramites de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('CdaController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaController('CdaController','frontend\controllers\CdaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\CdaController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(CdaController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
