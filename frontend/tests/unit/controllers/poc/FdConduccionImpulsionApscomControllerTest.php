<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdConduccionImpulsionApscomController;


/**
 * FdConduccionImpulsionApscomControllerTest implementa las acciones a través del sistema CRUD para el modelo FdConduccionImpulsionApscom.
 */
class FdConduccionImpulsionApscomControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdConduccionImpulsionApscomController('FdConduccionImpulsionApscomController','frontend\controllers\poc\FdConduccionImpulsionApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdConduccionImpulsionApscomController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdConduccionImpulsionApscomController('FdConduccionImpulsionApscomController','frontend\controllers\poc\FdConduccionImpulsionApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdConduccionImpulsionApscomController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdconduccionimpulsionapscom/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdConduccionImpulsionApscom que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdConduccionImpulsionApscomController('FdConduccionImpulsionApscomController','frontend\controllers\poc\FdConduccionImpulsionApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdConduccionImpulsionApscomController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdConduccionImpulsionApscomSearch' => [
                                             'id_cond_impulsion_apscom' => "Ingresar valor de pruebas para el campo id_cond_impulsion_apscom de tipo int4",       
                                              'nombre_lug_conduccion' => "Ingresar valor de pruebas para el campo nombre_lug_conduccion de tipo varchar",       
                                              'id_material_tuberia' => "Ingresar valor de pruebas para el campo id_material_tuberia de tipo int4",       
                                              'id_estado_tuberia' => "Ingresar valor de pruebas para el campo id_estado_tuberia de tipo int4",       
                                              'id_frec_mantenimiento_condimp' => "Ingresar valor de pruebas para el campo id_frec_mantenimiento_condimp de tipo int4",       
                                              'id_estado_bomba' => "Ingresar valor de pruebas para el campo id_estado_bomba de tipo int4",       
                                              'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar",       
                                              'especifique_otro_tuberia' => "Ingresar valor de pruebas para el campo especifique_otro_tuberia de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdConduccionImpulsionApscomController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdConduccionImpulsionApscomController('FdConduccionImpulsionApscomController','frontend\controllers\poc\FdConduccionImpulsionApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdConduccionImpulsionApscomController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdConduccionImpulsionApscomController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdConduccionImpulsionApscomController('FdConduccionImpulsionApscomController','frontend\controllers\poc\FdConduccionImpulsionApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdConduccionImpulsionApscomController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdConduccionImpulsionApscomController' => [
                                             'id_cond_impulsion_apscom' => "Ingresar valor de pruebas para el campo id_cond_impulsion_apscom de tipo int4",       
                                              'nombre_lug_conduccion' => "Ingresar valor de pruebas para el campo nombre_lug_conduccion de tipo varchar",       
                                              'id_material_tuberia' => "Ingresar valor de pruebas para el campo id_material_tuberia de tipo int4",       
                                              'id_estado_tuberia' => "Ingresar valor de pruebas para el campo id_estado_tuberia de tipo int4",       
                                              'id_frec_mantenimiento_condimp' => "Ingresar valor de pruebas para el campo id_frec_mantenimiento_condimp de tipo int4",       
                                              'id_estado_bomba' => "Ingresar valor de pruebas para el campo id_estado_bomba de tipo int4",       
                                              'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar",       
                                              'especifique_otro_tuberia' => "Ingresar valor de pruebas para el campo especifique_otro_tuberia de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdConduccionImpulsionApscomController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdConduccionImpulsionApscomController('FdConduccionImpulsionApscomController','frontend\controllers\poc\FdConduccionImpulsionApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdConduccionImpulsionApscomController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdConduccionImpulsionApscomController' => [
                                         'id_cond_impulsion_apscom' => "Ingresar valor de pruebas para el campo id_cond_impulsion_apscom de tipo int4",       
                                          'nombre_lug_conduccion' => "Ingresar valor de pruebas para el campo nombre_lug_conduccion de tipo varchar",       
                                          'id_material_tuberia' => "Ingresar valor de pruebas para el campo id_material_tuberia de tipo int4",       
                                          'id_estado_tuberia' => "Ingresar valor de pruebas para el campo id_estado_tuberia de tipo int4",       
                                          'id_frec_mantenimiento_condimp' => "Ingresar valor de pruebas para el campo id_frec_mantenimiento_condimp de tipo int4",       
                                          'id_estado_bomba' => "Ingresar valor de pruebas para el campo id_estado_bomba de tipo int4",       
                                          'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar",       
                                          'especifique_otro_tuberia' => "Ingresar valor de pruebas para el campo especifique_otro_tuberia de tipo varchar",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                          'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                          'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdConduccionImpulsionApscomController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdConduccionImpulsionApscomController('FdConduccionImpulsionApscomController','frontend\controllers\poc\FdConduccionImpulsionApscomController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdConduccionImpulsionApscomController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdConduccionImpulsionApscomController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
