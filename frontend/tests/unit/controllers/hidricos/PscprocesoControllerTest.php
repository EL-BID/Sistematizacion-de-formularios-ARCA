<?php

namespace frontend\tests\unit\controllers\hidricos;

use Yii;
use frontend\controllers\cda\PscprocesoController;


/**
 * PscprocesoControllerTest implementa las acciones a través del sistema CRUD para el modelo PsCproceso.
 */
class PscprocesoControllerTest extends \Codeception\Test\Unit
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
        $tester = new  PscprocesoController('PscprocesoController','frontend\controllers\hidricos\PscprocesoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PscprocesoController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  PscprocesoController('PscprocesoController','frontend\controllers\hidricos\PscprocesoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PscprocesoController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/pscproceso/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo PsCproceso que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PscprocesoController('PscprocesoController','frontend\controllers\hidricos\PscprocesoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PscprocesoController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['PsCprocesoSearch' => [
                                             'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                                              'ult_id_eproceso' => "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4",       
                                              'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",       
                                              'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",       
                                              'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",       
                                              'num_quipux' => "Ingresar valor de pruebas para el campo num_quipux de tipo varchar",       
                                              'fecha_registro_quipux' => "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date",       
                                              'asunto_quipux' => "Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar",       
                                              'tipo_documento_quipux' => "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar",       
                                              'ult_id_actividad' => "Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4",       
                                              'ult_id_usuario' => "Ingresar valor de pruebas para el campo ult_id_usuario de tipo int4",       
                                              'ult_fecha_actividad' => "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date",       
                                              'ult_fecha_estado' => "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date",       
                                              'numero' => "Ingresar valor de pruebas para el campo numero de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('PscprocesoController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  PscprocesoController('PscprocesoController','frontend\controllers\hidricos\PscprocesoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PscprocesoController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('PscprocesoController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PscprocesoController('PscprocesoController','frontend\controllers\hidricos\PscprocesoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PscprocesoController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['PscprocesoController' => [
                                             'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                                              'ult_id_eproceso' => "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4",       
                                              'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",       
                                              'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",       
                                              'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",       
                                              'num_quipux' => "Ingresar valor de pruebas para el campo num_quipux de tipo varchar",       
                                              'fecha_registro_quipux' => "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date",       
                                              'asunto_quipux' => "Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar",       
                                              'tipo_documento_quipux' => "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar",       
                                              'ult_id_actividad' => "Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4",       
                                              'ult_id_usuario' => "Ingresar valor de pruebas para el campo ult_id_usuario de tipo int4",       
                                              'ult_fecha_actividad' => "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date",       
                                              'ult_fecha_estado' => "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date",       
                                              'numero' => "Ingresar valor de pruebas para el campo numero de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('PscprocesoController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  PscprocesoController('PscprocesoController','frontend\controllers\hidricos\PscprocesoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PscprocesoController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['PscprocesoController' => [
                                         'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                                          'ult_id_eproceso' => "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4",       
                                          'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",       
                                          'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",       
                                          'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",       
                                          'num_quipux' => "Ingresar valor de pruebas para el campo num_quipux de tipo varchar",       
                                          'fecha_registro_quipux' => "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date",       
                                          'asunto_quipux' => "Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar",       
                                          'tipo_documento_quipux' => "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar",       
                                          'ult_id_actividad' => "Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4",       
                                          'ult_id_usuario' => "Ingresar valor de pruebas para el campo ult_id_usuario de tipo int4",       
                                          'ult_fecha_actividad' => "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date",       
                                          'ult_fecha_estado' => "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date",       
                                          'numero' => "Ingresar valor de pruebas para el campo numero de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('PscprocesoController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  PscprocesoController('PscprocesoController','frontend\controllers\hidricos\PscprocesoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PscprocesoController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('PscprocesoController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
