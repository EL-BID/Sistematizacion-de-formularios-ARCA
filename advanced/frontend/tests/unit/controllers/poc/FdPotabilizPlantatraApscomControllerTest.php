<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdPotabilizPlantatraApscomController;


/**
 * FdPotabilizPlantatraApscomControllerTest implementa las acciones a través del sistema CRUD para el modelo FdPotabilizPlantatraApscom.
 */
class FdPotabilizPlantatraApscomControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdPotabilizPlantatraApscomController('FdPotabilizPlantatraApscomController','frontend\controllers\poc\FdPotabilizPlantatraApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdPotabilizPlantatraApscomController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdPotabilizPlantatraApscomController('FdPotabilizPlantatraApscomController','frontend\controllers\poc\FdPotabilizPlantatraApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdPotabilizPlantatraApscomController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdpotabilizplantatraapscom/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdPotabilizPlantatraApscom que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPotabilizPlantatraApscomController('FdPotabilizPlantatraApscomController','frontend\controllers\poc\FdPotabilizPlantatraApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdPotabilizPlantatraApscomController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdPotabilizPlantatraApscomSearch' => [
                                             'id_potab_plantatr_apscom' => "Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4",       
                                              'ubicacion_lug_ptratamiento' => "Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar",       
                                              'tipo_planta_tratatmiento' => "Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4",       
                                              'especifique_tplantat' => "Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar",       
                                              'metodo_desinfeccion_planta' => "Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4",       
                                              'especifique_metdesinfeccionp' => "Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar",       
                                              'midicion_agua_tratplanta' => "Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4",       
                                              'estado_planta' => "Ingresar valor de pruebas para el campo estado_planta de tipo int4",       
                                              'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdPotabilizPlantatraApscomController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdPotabilizPlantatraApscomController('FdPotabilizPlantatraApscomController','frontend\controllers\poc\FdPotabilizPlantatraApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdPotabilizPlantatraApscomController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdPotabilizPlantatraApscomController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPotabilizPlantatraApscomController('FdPotabilizPlantatraApscomController','frontend\controllers\poc\FdPotabilizPlantatraApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdPotabilizPlantatraApscomController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdPotabilizPlantatraApscomController' => [
                                             'id_potab_plantatr_apscom' => "Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4",       
                                              'ubicacion_lug_ptratamiento' => "Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar",       
                                              'tipo_planta_tratatmiento' => "Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4",       
                                              'especifique_tplantat' => "Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar",       
                                              'metodo_desinfeccion_planta' => "Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4",       
                                              'especifique_metdesinfeccionp' => "Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar",       
                                              'midicion_agua_tratplanta' => "Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4",       
                                              'estado_planta' => "Ingresar valor de pruebas para el campo estado_planta de tipo int4",       
                                              'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdPotabilizPlantatraApscomController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdPotabilizPlantatraApscomController('FdPotabilizPlantatraApscomController','frontend\controllers\poc\FdPotabilizPlantatraApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdPotabilizPlantatraApscomController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdPotabilizPlantatraApscomController' => [
                                         'id_potab_plantatr_apscom' => "Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4",       
                                          'ubicacion_lug_ptratamiento' => "Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar",       
                                          'tipo_planta_tratatmiento' => "Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4",       
                                          'especifique_tplantat' => "Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar",       
                                          'metodo_desinfeccion_planta' => "Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4",       
                                          'especifique_metdesinfeccionp' => "Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar",       
                                          'midicion_agua_tratplanta' => "Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4",       
                                          'estado_planta' => "Ingresar valor de pruebas para el campo estado_planta de tipo int4",       
                                          'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                          'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                          'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdPotabilizPlantatraApscomController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPotabilizPlantatraApscomController('FdPotabilizPlantatraApscomController','frontend\controllers\poc\FdPotabilizPlantatraApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdPotabilizPlantatraApscomController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdPotabilizPlantatraApscomController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
