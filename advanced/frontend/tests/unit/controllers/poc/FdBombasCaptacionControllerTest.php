<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdBombasCaptacionController;


/**
 * FdBombasCaptacionControllerTest implementa las acciones a través del sistema CRUD para el modelo FdBombasCaptacion.
 */
class FdBombasCaptacionControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdBombasCaptacionController('FdBombasCaptacionController','frontend\controllers\poc\FdBombasCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdBombasCaptacionController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdBombasCaptacionController('FdBombasCaptacionController','frontend\controllers\poc\FdBombasCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdBombasCaptacionController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdbombascaptacion/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdBombasCaptacion que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdBombasCaptacionController('FdBombasCaptacionController','frontend\controllers\poc\FdBombasCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdBombasCaptacionController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdBombasCaptacionSearch' => [
                                             'id_bombas_captacion' => "Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4",       
                                              'nombre_bomba' => "Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar",       
                                              'id_material_caseta' => "Ingresar valor de pruebas para el campo id_material_caseta de tipo int4",       
                                              'id_estado_infrestructura' => "Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4",       
                                              'potencia_bomba' => "Ingresar valor de pruebas para el campo potencia_bomba de tipo int4",       
                                              'anio_instalacion' => "Ingresar valor de pruebas para el campo anio_instalacion de tipo int4",       
                                              'id_problema_bomba' => "Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4",       
                                              'especifique_material_caseta' => "Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar",       
                                              'especifique_problema_bomba' => "Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdBombasCaptacionController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdBombasCaptacionController('FdBombasCaptacionController','frontend\controllers\poc\FdBombasCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdBombasCaptacionController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdBombasCaptacionController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdBombasCaptacionController('FdBombasCaptacionController','frontend\controllers\poc\FdBombasCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdBombasCaptacionController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdBombasCaptacionController' => [
                                             'id_bombas_captacion' => "Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4",       
                                              'nombre_bomba' => "Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar",       
                                              'id_material_caseta' => "Ingresar valor de pruebas para el campo id_material_caseta de tipo int4",       
                                              'id_estado_infrestructura' => "Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4",       
                                              'potencia_bomba' => "Ingresar valor de pruebas para el campo potencia_bomba de tipo int4",       
                                              'anio_instalacion' => "Ingresar valor de pruebas para el campo anio_instalacion de tipo int4",       
                                              'id_problema_bomba' => "Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4",       
                                              'especifique_material_caseta' => "Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar",       
                                              'especifique_problema_bomba' => "Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdBombasCaptacionController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdBombasCaptacionController('FdBombasCaptacionController','frontend\controllers\poc\FdBombasCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdBombasCaptacionController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdBombasCaptacionController' => [
                                         'id_bombas_captacion' => "Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4",       
                                          'nombre_bomba' => "Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar",       
                                          'id_material_caseta' => "Ingresar valor de pruebas para el campo id_material_caseta de tipo int4",       
                                          'id_estado_infrestructura' => "Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4",       
                                          'potencia_bomba' => "Ingresar valor de pruebas para el campo potencia_bomba de tipo int4",       
                                          'anio_instalacion' => "Ingresar valor de pruebas para el campo anio_instalacion de tipo int4",       
                                          'id_problema_bomba' => "Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4",       
                                          'especifique_material_caseta' => "Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar",       
                                          'especifique_problema_bomba' => "Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar",       
                                          'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                          'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdBombasCaptacionController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdBombasCaptacionController('FdBombasCaptacionController','frontend\controllers\poc\FdBombasCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdBombasCaptacionController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdBombasCaptacionController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
