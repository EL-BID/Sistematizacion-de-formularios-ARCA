<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdPeriodoFormatoController;


/**
 * FdPeriodoFormatoControllerTest implementa las acciones a través del sistema CRUD para el modelo FdPeriodoFormato.
 */
class FdPeriodoFormatoControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdPeriodoFormatoController('FdPeriodoFormatoController','backend\controllers\poc\FdPeriodoFormatoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoController('FdPeriodoFormatoController','backend\controllers\poc\FdPeriodoFormatoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdperiodoformato/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdPeriodoFormato que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoController('FdPeriodoFormatoController','backend\controllers\poc\FdPeriodoFormatoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdPeriodoFormatoSearch' => [
                                             'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdPeriodoFormatoController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoController('FdPeriodoFormatoController','backend\controllers\poc\FdPeriodoFormatoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoController', $tester);
        
        // se deben declarar los valores de $id_formato, $id_periodo para enviar la llave
        
                        $id_formato = 'valor adecuado para el tipo de dato del paramtero $id_formato';
                         $id_periodo = 'valor adecuado para el tipo de dato del paramtero  $id_periodo';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id_formato, $id_periodo             
            $actionView=Yii::$app->runAction('FdPeriodoFormatoController/view',['id_formato' => $id_formato, '$id_periodo' =>  $id_periodo]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoController('FdPeriodoFormatoController','backend\controllers\poc\FdPeriodoFormatoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdPeriodoFormatoController' => [
                                             'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdPeriodoFormatoController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id_formato, $id_periodo)
    {
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoController('FdPeriodoFormatoController','backend\controllers\poc\FdPeriodoFormatoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdPeriodoFormatoController' => [
                                         'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",       
                                          'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                          'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id_formato, $id_periodo para enviar la llave
                         $id_formato = 'valor adecuado para el tipo de dato del paramtero $id_formato';
                         $id_periodo = 'valor adecuado para el tipo de dato del paramtero  $id_periodo';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdPeriodoFormatoController/update',['id_formato' => $id_formato, '$id_periodo' =>  $id_periodo]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id_formato, $id_periodo)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoController('FdPeriodoFormatoController','backend\controllers\poc\FdPeriodoFormatoController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id_formato = 'valor adecuado para el tipo de dato del paramtero $id_formato';
                         $id_periodo = 'valor adecuado para el tipo de dato del paramtero  $id_periodo';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdPeriodoFormatoController/update',['id_formato' => $id_formato, '$id_periodo' =>  $id_periodo]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
