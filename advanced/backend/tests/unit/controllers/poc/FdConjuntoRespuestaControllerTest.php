<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdConjuntoRespuestaController;


/**
 * FdConjuntoRespuestaControllerTest implementa las acciones a través del sistema CRUD para el modelo FdConjuntoRespuesta.
 */
class FdConjuntoRespuestaControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdConjuntoRespuestaController('FdConjuntoRespuestaController','backend\controllers\poc\FdConjuntoRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdConjuntoRespuestaController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdConjuntoRespuestaController('FdConjuntoRespuestaController','backend\controllers\poc\FdConjuntoRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdConjuntoRespuestaController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdconjuntorespuesta/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdConjuntoRespuesta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdConjuntoRespuestaController('FdConjuntoRespuestaController','backend\controllers\poc\FdConjuntoRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdConjuntoRespuestaController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdConjuntoRespuestaSearch' => [
                                             'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                              'id_entidad' => "Ingresar valor de pruebas para el campo id_entidad de tipo varchar",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'ult_id_adm_estado' => "Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4",       
                                              'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdConjuntoRespuestaController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdConjuntoRespuestaController('FdConjuntoRespuestaController','backend\controllers\poc\FdConjuntoRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdConjuntoRespuestaController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdConjuntoRespuestaController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdConjuntoRespuestaController('FdConjuntoRespuestaController','backend\controllers\poc\FdConjuntoRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdConjuntoRespuestaController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdConjuntoRespuestaController' => [
                                             'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                              'id_entidad' => "Ingresar valor de pruebas para el campo id_entidad de tipo varchar",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'ult_id_adm_estado' => "Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4",       
                                              'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdConjuntoRespuestaController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdConjuntoRespuestaController('FdConjuntoRespuestaController','backend\controllers\poc\FdConjuntoRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdConjuntoRespuestaController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdConjuntoRespuestaController' => [
                                         'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                          'id_entidad' => "Ingresar valor de pruebas para el campo id_entidad de tipo varchar",       
                                          'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                          'ult_id_adm_estado' => "Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4",       
                                          'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdConjuntoRespuestaController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdConjuntoRespuestaController('FdConjuntoRespuestaController','backend\controllers\poc\FdConjuntoRespuestaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdConjuntoRespuestaController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdConjuntoRespuestaController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
