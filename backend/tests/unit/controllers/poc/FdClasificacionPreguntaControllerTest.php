<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdClasificacionPreguntaController;


/**
 * FdClasificacionPreguntaControllerTest implementa las acciones a través del sistema CRUD para el modelo FdClasificacionPregunta.
 */
class FdClasificacionPreguntaControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdClasificacionPreguntaController('FdClasificacionPreguntaController','backend\controllers\poc\FdClasificacionPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaController('FdClasificacionPreguntaController','backend\controllers\poc\FdClasificacionPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdclasificacionpregunta/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdClasificacionPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaController('FdClasificacionPreguntaController','backend\controllers\poc\FdClasificacionPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdClasificacionPreguntaSearch' => [
                                             'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",       
                                              'id_clasificacion' => "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdClasificacionPreguntaController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaController('FdClasificacionPreguntaController','backend\controllers\poc\FdClasificacionPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaController', $tester);
        
        // se deben declarar los valores de $id_clasificacion, $id_pregunta para enviar la llave
        
                        $id_clasificacion = 'valor adecuado para el tipo de dato del paramtero $id_clasificacion';
                         $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id_clasificacion, $id_pregunta             
            $actionView=Yii::$app->runAction('FdClasificacionPreguntaController/view',['id_clasificacion' => $id_clasificacion, '$id_pregunta' =>  $id_pregunta]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaController('FdClasificacionPreguntaController','backend\controllers\poc\FdClasificacionPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdClasificacionPreguntaController' => [
                                             'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",       
                                              'id_clasificacion' => "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdClasificacionPreguntaController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id_clasificacion, $id_pregunta)
    {
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaController('FdClasificacionPreguntaController','backend\controllers\poc\FdClasificacionPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdClasificacionPreguntaController' => [
                                         'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",       
                                          'id_clasificacion' => "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id_clasificacion, $id_pregunta para enviar la llave
                         $id_clasificacion = 'valor adecuado para el tipo de dato del paramtero $id_clasificacion';
                         $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdClasificacionPreguntaController/update',['id_clasificacion' => $id_clasificacion, '$id_pregunta' =>  $id_pregunta]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id_clasificacion, $id_pregunta)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaController('FdClasificacionPreguntaController','backend\controllers\poc\FdClasificacionPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id_clasificacion = 'valor adecuado para el tipo de dato del paramtero $id_clasificacion';
                         $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdClasificacionPreguntaController/update',['id_clasificacion' => $id_clasificacion, '$id_pregunta' =>  $id_pregunta]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
