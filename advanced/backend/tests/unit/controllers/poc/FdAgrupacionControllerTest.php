<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdAgrupacionController;


/**
 * FdAgrupacionControllerTest implementa las acciones a través del sistema CRUD para el modelo FdAgrupacion.
 */
class FdAgrupacionControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdAgrupacionController('FdAgrupacionController','backend\controllers\poc\FdAgrupacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAgrupacionController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdAgrupacionController('FdAgrupacionController','backend\controllers\poc\FdAgrupacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAgrupacionController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdagrupacion/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdAgrupacion que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdAgrupacionController('FdAgrupacionController','backend\controllers\poc\FdAgrupacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAgrupacionController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdAgrupacionSearch' => [
                                             'id_agrupacion' => "1",       
                                              'nom_agrupacion' => "Opciones técnicas de saneamiento utilizadas",       
                                              'id_tagrupacion' => "2",       
                                              'num_col' => "1",       
                                              'num_row' => "1",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdAgrupacionController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdAgrupacionController('FdAgrupacionController','backend\controllers\poc\FdAgrupacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAgrupacionController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = '1';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdAgrupacionController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdAgrupacionController('FdAgrupacionController','backend\controllers\poc\FdAgrupacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAgrupacionController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdAgrupacionController' => [
                                             'id_agrupacion' => "72",       
                                              'nom_agrupacion' => "Agrupación prueba",       
                                              'id_tagrupacion' => "2",       
                                              'num_col' => "1",       
                                              'num_row' => "1",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdAgrupacionController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdAgrupacionController('FdAgrupacionController','backend\controllers\poc\FdAgrupacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAgrupacionController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdAgrupacionController' => [
                                         'id_agrupacion' => "72",       
                                          'nom_agrupacion' => "Agrupación de prueba",       
                                          'id_tagrupacion' => "2",       
                                          'num_col' => "1",       
                                          'num_row' => "1",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = '72';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdAgrupacionController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdAgrupacionController('FdAgrupacionController','backend\controllers\poc\FdAgrupacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdAgrupacionController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = '72';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdAgrupacionController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
