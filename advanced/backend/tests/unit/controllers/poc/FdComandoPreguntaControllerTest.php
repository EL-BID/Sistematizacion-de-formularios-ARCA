<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdComandoPreguntaController;


/**
 * FdComandoPreguntaControllerTest implementa las acciones a través del sistema CRUD para el modelo FdComandoPregunta.
 */
class FdComandoPreguntaControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdComandoPreguntaController('FdComandoPreguntaController','backend\controllers\poc\FdComandoPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdComandoPreguntaController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdComandoPreguntaController('FdComandoPreguntaController','backend\controllers\poc\FdComandoPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdComandoPreguntaController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdcomandopregunta/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdComandoPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdComandoPreguntaController('FdComandoPreguntaController','backend\controllers\poc\FdComandoPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdComandoPreguntaController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdComandoPreguntaSearch' => [
                                             'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",       
                                              'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdComandoPreguntaController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdComandoPreguntaController('FdComandoPreguntaController','backend\controllers\poc\FdComandoPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdComandoPreguntaController', $tester);
        
        // se deben declarar los valores de $id_comando, $id_pregunta para enviar la llave
        
                        $id_comando = 'valor adecuado para el tipo de dato del paramtero $id_comando';
                         $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id_comando, $id_pregunta             
            $actionView=Yii::$app->runAction('FdComandoPreguntaController/view',['id_comando' => $id_comando, '$id_pregunta' =>  $id_pregunta]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdComandoPreguntaController('FdComandoPreguntaController','backend\controllers\poc\FdComandoPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdComandoPreguntaController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdComandoPreguntaController' => [
                                             'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",       
                                              'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdComandoPreguntaController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id_comando, $id_pregunta)
    {
        //Se declara el objeto a verificar
        $tester = new  FdComandoPreguntaController('FdComandoPreguntaController','backend\controllers\poc\FdComandoPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdComandoPreguntaController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdComandoPreguntaController' => [
                                         'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",       
                                          'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id_comando, $id_pregunta para enviar la llave
                         $id_comando = 'valor adecuado para el tipo de dato del paramtero $id_comando';
                         $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdComandoPreguntaController/update',['id_comando' => $id_comando, '$id_pregunta' =>  $id_pregunta]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id_comando, $id_pregunta)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdComandoPreguntaController('FdComandoPreguntaController','backend\controllers\poc\FdComandoPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdComandoPreguntaController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id_comando = 'valor adecuado para el tipo de dato del paramtero $id_comando';
                         $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdComandoPreguntaController/update',['id_comando' => $id_comando, '$id_pregunta' =>  $id_pregunta]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
