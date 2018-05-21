<?php

namespace frontend\tests\unit\controllers;

use Yii;
use frontend\controllers\PsHistoricoEstadosController;


/**
 * PsHistoricoEstadosControllerTest implementa las acciones a través del sistema CRUD para el modelo PsHistoricoEstados.
 */
class PsHistoricoEstadosControllerTest extends \Codeception\Test\Unit
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
        $tester = new  PsHistoricoEstadosController('PsHistoricoEstadosController','frontend\controllers\PsHistoricoEstadosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\PsHistoricoEstadosController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  PsHistoricoEstadosController('PsHistoricoEstadosController','frontend\controllers\PsHistoricoEstadosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\PsHistoricoEstadosController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/pshistoricoestados/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo PsHistoricoEstados que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsHistoricoEstadosController('PsHistoricoEstadosController','frontend\controllers\PsHistoricoEstadosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\PsHistoricoEstadosController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['PsHistoricoEstadosSearch' => [
                                             'id_hisotrico_cproceso' => "Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4",       
                                              'fecha_estado' => "Ingresar valor de pruebas para el campo fecha_estado de tipo date",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'id_eproceso' => "Ingresar valor de pruebas para el campo id_eproceso de tipo int4",       
                                              'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                                              'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",       
                                              'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",       
                                              'id_tgestion' => "Ingresar valor de pruebas para el campo id_tgestion de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('PsHistoricoEstadosController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  PsHistoricoEstadosController('PsHistoricoEstadosController','frontend\controllers\PsHistoricoEstadosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\PsHistoricoEstadosController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('PsHistoricoEstadosController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsHistoricoEstadosController('PsHistoricoEstadosController','frontend\controllers\PsHistoricoEstadosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\PsHistoricoEstadosController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['PsHistoricoEstadosController' => [
                                             'id_hisotrico_cproceso' => "Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4",       
                                              'fecha_estado' => "Ingresar valor de pruebas para el campo fecha_estado de tipo date",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'id_eproceso' => "Ingresar valor de pruebas para el campo id_eproceso de tipo int4",       
                                              'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                                              'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",       
                                              'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",       
                                              'id_tgestion' => "Ingresar valor de pruebas para el campo id_tgestion de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('PsHistoricoEstadosController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  PsHistoricoEstadosController('PsHistoricoEstadosController','frontend\controllers\PsHistoricoEstadosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\PsHistoricoEstadosController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['PsHistoricoEstadosController' => [
                                         'id_hisotrico_cproceso' => "Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4",       
                                          'fecha_estado' => "Ingresar valor de pruebas para el campo fecha_estado de tipo date",       
                                          'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                          'id_eproceso' => "Ingresar valor de pruebas para el campo id_eproceso de tipo int4",       
                                          'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                                          'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",       
                                          'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",       
                                          'id_tgestion' => "Ingresar valor de pruebas para el campo id_tgestion de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('PsHistoricoEstadosController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  PsHistoricoEstadosController('PsHistoricoEstadosController','frontend\controllers\PsHistoricoEstadosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\PsHistoricoEstadosController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(PsHistoricoEstadosController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
