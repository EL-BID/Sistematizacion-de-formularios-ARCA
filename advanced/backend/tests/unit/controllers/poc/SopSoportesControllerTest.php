<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\SopSoportesController;


/**
 * SopSoportesControllerTest implementa las acciones a través del sistema CRUD para el modelo SopSoportes.
 */
class SopSoportesControllerTest extends \Codeception\Test\Unit
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
        $tester = new  SopSoportesController('SopSoportesController','backend\controllers\poc\SopSoportesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\SopSoportesController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  SopSoportesController('SopSoportesController','backend\controllers\poc\SopSoportesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\SopSoportesController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/sopsoportes/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo SopSoportes que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  SopSoportesController('SopSoportesController','backend\controllers\poc\SopSoportesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\SopSoportesController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['SopSoportesSearch' => [
                                             'id_soportes' => "Ingresar valor de pruebas para el campo id_soportes de tipo int4",       
                                              'ruta_soporte' => "Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar",       
                                              'titulo_soporte' => "Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar",       
                                              'palabras_clave' => "Ingresar valor de pruebas para el campo palabras_clave de tipo varchar",       
                                              'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo text",       
                                              'fuente_soporte' => "Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar",       
                                              'autor_soporte' => "Ingresar valor de pruebas para el campo autor_soporte de tipo varchar",       
                                              'idioma_soporte' => "Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar",       
                                              'formato_soportes' => "Ingresar valor de pruebas para el campo formato_soportes de tipo varchar",       
                                              'tamanio_soportes' => "Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('SopSoportesController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  SopSoportesController('SopSoportesController','backend\controllers\poc\SopSoportesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\SopSoportesController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('SopSoportesController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  SopSoportesController('SopSoportesController','backend\controllers\poc\SopSoportesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\SopSoportesController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['SopSoportesController' => [
                                             'id_soportes' => "Ingresar valor de pruebas para el campo id_soportes de tipo int4",       
                                              'ruta_soporte' => "Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar",       
                                              'titulo_soporte' => "Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar",       
                                              'palabras_clave' => "Ingresar valor de pruebas para el campo palabras_clave de tipo varchar",       
                                              'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo text",       
                                              'fuente_soporte' => "Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar",       
                                              'autor_soporte' => "Ingresar valor de pruebas para el campo autor_soporte de tipo varchar",       
                                              'idioma_soporte' => "Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar",       
                                              'formato_soportes' => "Ingresar valor de pruebas para el campo formato_soportes de tipo varchar",       
                                              'tamanio_soportes' => "Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('SopSoportesController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  SopSoportesController('SopSoportesController','backend\controllers\poc\SopSoportesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\SopSoportesController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['SopSoportesController' => [
                                         'id_soportes' => "Ingresar valor de pruebas para el campo id_soportes de tipo int4",       
                                          'ruta_soporte' => "Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar",       
                                          'titulo_soporte' => "Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar",       
                                          'palabras_clave' => "Ingresar valor de pruebas para el campo palabras_clave de tipo varchar",       
                                          'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo text",       
                                          'fuente_soporte' => "Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar",       
                                          'autor_soporte' => "Ingresar valor de pruebas para el campo autor_soporte de tipo varchar",       
                                          'idioma_soporte' => "Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar",       
                                          'formato_soportes' => "Ingresar valor de pruebas para el campo formato_soportes de tipo varchar",       
                                          'tamanio_soportes' => "Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('SopSoportesController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  SopSoportesController('SopSoportesController','backend\controllers\poc\SopSoportesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\SopSoportesController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(SopSoportesController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
