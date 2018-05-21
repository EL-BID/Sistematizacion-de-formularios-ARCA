<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdCoordenadaController;


/**
 * FdCoordenadaControllerTest implementa las acciones a través del sistema CRUD para el modelo FdCoordenada.
 */
class FdCoordenadaControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdCoordenadaController('FdCoordenadaController','backend\controllers\poc\FdCoordenadaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdCoordenadaController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdCoordenadaController('FdCoordenadaController','backend\controllers\poc\FdCoordenadaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdCoordenadaController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdcoordenada/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdCoordenada que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdCoordenadaController('FdCoordenadaController','backend\controllers\poc\FdCoordenadaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdCoordenadaController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdCoordenadaSearch' => [
                                             'id_coordenada' => "Ingresar valor de pruebas para el campo id_coordenada de tipo int4",       
                                              'x' => "Ingresar valor de pruebas para el campo x de tipo numeric",       
                                              'y' => "Ingresar valor de pruebas para el campo y de tipo numeric",       
                                              'altura' => "Ingresar valor de pruebas para el campo altura de tipo numeric",       
                                              'longitud' => "Ingresar valor de pruebas para el campo longitud de tipo numeric",       
                                              'latitud' => "Ingresar valor de pruebas para el campo latitud de tipo numeric",       
                                              'id_tcoordenada' => "Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdCoordenadaController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdCoordenadaController('FdCoordenadaController','backend\controllers\poc\FdCoordenadaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdCoordenadaController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdCoordenadaController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdCoordenadaController('FdCoordenadaController','backend\controllers\poc\FdCoordenadaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdCoordenadaController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdCoordenadaController' => [
                                             'id_coordenada' => "Ingresar valor de pruebas para el campo id_coordenada de tipo int4",       
                                              'x' => "Ingresar valor de pruebas para el campo x de tipo numeric",       
                                              'y' => "Ingresar valor de pruebas para el campo y de tipo numeric",       
                                              'altura' => "Ingresar valor de pruebas para el campo altura de tipo numeric",       
                                              'longitud' => "Ingresar valor de pruebas para el campo longitud de tipo numeric",       
                                              'latitud' => "Ingresar valor de pruebas para el campo latitud de tipo numeric",       
                                              'id_tcoordenada' => "Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdCoordenadaController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdCoordenadaController('FdCoordenadaController','backend\controllers\poc\FdCoordenadaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdCoordenadaController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdCoordenadaController' => [
                                         'id_coordenada' => "Ingresar valor de pruebas para el campo id_coordenada de tipo int4",       
                                          'x' => "Ingresar valor de pruebas para el campo x de tipo numeric",       
                                          'y' => "Ingresar valor de pruebas para el campo y de tipo numeric",       
                                          'altura' => "Ingresar valor de pruebas para el campo altura de tipo numeric",       
                                          'longitud' => "Ingresar valor de pruebas para el campo longitud de tipo numeric",       
                                          'latitud' => "Ingresar valor de pruebas para el campo latitud de tipo numeric",       
                                          'id_tcoordenada' => "Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdCoordenadaController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdCoordenadaController('FdCoordenadaController','backend\controllers\poc\FdCoordenadaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdCoordenadaController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdCoordenadaController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
