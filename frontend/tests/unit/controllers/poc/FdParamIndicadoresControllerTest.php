<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdParamIndicadoresController;


/**
 * FdParamIndicadoresControllerTest implementa las acciones a través del sistema CRUD para el modelo FdParamIndicadores.
 */
class FdParamIndicadoresControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdParamIndicadoresController('FdParamIndicadoresController','frontend\controllers\poc\FdParamIndicadoresController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamIndicadoresController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdParamIndicadoresController('FdParamIndicadoresController','frontend\controllers\poc\FdParamIndicadoresController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamIndicadoresController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdparamindicadores/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdParamIndicadores que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdParamIndicadoresController('FdParamIndicadoresController','frontend\controllers\poc\FdParamIndicadoresController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamIndicadoresController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdParamIndicadoresSearch' => [
                                             'id_indicador' => "Ingresar valor de pruebas para el campo id_indicador de tipo int4",       
                                              'tipo_indicador' => "Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar",       
                                              'item' => "Ingresar valor de pruebas para el campo item de tipo int4",       
                                              'indicador' => "Ingresar valor de pruebas para el campo indicador de tipo varchar",       
                                              'variable_a' => "Ingresar valor de pruebas para el campo variable_a de tipo varchar",       
                                              'variable_b' => "Ingresar valor de pruebas para el campo variable_b de tipo varchar",       
                                              'formula' => "Ingresar valor de pruebas para el campo formula de tipo varchar",       
                                              'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",       
                                              'consideracion' => "Ingresar valor de pruebas para el campo consideracion de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdParamIndicadoresController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdParamIndicadoresController('FdParamIndicadoresController','frontend\controllers\poc\FdParamIndicadoresController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamIndicadoresController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdParamIndicadoresController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdParamIndicadoresController('FdParamIndicadoresController','frontend\controllers\poc\FdParamIndicadoresController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamIndicadoresController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdParamIndicadoresController' => [
                                             'id_indicador' => "Ingresar valor de pruebas para el campo id_indicador de tipo int4",       
                                              'tipo_indicador' => "Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar",       
                                              'item' => "Ingresar valor de pruebas para el campo item de tipo int4",       
                                              'indicador' => "Ingresar valor de pruebas para el campo indicador de tipo varchar",       
                                              'variable_a' => "Ingresar valor de pruebas para el campo variable_a de tipo varchar",       
                                              'variable_b' => "Ingresar valor de pruebas para el campo variable_b de tipo varchar",       
                                              'formula' => "Ingresar valor de pruebas para el campo formula de tipo varchar",       
                                              'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",       
                                              'consideracion' => "Ingresar valor de pruebas para el campo consideracion de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdParamIndicadoresController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdParamIndicadoresController('FdParamIndicadoresController','frontend\controllers\poc\FdParamIndicadoresController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamIndicadoresController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdParamIndicadoresController' => [
                                         'id_indicador' => "Ingresar valor de pruebas para el campo id_indicador de tipo int4",       
                                          'tipo_indicador' => "Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar",       
                                          'item' => "Ingresar valor de pruebas para el campo item de tipo int4",       
                                          'indicador' => "Ingresar valor de pruebas para el campo indicador de tipo varchar",       
                                          'variable_a' => "Ingresar valor de pruebas para el campo variable_a de tipo varchar",       
                                          'variable_b' => "Ingresar valor de pruebas para el campo variable_b de tipo varchar",       
                                          'formula' => "Ingresar valor de pruebas para el campo formula de tipo varchar",       
                                          'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",       
                                          'consideracion' => "Ingresar valor de pruebas para el campo consideracion de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdParamIndicadoresController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdParamIndicadoresController('FdParamIndicadoresController','frontend\controllers\poc\FdParamIndicadoresController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamIndicadoresController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdParamIndicadoresController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
