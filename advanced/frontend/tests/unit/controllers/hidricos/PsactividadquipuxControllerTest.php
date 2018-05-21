<?php

namespace frontend\tests\unit\controllers\hidricos;

use Yii;
use frontend\controllers\hidricos\PsactividadquipuxController;


/**
 * PsactividadquipuxControllerTest implementa las acciones a través del sistema CRUD para el modelo PsActividadQuipux.
 */
class PsactividadquipuxControllerTest extends \Codeception\Test\Unit
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
        $tester = new  PsactividadquipuxController('PsactividadquipuxController','frontend\controllers\hidricos\PsactividadquipuxController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PsactividadquipuxController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  PsactividadquipuxController('PsactividadquipuxController','frontend\controllers\hidricos\PsactividadquipuxController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PsactividadquipuxController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/psactividadquipux/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo PsActividadQuipux que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsactividadquipuxController('PsactividadquipuxController','frontend\controllers\hidricos\PsactividadquipuxController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PsactividadquipuxController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['PsActividadQuipuxSearch' => [
                                             'id_actividad_quipux' => "Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4",       
                                              'fecha_actividad_quipux' => "Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date",       
                                              'usuario_actual_quipux' => "Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar",       
                                              'accion_realizada' => "Ingresar valor de pruebas para el campo accion_realizada de tipo varchar",       
                                              'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",       
                                              'estado_actual' => "Ingresar valor de pruebas para el campo estado_actual de tipo varchar",       
                                              'numero_referencia' => "Ingresar valor de pruebas para el campo numero_referencia de tipo varchar",       
                                              'usuario_origen_quipux' => "Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar",       
                                              'usuario_destino_quipux' => "Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar",       
                                              'respondido_a' => "Ingresar valor de pruebas para el campo respondido_a de tipo varchar",       
                                              'fecha_carga' => "Ingresar valor de pruebas para el campo fecha_carga de tipo date",       
                                              'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('PsactividadquipuxController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  PsactividadquipuxController('PsactividadquipuxController','frontend\controllers\hidricos\PsactividadquipuxController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PsactividadquipuxController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('PsactividadquipuxController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsactividadquipuxController('PsactividadquipuxController','frontend\controllers\hidricos\PsactividadquipuxController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PsactividadquipuxController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['PsactividadquipuxController' => [
                                             'id_actividad_quipux' => "Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4",       
                                              'fecha_actividad_quipux' => "Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date",       
                                              'usuario_actual_quipux' => "Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar",       
                                              'accion_realizada' => "Ingresar valor de pruebas para el campo accion_realizada de tipo varchar",       
                                              'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",       
                                              'estado_actual' => "Ingresar valor de pruebas para el campo estado_actual de tipo varchar",       
                                              'numero_referencia' => "Ingresar valor de pruebas para el campo numero_referencia de tipo varchar",       
                                              'usuario_origen_quipux' => "Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar",       
                                              'usuario_destino_quipux' => "Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar",       
                                              'respondido_a' => "Ingresar valor de pruebas para el campo respondido_a de tipo varchar",       
                                              'fecha_carga' => "Ingresar valor de pruebas para el campo fecha_carga de tipo date",       
                                              'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('PsactividadquipuxController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  PsactividadquipuxController('PsactividadquipuxController','frontend\controllers\hidricos\PsactividadquipuxController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PsactividadquipuxController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['PsactividadquipuxController' => [
                                         'id_actividad_quipux' => "Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4",       
                                          'fecha_actividad_quipux' => "Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date",       
                                          'usuario_actual_quipux' => "Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar",       
                                          'accion_realizada' => "Ingresar valor de pruebas para el campo accion_realizada de tipo varchar",       
                                          'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",       
                                          'estado_actual' => "Ingresar valor de pruebas para el campo estado_actual de tipo varchar",       
                                          'numero_referencia' => "Ingresar valor de pruebas para el campo numero_referencia de tipo varchar",       
                                          'usuario_origen_quipux' => "Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar",       
                                          'usuario_destino_quipux' => "Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar",       
                                          'respondido_a' => "Ingresar valor de pruebas para el campo respondido_a de tipo varchar",       
                                          'fecha_carga' => "Ingresar valor de pruebas para el campo fecha_carga de tipo date",       
                                          'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('PsactividadquipuxController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsactividadquipuxController('PsactividadquipuxController','frontend\controllers\hidricos\PsactividadquipuxController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\PsactividadquipuxController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(PsactividadquipuxController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
