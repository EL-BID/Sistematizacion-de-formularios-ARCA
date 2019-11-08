<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdNivelDesempenioController;


/**
 * FdNivelDesempenioControllerTest implementa las acciones a través del sistema CRUD para el modelo FdNivelDesempenio.
 */
class FdNivelDesempenioControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdNivelDesempenioController('FdNivelDesempenioController','frontend\controllers\poc\FdNivelDesempenioController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdNivelDesempenioController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdNivelDesempenioController('FdNivelDesempenioController','frontend\controllers\poc\FdNivelDesempenioController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdNivelDesempenioController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdniveldesempenio/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdNivelDesempenio que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdNivelDesempenioController('FdNivelDesempenioController','frontend\controllers\poc\FdNivelDesempenioController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdNivelDesempenioController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdNivelDesempenioSearch' => [
                                             'id_nivel' => "Ingresar valor de pruebas para el campo id_nivel de tipo int4",       
                                              'intervalo_inicio' => "Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4",       
                                              'intervalo_fin' => "Ingresar valor de pruebas para el campo intervalo_fin de tipo int4",       
                                              'nivel_desempenio' => "Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar",       
                                              'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",       
                                              'semaforizacion' => "Ingresar valor de pruebas para el campo semaforizacion de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdNivelDesempenioController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdNivelDesempenioController('FdNivelDesempenioController','frontend\controllers\poc\FdNivelDesempenioController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdNivelDesempenioController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdNivelDesempenioController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdNivelDesempenioController('FdNivelDesempenioController','frontend\controllers\poc\FdNivelDesempenioController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdNivelDesempenioController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdNivelDesempenioController' => [
                                             'id_nivel' => "Ingresar valor de pruebas para el campo id_nivel de tipo int4",       
                                              'intervalo_inicio' => "Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4",       
                                              'intervalo_fin' => "Ingresar valor de pruebas para el campo intervalo_fin de tipo int4",       
                                              'nivel_desempenio' => "Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar",       
                                              'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",       
                                              'semaforizacion' => "Ingresar valor de pruebas para el campo semaforizacion de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdNivelDesempenioController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdNivelDesempenioController('FdNivelDesempenioController','frontend\controllers\poc\FdNivelDesempenioController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdNivelDesempenioController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdNivelDesempenioController' => [
                                         'id_nivel' => "Ingresar valor de pruebas para el campo id_nivel de tipo int4",       
                                          'intervalo_inicio' => "Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4",       
                                          'intervalo_fin' => "Ingresar valor de pruebas para el campo intervalo_fin de tipo int4",       
                                          'nivel_desempenio' => "Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar",       
                                          'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",       
                                          'semaforizacion' => "Ingresar valor de pruebas para el campo semaforizacion de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdNivelDesempenioController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdNivelDesempenioController('FdNivelDesempenioController','frontend\controllers\poc\FdNivelDesempenioController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdNivelDesempenioController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdNivelDesempenioController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
