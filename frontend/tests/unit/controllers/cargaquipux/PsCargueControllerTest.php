<?php

namespace frontend\tests\unit\controllers\cargaquipux;

use Yii;
use frontend\controllers\cargaquipux\PsCargueController;


/**
 * PsCargueControllerTest implementa las acciones a través del sistema CRUD para el modelo PsCargue.
 */
class PsCargueControllerTest extends \Codeception\Test\Unit
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
        $tester = new  PsCargueController('PsCargueController','frontend\controllers\cargaquipux\PsCargueController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cargaquipux\PsCargueController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  PsCargueController('PsCargueController','frontend\controllers\cargaquipux\PsCargueController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cargaquipux\PsCargueController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/pscargue/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo PsCargue que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsCargueController('PsCargueController','frontend\controllers\cargaquipux\PsCargueController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cargaquipux\PsCargueController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['PsCargueSearch' => [
                                             'id_cargues' => "Ingresar valor de pruebas para el campo id_cargues de tipo int4",       
                                              'ruta' => "Ingresar valor de pruebas para el campo ruta de tipo varchar",       
                                              'procesado' => "Ingresar valor de pruebas para el campo procesado de tipo varchar",       
                                              'fecha_cargue' => "Ingresar valor de pruebas para el campo fecha_cargue de tipo date",       
                                              'fecha_proceso' => "Ingresar valor de pruebas para el campo fecha_proceso de tipo date",       
                                              'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('PsCargueController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  PsCargueController('PsCargueController','frontend\controllers\cargaquipux\PsCargueController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cargaquipux\PsCargueController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('PsCargueController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsCargueController('PsCargueController','frontend\controllers\cargaquipux\PsCargueController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cargaquipux\PsCargueController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['PsCargueController' => [
                                             'id_cargues' => "Ingresar valor de pruebas para el campo id_cargues de tipo int4",       
                                              'ruta' => "Ingresar valor de pruebas para el campo ruta de tipo varchar",       
                                              'procesado' => "Ingresar valor de pruebas para el campo procesado de tipo varchar",       
                                              'fecha_cargue' => "Ingresar valor de pruebas para el campo fecha_cargue de tipo date",       
                                              'fecha_proceso' => "Ingresar valor de pruebas para el campo fecha_proceso de tipo date",       
                                              'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('PsCargueController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  PsCargueController('PsCargueController','frontend\controllers\cargaquipux\PsCargueController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cargaquipux\PsCargueController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['PsCargueController' => [
                                         'id_cargues' => "Ingresar valor de pruebas para el campo id_cargues de tipo int4",       
                                          'ruta' => "Ingresar valor de pruebas para el campo ruta de tipo varchar",       
                                          'procesado' => "Ingresar valor de pruebas para el campo procesado de tipo varchar",       
                                          'fecha_cargue' => "Ingresar valor de pruebas para el campo fecha_cargue de tipo date",       
                                          'fecha_proceso' => "Ingresar valor de pruebas para el campo fecha_proceso de tipo date",       
                                          'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('PsCargueController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsCargueController('PsCargueController','frontend\controllers\cargaquipux\PsCargueController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cargaquipux\PsCargueController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('PsCargueController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
