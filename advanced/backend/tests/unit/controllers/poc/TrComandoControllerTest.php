<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\TrComandoController;


/**
 * TrComandoControllerTest implementa las acciones a través del sistema CRUD para el modelo TrComando.
 */
class TrComandoControllerTest extends \Codeception\Test\Unit
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
        $tester = new  TrComandoController('TrComandoController','backend\controllers\poc\TrComandoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\TrComandoController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  TrComandoController('TrComandoController','backend\controllers\poc\TrComandoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\TrComandoController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/trcomando/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo TrComando que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  TrComandoController('TrComandoController','backend\controllers\poc\TrComandoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\TrComandoController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['TrComandoSearch' => [
                                             'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",       
                                              'nom_comando' => "Ingresar valor de pruebas para el campo nom_comando de tipo varchar",       
                                              'clase_comando' => "Ingresar valor de pruebas para el campo clase_comando de tipo varchar",       
                                              'hash_comando' => "Ingresar valor de pruebas para el campo hash_comando de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('TrComandoController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  TrComandoController('TrComandoController','backend\controllers\poc\TrComandoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\TrComandoController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('TrComandoController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  TrComandoController('TrComandoController','backend\controllers\poc\TrComandoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\TrComandoController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['TrComandoController' => [
                                             'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",       
                                              'nom_comando' => "Ingresar valor de pruebas para el campo nom_comando de tipo varchar",       
                                              'clase_comando' => "Ingresar valor de pruebas para el campo clase_comando de tipo varchar",       
                                              'hash_comando' => "Ingresar valor de pruebas para el campo hash_comando de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('TrComandoController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  TrComandoController('TrComandoController','backend\controllers\poc\TrComandoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\TrComandoController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['TrComandoController' => [
                                         'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",       
                                          'nom_comando' => "Ingresar valor de pruebas para el campo nom_comando de tipo varchar",       
                                          'clase_comando' => "Ingresar valor de pruebas para el campo clase_comando de tipo varchar",       
                                          'hash_comando' => "Ingresar valor de pruebas para el campo hash_comando de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('TrComandoController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  TrComandoController('TrComandoController','backend\controllers\poc\TrComandoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\TrComandoController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(TrComandoController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
