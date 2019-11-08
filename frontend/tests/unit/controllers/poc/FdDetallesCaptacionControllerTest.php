<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdDetallesCaptacionController;


/**
 * FdDetallesCaptacionControllerTest implementa las acciones a través del sistema CRUD para el modelo FdDetallesCaptacion.
 */
class FdDetallesCaptacionControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdDetallesCaptacionController('FdDetallesCaptacionController','frontend\controllers\poc\FdDetallesCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesCaptacionController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdDetallesCaptacionController('FdDetallesCaptacionController','frontend\controllers\poc\FdDetallesCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesCaptacionController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fddetallescaptacion/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdDetallesCaptacion que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDetallesCaptacionController('FdDetallesCaptacionController','frontend\controllers\poc\FdDetallesCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesCaptacionController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdDetallesCaptacionSearch' => [
                                             'id_detalles_captacion' => "Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4",       
                                              'nombre_captacion' => "Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar",       
                                              'id_estruc_hidrau' => "Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4",       
                                              'anio_construc' => "Ingresar valor de pruebas para el campo anio_construc de tipo int4",       
                                              'id_material_estruc' => "Ingresar valor de pruebas para el campo id_material_estruc de tipo int4",       
                                              'id_problema_capt' => "Ingresar valor de pruebas para el campo id_problema_capt de tipo int4",       
                                              'id_estado_capt' => "Ingresar valor de pruebas para el campo id_estado_capt de tipo int4",       
                                              'id_t_medicion' => "Ingresar valor de pruebas para el campo id_t_medicion de tipo int4",       
                                              'especifique_mat_estr' => "Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar",       
                                              'especifique_probl' => "Ingresar valor de pruebas para el campo especifique_probl de tipo varchar",       
                                              'especifique_t_med' => "Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdDetallesCaptacionController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdDetallesCaptacionController('FdDetallesCaptacionController','frontend\controllers\poc\FdDetallesCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesCaptacionController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdDetallesCaptacionController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDetallesCaptacionController('FdDetallesCaptacionController','frontend\controllers\poc\FdDetallesCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesCaptacionController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdDetallesCaptacionController' => [
                                             'id_detalles_captacion' => "Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4",       
                                              'nombre_captacion' => "Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar",       
                                              'id_estruc_hidrau' => "Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4",       
                                              'anio_construc' => "Ingresar valor de pruebas para el campo anio_construc de tipo int4",       
                                              'id_material_estruc' => "Ingresar valor de pruebas para el campo id_material_estruc de tipo int4",       
                                              'id_problema_capt' => "Ingresar valor de pruebas para el campo id_problema_capt de tipo int4",       
                                              'id_estado_capt' => "Ingresar valor de pruebas para el campo id_estado_capt de tipo int4",       
                                              'id_t_medicion' => "Ingresar valor de pruebas para el campo id_t_medicion de tipo int4",       
                                              'especifique_mat_estr' => "Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar",       
                                              'especifique_probl' => "Ingresar valor de pruebas para el campo especifique_probl de tipo varchar",       
                                              'especifique_t_med' => "Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdDetallesCaptacionController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdDetallesCaptacionController('FdDetallesCaptacionController','frontend\controllers\poc\FdDetallesCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesCaptacionController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdDetallesCaptacionController' => [
                                         'id_detalles_captacion' => "Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4",       
                                          'nombre_captacion' => "Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar",       
                                          'id_estruc_hidrau' => "Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4",       
                                          'anio_construc' => "Ingresar valor de pruebas para el campo anio_construc de tipo int4",       
                                          'id_material_estruc' => "Ingresar valor de pruebas para el campo id_material_estruc de tipo int4",       
                                          'id_problema_capt' => "Ingresar valor de pruebas para el campo id_problema_capt de tipo int4",       
                                          'id_estado_capt' => "Ingresar valor de pruebas para el campo id_estado_capt de tipo int4",       
                                          'id_t_medicion' => "Ingresar valor de pruebas para el campo id_t_medicion de tipo int4",       
                                          'especifique_mat_estr' => "Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar",       
                                          'especifique_probl' => "Ingresar valor de pruebas para el campo especifique_probl de tipo varchar",       
                                          'especifique_t_med' => "Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar",       
                                          'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                          'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdDetallesCaptacionController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdDetallesCaptacionController('FdDetallesCaptacionController','frontend\controllers\poc\FdDetallesCaptacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdDetallesCaptacionController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdDetallesCaptacionController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
