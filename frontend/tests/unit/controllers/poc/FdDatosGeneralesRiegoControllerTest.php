<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdDatosGeneralesRiegoController;


/**
 * FdDatosGeneralesRiegoControllerTest implementa las acciones a través del sistema CRUD para el modelo FdDatosGeneralesRiego.
 */
class FdDatosGeneralesRiegoControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdDatosGeneralesRiegoController('FdDatosGeneralesRiegoController','frontend\controllers\poc\FdDatosGeneralesRiegoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDatosGeneralesRiegoController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesRiegoController('FdDatosGeneralesRiegoController','frontend\controllers\poc\FdDatosGeneralesRiegoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDatosGeneralesRiegoController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fddatosgeneralesriego/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdDatosGeneralesRiego que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesRiegoController('FdDatosGeneralesRiegoController','frontend\controllers\poc\FdDatosGeneralesRiegoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDatosGeneralesRiegoController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdDatosGeneralesRiegoSearch' => [
                                             'id_datos_generales_riego' => "Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4",       
                                              'nombres_prestador_servicio' => "Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar",       
                                              'direccion_oficinas' => "Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar",       
                                              'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",       
                                              'posee_convencional' => "Ingresar valor de pruebas para el campo posee_convencional de tipo int4",       
                                              'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",       
                                              'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",       
                                              'num_celular_otro' => "Ingresar valor de pruebas para el campo num_celular_otro de tipo int4",       
                                              'posee_email' => "Ingresar valor de pruebas para el campo posee_email de tipo int4",       
                                              'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdDatosGeneralesRiegoController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesRiegoController('FdDatosGeneralesRiegoController','frontend\controllers\poc\FdDatosGeneralesRiegoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDatosGeneralesRiegoController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdDatosGeneralesRiegoController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesRiegoController('FdDatosGeneralesRiegoController','frontend\controllers\poc\FdDatosGeneralesRiegoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDatosGeneralesRiegoController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdDatosGeneralesRiegoController' => [
                                             'id_datos_generales_riego' => "Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4",       
                                              'nombres_prestador_servicio' => "Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar",       
                                              'direccion_oficinas' => "Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar",       
                                              'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",       
                                              'posee_convencional' => "Ingresar valor de pruebas para el campo posee_convencional de tipo int4",       
                                              'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",       
                                              'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",       
                                              'num_celular_otro' => "Ingresar valor de pruebas para el campo num_celular_otro de tipo int4",       
                                              'posee_email' => "Ingresar valor de pruebas para el campo posee_email de tipo int4",       
                                              'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdDatosGeneralesRiegoController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesRiegoController('FdDatosGeneralesRiegoController','frontend\controllers\poc\FdDatosGeneralesRiegoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDatosGeneralesRiegoController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdDatosGeneralesRiegoController' => [
                                         'id_datos_generales_riego' => "Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4",       
                                          'nombres_prestador_servicio' => "Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar",       
                                          'direccion_oficinas' => "Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar",       
                                          'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",       
                                          'posee_convencional' => "Ingresar valor de pruebas para el campo posee_convencional de tipo int4",       
                                          'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",       
                                          'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",       
                                          'num_celular_otro' => "Ingresar valor de pruebas para el campo num_celular_otro de tipo int4",       
                                          'posee_email' => "Ingresar valor de pruebas para el campo posee_email de tipo int4",       
                                          'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdDatosGeneralesRiegoController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesRiegoController('FdDatosGeneralesRiegoController','frontend\controllers\poc\FdDatosGeneralesRiegoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDatosGeneralesRiegoController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdDatosGeneralesRiegoController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
