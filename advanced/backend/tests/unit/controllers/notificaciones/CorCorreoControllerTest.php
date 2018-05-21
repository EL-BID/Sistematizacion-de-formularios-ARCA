<?php

namespace backend\tests\unit\controllers\notificaciones;

use Yii;
use backend\controllers\notificaciones\CorCorreoController;


/**
 * CorCorreoControllerTest implementa las acciones a través del sistema CRUD para el modelo CorCorreo.
 */
class CorCorreoControllerTest extends \Codeception\Test\Unit
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
        $tester = new  CorCorreoController('CorCorreoController','backend\controllers\notificaciones\CorCorreoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\notificaciones\CorCorreoController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  CorCorreoController('CorCorreoController','backend\controllers\notificaciones\CorCorreoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\notificaciones\CorCorreoController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/corcorreo/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo CorCorreo que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CorCorreoController('CorCorreoController','backend\controllers\notificaciones\CorCorreoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\notificaciones\CorCorreoController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['CorCorreoSearch' => [
                                             'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",       
                                              'nom_correo' => "Ingresar valor de pruebas para el campo nom_correo de tipo varchar",       
                                              'asunto' => "Ingresar valor de pruebas para el campo asunto de tipo varchar",       
                                              'cuerpo' => "Ingresar valor de pruebas para el campo cuerpo de tipo text",       
                                              'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('CorCorreoController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  CorCorreoController('CorCorreoController','backend\controllers\notificaciones\CorCorreoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\notificaciones\CorCorreoController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('CorCorreoController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CorCorreoController('CorCorreoController','backend\controllers\notificaciones\CorCorreoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\notificaciones\CorCorreoController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['CorCorreoController' => [
                                             'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",       
                                              'nom_correo' => "Ingresar valor de pruebas para el campo nom_correo de tipo varchar",       
                                              'asunto' => "Ingresar valor de pruebas para el campo asunto de tipo varchar",       
                                              'cuerpo' => "Ingresar valor de pruebas para el campo cuerpo de tipo text",       
                                              'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('CorCorreoController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  CorCorreoController('CorCorreoController','backend\controllers\notificaciones\CorCorreoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\notificaciones\CorCorreoController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['CorCorreoController' => [
                                         'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",       
                                          'nom_correo' => "Ingresar valor de pruebas para el campo nom_correo de tipo varchar",       
                                          'asunto' => "Ingresar valor de pruebas para el campo asunto de tipo varchar",       
                                          'cuerpo' => "Ingresar valor de pruebas para el campo cuerpo de tipo text",       
                                          'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('CorCorreoController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  CorCorreoController('CorCorreoController','backend\controllers\notificaciones\CorCorreoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\notificaciones\CorCorreoController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(CorCorreoController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
