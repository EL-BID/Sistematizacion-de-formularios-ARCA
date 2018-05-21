<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdAdmEstadoController;


/**
 * FdAdmEstadoControllerTest implementa las acciones a través del sistema CRUD para el modelo FdAdmEstado.
 */
class FdAdmEstadoControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdAdmEstadoController('FdAdmEstadoController','backend\controllers\poc\FdAdmEstadoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAdmEstadoController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdAdmEstadoController('FdAdmEstadoController','backend\controllers\poc\FdAdmEstadoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAdmEstadoController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdadmestado/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdAdmEstado que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdAdmEstadoController('FdAdmEstadoController','backend\controllers\poc\FdAdmEstadoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAdmEstadoController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdAdmEstadoSearch' => [
                                             'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",       
                                              'nom_adm_estado' => "Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar",       
                                              'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",       
                                              'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",       
                                              'p_actualizar' => "Ingresar valor de pruebas para el campo p_actualizar de tipo varchar",       
                                              'p_crear' => "Ingresar valor de pruebas para el campo p_crear de tipo varchar",       
                                              'p_borrar' => "Ingresar valor de pruebas para el campo p_borrar de tipo varchar",       
                                              'p_ejecutar' => "Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdAdmEstadoController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdAdmEstadoController('FdAdmEstadoController','backend\controllers\poc\FdAdmEstadoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAdmEstadoController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdAdmEstadoController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdAdmEstadoController('FdAdmEstadoController','backend\controllers\poc\FdAdmEstadoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAdmEstadoController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdAdmEstadoController' => [
                                             'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",       
                                              'nom_adm_estado' => "Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar",       
                                              'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",       
                                              'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",       
                                              'p_actualizar' => "Ingresar valor de pruebas para el campo p_actualizar de tipo varchar",       
                                              'p_crear' => "Ingresar valor de pruebas para el campo p_crear de tipo varchar",       
                                              'p_borrar' => "Ingresar valor de pruebas para el campo p_borrar de tipo varchar",       
                                              'p_ejecutar' => "Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdAdmEstadoController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdAdmEstadoController('FdAdmEstadoController','backend\controllers\poc\FdAdmEstadoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAdmEstadoController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdAdmEstadoController' => [
                                         'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",       
                                          'nom_adm_estado' => "Ingresar valor de pruebas para el campo nom_adm_estado de tipo varchar",       
                                          'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",       
                                          'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",       
                                          'p_actualizar' => "Ingresar valor de pruebas para el campo p_actualizar de tipo varchar",       
                                          'p_crear' => "Ingresar valor de pruebas para el campo p_crear de tipo varchar",       
                                          'p_borrar' => "Ingresar valor de pruebas para el campo p_borrar de tipo varchar",       
                                          'p_ejecutar' => "Ingresar valor de pruebas para el campo p_ejecutar de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdAdmEstadoController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdAdmEstadoController('FdAdmEstadoController','backend\controllers\poc\FdAdmEstadoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAdmEstadoController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdAdmEstadoController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
