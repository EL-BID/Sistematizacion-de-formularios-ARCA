<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdDetallesFuenteController;


/**
 * FdDetallesFuenteControllerTest implementa las acciones a través del sistema CRUD para el modelo FdDetallesFuente.
 */
class FdDetallesFuenteControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdDetallesFuenteController('FdDetallesFuenteController','frontend\controllers\poc\FdDetallesFuenteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesFuenteController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdDetallesFuenteController('FdDetallesFuenteController','frontend\controllers\poc\FdDetallesFuenteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesFuenteController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fddetallesfuente/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdDetallesFuente que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDetallesFuenteController('FdDetallesFuenteController','frontend\controllers\poc\FdDetallesFuenteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesFuenteController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdDetallesFuenteSearch' => [
                                             'id_detalles_fuente' => "Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4",       
                                              'nombre_fuente' => "Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar",       
                                              'id_t_fuente' => "Ingresar valor de pruebas para el campo id_t_fuente de tipo int4",       
                                              'coor_x' => "Ingresar valor de pruebas para el campo coor_x de tipo int4",       
                                              'coor_y' => "Ingresar valor de pruebas para el campo coor_y de tipo int4",       
                                              'coor_z' => "Ingresar valor de pruebas para el campo coor_z de tipo int4",       
                                              'caudal_captado' => "Ingresar valor de pruebas para el campo caudal_captado de tipo int4",       
                                              'caudal_autorizado' => "Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4",       
                                              'id_problema_fuente' => "Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4",       
                                              'especifique' => "Ingresar valor de pruebas para el campo especifique de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdDetallesFuenteController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdDetallesFuenteController('FdDetallesFuenteController','frontend\controllers\poc\FdDetallesFuenteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesFuenteController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdDetallesFuenteController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDetallesFuenteController('FdDetallesFuenteController','frontend\controllers\poc\FdDetallesFuenteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesFuenteController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdDetallesFuenteController' => [
                                             'id_detalles_fuente' => "Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4",       
                                              'nombre_fuente' => "Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar",       
                                              'id_t_fuente' => "Ingresar valor de pruebas para el campo id_t_fuente de tipo int4",       
                                              'coor_x' => "Ingresar valor de pruebas para el campo coor_x de tipo int4",       
                                              'coor_y' => "Ingresar valor de pruebas para el campo coor_y de tipo int4",       
                                              'coor_z' => "Ingresar valor de pruebas para el campo coor_z de tipo int4",       
                                              'caudal_captado' => "Ingresar valor de pruebas para el campo caudal_captado de tipo int4",       
                                              'caudal_autorizado' => "Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4",       
                                              'id_problema_fuente' => "Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4",       
                                              'especifique' => "Ingresar valor de pruebas para el campo especifique de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdDetallesFuenteController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdDetallesFuenteController('FdDetallesFuenteController','frontend\controllers\poc\FdDetallesFuenteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesFuenteController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdDetallesFuenteController' => [
                                         'id_detalles_fuente' => "Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4",       
                                          'nombre_fuente' => "Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar",       
                                          'id_t_fuente' => "Ingresar valor de pruebas para el campo id_t_fuente de tipo int4",       
                                          'coor_x' => "Ingresar valor de pruebas para el campo coor_x de tipo int4",       
                                          'coor_y' => "Ingresar valor de pruebas para el campo coor_y de tipo int4",       
                                          'coor_z' => "Ingresar valor de pruebas para el campo coor_z de tipo int4",       
                                          'caudal_captado' => "Ingresar valor de pruebas para el campo caudal_captado de tipo int4",       
                                          'caudal_autorizado' => "Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4",       
                                          'id_problema_fuente' => "Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4",       
                                          'especifique' => "Ingresar valor de pruebas para el campo especifique de tipo varchar",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                          'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdDetallesFuenteController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDetallesFuenteController('FdDetallesFuenteController','frontend\controllers\poc\FdDetallesFuenteController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesFuenteController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdDetallesFuenteController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
