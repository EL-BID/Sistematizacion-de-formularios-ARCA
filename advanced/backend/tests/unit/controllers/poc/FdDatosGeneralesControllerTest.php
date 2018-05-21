<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdDatosGeneralesController;


/**
 * FdDatosGeneralesControllerTest implementa las acciones a través del sistema CRUD para el modelo FdDatosGenerales.
 */
class FdDatosGeneralesControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdDatosGeneralesController('FdDatosGeneralesController','backend\controllers\poc\FdDatosGeneralesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdDatosGeneralesController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesController('FdDatosGeneralesController','backend\controllers\poc\FdDatosGeneralesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdDatosGeneralesController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fddatosgenerales/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdDatosGenerales que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesController('FdDatosGeneralesController','backend\controllers\poc\FdDatosGeneralesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdDatosGeneralesController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdDatosGeneralesSearch' => [
                                             'id_datos_generales' => "Ingresar valor de pruebas para el campo id_datos_generales de tipo int4",       
                                              'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",       
                                              'num_documento' => "Ingresar valor de pruebas para el campo num_documento de tipo int4",       
                                              'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",       
                                              'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",       
                                              'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",       
                                              'direccion' => "Ingresar valor de pruebas para el campo direccion de tipo varchar",       
                                              'descripcion_trabajo' => "Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar",       
                                              'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",       
                                              'id_tdocumento' => "Ingresar valor de pruebas para el campo id_tdocumento de tipo int4",       
                                              'id_natu_juridica' => "Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdDatosGeneralesController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesController('FdDatosGeneralesController','backend\controllers\poc\FdDatosGeneralesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdDatosGeneralesController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdDatosGeneralesController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesController('FdDatosGeneralesController','backend\controllers\poc\FdDatosGeneralesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdDatosGeneralesController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdDatosGeneralesController' => [
                                             'id_datos_generales' => "Ingresar valor de pruebas para el campo id_datos_generales de tipo int4",       
                                              'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",       
                                              'num_documento' => "Ingresar valor de pruebas para el campo num_documento de tipo int4",       
                                              'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",       
                                              'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",       
                                              'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",       
                                              'direccion' => "Ingresar valor de pruebas para el campo direccion de tipo varchar",       
                                              'descripcion_trabajo' => "Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar",       
                                              'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",       
                                              'id_tdocumento' => "Ingresar valor de pruebas para el campo id_tdocumento de tipo int4",       
                                              'id_natu_juridica' => "Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdDatosGeneralesController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesController('FdDatosGeneralesController','backend\controllers\poc\FdDatosGeneralesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdDatosGeneralesController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdDatosGeneralesController' => [
                                         'id_datos_generales' => "Ingresar valor de pruebas para el campo id_datos_generales de tipo int4",       
                                          'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",       
                                          'num_documento' => "Ingresar valor de pruebas para el campo num_documento de tipo int4",       
                                          'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",       
                                          'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",       
                                          'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",       
                                          'direccion' => "Ingresar valor de pruebas para el campo direccion de tipo varchar",       
                                          'descripcion_trabajo' => "Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar",       
                                          'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",       
                                          'id_tdocumento' => "Ingresar valor de pruebas para el campo id_tdocumento de tipo int4",       
                                          'id_natu_juridica' => "Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdDatosGeneralesController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDatosGeneralesController('FdDatosGeneralesController','backend\controllers\poc\FdDatosGeneralesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdDatosGeneralesController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdDatosGeneralesController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
