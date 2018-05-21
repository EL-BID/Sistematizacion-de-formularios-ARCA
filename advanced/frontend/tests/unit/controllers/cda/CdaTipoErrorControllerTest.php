<?php

namespace frontend\tests\unit\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaTipoErrorController;


/**
 * CdaTipoErrorControllerTest implementa las acciones a través del sistema CRUD para el modelo CdaTipoError.
 */
class CdaTipoErrorControllerTest extends \Codeception\Test\Unit
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
        $tester = new  CdaTipoErrorController('CdaTipoErrorController','frontend\controllers\cda\CdaTipoErrorController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaTipoErrorController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  CdaTipoErrorController('CdaTipoErrorController','frontend\controllers\cda\CdaTipoErrorController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaTipoErrorController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/cdatipoerror/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo CdaTipoError que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaTipoErrorController('CdaTipoErrorController','frontend\controllers\cda\CdaTipoErrorController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaTipoErrorController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['CdaTipoErrorSearch' => [
                                             'id_terror' => "Ingresar valor de pruebas para el campo id_terror de tipo int4",       
                                              'nom_terror' => "Ingresar valor de pruebas para el campo nom_terror de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('CdaTipoErrorController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  CdaTipoErrorController('CdaTipoErrorController','frontend\controllers\cda\CdaTipoErrorController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaTipoErrorController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('CdaTipoErrorController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaTipoErrorController('CdaTipoErrorController','frontend\controllers\cda\CdaTipoErrorController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaTipoErrorController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['CdaTipoErrorController' => [
                                             'id_terror' => "Ingresar valor de pruebas para el campo id_terror de tipo int4",       
                                              'nom_terror' => "Ingresar valor de pruebas para el campo nom_terror de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('CdaTipoErrorController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  CdaTipoErrorController('CdaTipoErrorController','frontend\controllers\cda\CdaTipoErrorController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaTipoErrorController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['CdaTipoErrorController' => [
                                         'id_terror' => "Ingresar valor de pruebas para el campo id_terror de tipo int4",       
                                          'nom_terror' => "Ingresar valor de pruebas para el campo nom_terror de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('CdaTipoErrorController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaTipoErrorController('CdaTipoErrorController','frontend\controllers\cda\CdaTipoErrorController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaTipoErrorController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(CdaTipoErrorController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
