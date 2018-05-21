<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdPreguntaDescendienteController;


/**
 * FdPreguntaDescendienteControllerTest implementa las acciones a través del sistema CRUD para el modelo FdPreguntaDescendiente.
 */
class FdPreguntaDescendienteControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdPreguntaDescendienteController('FdPreguntaDescendienteController','backend\controllers\poc\FdPreguntaDescendienteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaDescendienteController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdPreguntaDescendienteController('FdPreguntaDescendienteController','backend\controllers\poc\FdPreguntaDescendienteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaDescendienteController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdpreguntadescendiente/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdPreguntaDescendiente que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaDescendienteController('FdPreguntaDescendienteController','backend\controllers\poc\FdPreguntaDescendienteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaDescendienteController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdPreguntaDescendienteSearch' => [
                                             'id_pregunta_padre' => "Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4",       
                                              'id_pregunta_descendiente' => "Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4",       
                                              'id_version_descendiente' => "Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4",       
                                              'id_version_padre' => "Ingresar valor de pruebas para el campo id_version_padre de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdPreguntaDescendienteController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaDescendienteController('FdPreguntaDescendienteController','backend\controllers\poc\FdPreguntaDescendienteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaDescendienteController', $tester);
        
        // se deben declarar los valores de $id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre para enviar la llave
        
                        $id_pregunta_padre = 'valor adecuado para el tipo de dato del paramtero $id_pregunta_padre';
                         $id_pregunta_descendiente = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta_descendiente';
                         $id_version_descendiente = 'valor adecuado para el tipo de dato del paramtero  $id_version_descendiente';
                         $id_version_padre = 'valor adecuado para el tipo de dato del paramtero  $id_version_padre';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre             
            $actionView=Yii::$app->runAction('FdPreguntaDescendienteController/view',['id_pregunta_padre' => $id_pregunta_padre, '$id_pregunta_descendiente' =>  $id_pregunta_descendiente, '$id_version_descendiente' =>  $id_version_descendiente, '$id_version_padre' =>  $id_version_padre]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaDescendienteController('FdPreguntaDescendienteController','backend\controllers\poc\FdPreguntaDescendienteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaDescendienteController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdPreguntaDescendienteController' => [
                                             'id_pregunta_padre' => "Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4",       
                                              'id_pregunta_descendiente' => "Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4",       
                                              'id_version_descendiente' => "Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4",       
                                              'id_version_padre' => "Ingresar valor de pruebas para el campo id_version_padre de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdPreguntaDescendienteController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaDescendienteController('FdPreguntaDescendienteController','backend\controllers\poc\FdPreguntaDescendienteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaDescendienteController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdPreguntaDescendienteController' => [
                                         'id_pregunta_padre' => "Ingresar valor de pruebas para el campo id_pregunta_padre de tipo int4",       
                                          'id_pregunta_descendiente' => "Ingresar valor de pruebas para el campo id_pregunta_descendiente de tipo int4",       
                                          'id_version_descendiente' => "Ingresar valor de pruebas para el campo id_version_descendiente de tipo int4",       
                                          'id_version_padre' => "Ingresar valor de pruebas para el campo id_version_padre de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre para enviar la llave
                         $id_pregunta_padre = 'valor adecuado para el tipo de dato del paramtero $id_pregunta_padre';
                         $id_pregunta_descendiente = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta_descendiente';
                         $id_version_descendiente = 'valor adecuado para el tipo de dato del paramtero  $id_version_descendiente';
                         $id_version_padre = 'valor adecuado para el tipo de dato del paramtero  $id_version_padre';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdPreguntaDescendienteController/update',['id_pregunta_padre' => $id_pregunta_padre, '$id_pregunta_descendiente' =>  $id_pregunta_descendiente, '$id_version_descendiente' =>  $id_version_descendiente, '$id_version_padre' =>  $id_version_padre]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaDescendienteController('FdPreguntaDescendienteController','backend\controllers\poc\FdPreguntaDescendienteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaDescendienteController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id_pregunta_padre = 'valor adecuado para el tipo de dato del paramtero $id_pregunta_padre';
                         $id_pregunta_descendiente = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta_descendiente';
                         $id_version_descendiente = 'valor adecuado para el tipo de dato del paramtero  $id_version_descendiente';
                         $id_version_padre = 'valor adecuado para el tipo de dato del paramtero  $id_version_padre';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdPreguntaDescendienteController/update',['id_pregunta_padre' => $id_pregunta_padre, '$id_pregunta_descendiente' =>  $id_pregunta_descendiente, '$id_version_descendiente' =>  $id_version_descendiente, '$id_version_padre' =>  $id_version_padre]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
