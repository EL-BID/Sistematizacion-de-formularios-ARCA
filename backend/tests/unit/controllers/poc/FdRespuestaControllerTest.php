<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdRespuestaController;


/**
 * FdRespuestaControllerTest implementa las acciones a través del sistema CRUD para el modelo FdRespuesta.
 */
class FdRespuestaControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdRespuestaController('FdRespuestaController','backend\controllers\poc\FdRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdRespuestaController('FdRespuestaController','backend\controllers\poc\FdRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdrespuesta/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdRespuesta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaController('FdRespuestaController','backend\controllers\poc\FdRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdRespuestaSearch' => [
                                             'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'ra_fecha' => "Ingresar valor de pruebas para el campo ra_fecha de tipo date",       
                                              'ra_check' => "Ingresar valor de pruebas para el campo ra_check de tipo varchar",       
                                              'ra_descripcion' => "Ingresar valor de pruebas para el campo ra_descripcion de tipo text",       
                                              'ra_entero' => "Ingresar valor de pruebas para el campo ra_entero de tipo int4",       
                                              'ra_decimal' => "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric",       
                                              'ra_porcentaje' => "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'ra_moneda' => "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",       
                                              'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                              'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",       
                                              'cantidad_registros' => "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdRespuestaController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaController('FdRespuestaController','backend\controllers\poc\FdRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdRespuestaController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaController('FdRespuestaController','backend\controllers\poc\FdRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdRespuestaController' => [
                                             'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'ra_fecha' => "Ingresar valor de pruebas para el campo ra_fecha de tipo date",       
                                              'ra_check' => "Ingresar valor de pruebas para el campo ra_check de tipo varchar",       
                                              'ra_descripcion' => "Ingresar valor de pruebas para el campo ra_descripcion de tipo text",       
                                              'ra_entero' => "Ingresar valor de pruebas para el campo ra_entero de tipo int4",       
                                              'ra_decimal' => "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric",       
                                              'ra_porcentaje' => "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'ra_moneda' => "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",       
                                              'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                              'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",       
                                              'cantidad_registros' => "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdRespuestaController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaController('FdRespuestaController','backend\controllers\poc\FdRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdRespuestaController' => [
                                         'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                          'ra_fecha' => "Ingresar valor de pruebas para el campo ra_fecha de tipo date",       
                                          'ra_check' => "Ingresar valor de pruebas para el campo ra_check de tipo varchar",       
                                          'ra_descripcion' => "Ingresar valor de pruebas para el campo ra_descripcion de tipo text",       
                                          'ra_entero' => "Ingresar valor de pruebas para el campo ra_entero de tipo int4",       
                                          'ra_decimal' => "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric",       
                                          'ra_porcentaje' => "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'ra_moneda' => "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",       
                                          'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",       
                                          'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                          'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                          'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                          'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",       
                                          'cantidad_registros' => "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdRespuestaController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaController('FdRespuestaController','backend\controllers\poc\FdRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdRespuestaController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
