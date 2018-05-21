<?php

namespace frontend\tests\unit\controllers\hidricos;

use Yii;
use frontend\controllers\hidricos\CdasolicitudinformacionController;


/**
 * CdasolicitudinformacionControllerTest implementa las acciones a través del sistema CRUD para el modelo CdaSolicitudInformacion.
 */
class CdasolicitudinformacionControllerTest extends \Codeception\Test\Unit
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
        $tester = new  CdasolicitudinformacionController('CdasolicitudinformacionController','frontend\controllers\hidricos\CdasolicitudinformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\CdasolicitudinformacionController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  CdasolicitudinformacionController('CdasolicitudinformacionController','frontend\controllers\hidricos\CdasolicitudinformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\CdasolicitudinformacionController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/cdasolicitudinformacion/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo CdaSolicitudInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdasolicitudinformacionController('CdasolicitudinformacionController','frontend\controllers\hidricos\CdasolicitudinformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\CdasolicitudinformacionController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['CdaSolicitudInformacionSearch' => [
                                             'id_solicitud_info' => "Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4",       
                                              'id_tinfo_faltante' => "Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4",       
                                              'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",       
                                              'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",       
                                              'id_tatencion' => "Ingresar valor de pruebas para el campo id_tatencion de tipo int4",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'oficio_atencion' => "Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar",       
                                              'fecha_atencion' => "Ingresar valor de pruebas para el campo fecha_atencion de tipo date",       
                                              'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",       
                                              'id_trespuesta' => "Ingresar valor de pruebas para el campo id_trespuesta de tipo int4",       
                                              'observaciones_res' => "Ingresar valor de pruebas para el campo observaciones_res de tipo varchar",       
                                              'oficio_respuesta' => "Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar",       
                                              'fecha_respuesta' => "Ingresar valor de pruebas para el campo fecha_respuesta de tipo date",       
                                              'id_cactividad_proceso_res' => "Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('CdasolicitudinformacionController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  CdasolicitudinformacionController('CdasolicitudinformacionController','frontend\controllers\hidricos\CdasolicitudinformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\CdasolicitudinformacionController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('CdasolicitudinformacionController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdasolicitudinformacionController('CdasolicitudinformacionController','frontend\controllers\hidricos\CdasolicitudinformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\CdasolicitudinformacionController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['CdasolicitudinformacionController' => [
                                             'id_solicitud_info' => "Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4",       
                                              'id_tinfo_faltante' => "Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4",       
                                              'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",       
                                              'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",       
                                              'id_tatencion' => "Ingresar valor de pruebas para el campo id_tatencion de tipo int4",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'oficio_atencion' => "Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar",       
                                              'fecha_atencion' => "Ingresar valor de pruebas para el campo fecha_atencion de tipo date",       
                                              'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",       
                                              'id_trespuesta' => "Ingresar valor de pruebas para el campo id_trespuesta de tipo int4",       
                                              'observaciones_res' => "Ingresar valor de pruebas para el campo observaciones_res de tipo varchar",       
                                              'oficio_respuesta' => "Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar",       
                                              'fecha_respuesta' => "Ingresar valor de pruebas para el campo fecha_respuesta de tipo date",       
                                              'id_cactividad_proceso_res' => "Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('CdasolicitudinformacionController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  CdasolicitudinformacionController('CdasolicitudinformacionController','frontend\controllers\hidricos\CdasolicitudinformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\CdasolicitudinformacionController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['CdasolicitudinformacionController' => [
                                         'id_solicitud_info' => "Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4",       
                                          'id_tinfo_faltante' => "Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4",       
                                          'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",       
                                          'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",       
                                          'id_tatencion' => "Ingresar valor de pruebas para el campo id_tatencion de tipo int4",       
                                          'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                          'oficio_atencion' => "Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar",       
                                          'fecha_atencion' => "Ingresar valor de pruebas para el campo fecha_atencion de tipo date",       
                                          'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",       
                                          'id_trespuesta' => "Ingresar valor de pruebas para el campo id_trespuesta de tipo int4",       
                                          'observaciones_res' => "Ingresar valor de pruebas para el campo observaciones_res de tipo varchar",       
                                          'oficio_respuesta' => "Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar",       
                                          'fecha_respuesta' => "Ingresar valor de pruebas para el campo fecha_respuesta de tipo date",       
                                          'id_cactividad_proceso_res' => "Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('CdasolicitudinformacionController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdasolicitudinformacionController('CdasolicitudinformacionController','frontend\controllers\hidricos\CdasolicitudinformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\hidricos\CdasolicitudinformacionController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(CdasolicitudinformacionController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
