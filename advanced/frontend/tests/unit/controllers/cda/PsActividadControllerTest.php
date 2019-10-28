<?php

namespace frontend\tests\unit\controllers\cda;

use Yii;
use frontend\controllers\cda\PsActividadController;


/**
 * PsActividadControllerTest implementa las acciones a través del sistema CRUD para el modelo PsActividad.
 */
class PsActividadControllerTest extends \Codeception\Test\Unit
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
        $tester = new  PsActividadController('PsActividadController','frontend\controllers\cda\PsActividadController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\PsActividadController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  PsActividadController('PsActividadController','frontend\controllers\cda\PsActividadController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\PsActividadController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/psactividad/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo PsActividad que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsActividadController('PsActividadController','frontend\controllers\cda\PsActividadController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\PsActividadController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['PsActividadSearch' => [
                                             'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",       
                                              'nom_actividad' => "Ingresar valor de pruebas para el campo nom_actividad de tipo varchar",       
                                              'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",       
                                              'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",       
                                              'id_tactividad' => "Ingresar valor de pruebas para el campo id_tactividad de tipo int4",       
                                              'subpantalla' => "Ingresar valor de pruebas para el campo subpantalla de tipo varchar",       
                                              'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",       
                                              'id_clasif_actividad' => "Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4",       
                                              'plazo_alerta' => "Ingresar valor de pruebas para el campo plazo_alerta de tipo int4",       
                                              'campo_fecha_alerta' => "Ingresar valor de pruebas para el campo campo_fecha_alerta de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('PsActividadController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  PsActividadController('PsActividadController','frontend\controllers\cda\PsActividadController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\PsActividadController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('PsActividadController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsActividadController('PsActividadController','frontend\controllers\cda\PsActividadController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\PsActividadController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['PsActividadController' => [
                                             'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",       
                                              'nom_actividad' => "Ingresar valor de pruebas para el campo nom_actividad de tipo varchar",       
                                              'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",       
                                              'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",       
                                              'id_tactividad' => "Ingresar valor de pruebas para el campo id_tactividad de tipo int4",       
                                              'subpantalla' => "Ingresar valor de pruebas para el campo subpantalla de tipo varchar",       
                                              'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",       
                                              'id_clasif_actividad' => "Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4",       
                                              'plazo_alerta' => "Ingresar valor de pruebas para el campo plazo_alerta de tipo int4",       
                                              'campo_fecha_alerta' => "Ingresar valor de pruebas para el campo campo_fecha_alerta de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('PsActividadController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  PsActividadController('PsActividadController','frontend\controllers\cda\PsActividadController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\PsActividadController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['PsActividadController' => [
                                         'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",       
                                          'nom_actividad' => "Ingresar valor de pruebas para el campo nom_actividad de tipo varchar",       
                                          'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",       
                                          'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",       
                                          'id_tactividad' => "Ingresar valor de pruebas para el campo id_tactividad de tipo int4",       
                                          'subpantalla' => "Ingresar valor de pruebas para el campo subpantalla de tipo varchar",       
                                          'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",       
                                          'id_clasif_actividad' => "Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4",       
                                          'plazo_alerta' => "Ingresar valor de pruebas para el campo plazo_alerta de tipo int4",       
                                          'campo_fecha_alerta' => "Ingresar valor de pruebas para el campo campo_fecha_alerta de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('PsActividadController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsActividadController('PsActividadController','frontend\controllers\cda\PsActividadController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\PsActividadController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('PsActividadController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
