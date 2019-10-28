<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdParamEvaluacionesController;


/**
 * FdParamEvaluacionesControllerTest implementa las acciones a través del sistema CRUD para el modelo FdParamEvaluaciones.
 */
class FdParamEvaluacionesControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdParamEvaluacionesController('FdParamEvaluacionesController','frontend\controllers\poc\FdParamEvaluacionesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamEvaluacionesController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdParamEvaluacionesController('FdParamEvaluacionesController','frontend\controllers\poc\FdParamEvaluacionesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamEvaluacionesController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdparamevaluaciones/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdParamEvaluaciones que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdParamEvaluacionesController('FdParamEvaluacionesController','frontend\controllers\poc\FdParamEvaluacionesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamEvaluacionesController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdParamEvaluacionesSearch' => [
                                             'id_evaluacion' => "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4",       
                                              'componente' => "Ingresar valor de pruebas para el campo componente de tipo varchar",       
                                              'criterio' => "Ingresar valor de pruebas para el campo criterio de tipo varchar",       
                                              'item' => "Ingresar valor de pruebas para el campo item de tipo int4",       
                                              'condicionante' => "Ingresar valor de pruebas para el campo condicionante de tipo varchar",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'tipo_valoracion' => "Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4",       
                                              'porcentaje_ponderacion' => "Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4",       
                                              'puntuacion' => "Ingresar valor de pruebas para el campo puntuacion de tipo numeric",       
                                              'formato' => "Ingresar valor de pruebas para el campo formato de tipo int4",       
                                              'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdParamEvaluacionesController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdParamEvaluacionesController('FdParamEvaluacionesController','frontend\controllers\poc\FdParamEvaluacionesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamEvaluacionesController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdParamEvaluacionesController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdParamEvaluacionesController('FdParamEvaluacionesController','frontend\controllers\poc\FdParamEvaluacionesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamEvaluacionesController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdParamEvaluacionesController' => [
                                             'id_evaluacion' => "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4",       
                                              'componente' => "Ingresar valor de pruebas para el campo componente de tipo varchar",       
                                              'criterio' => "Ingresar valor de pruebas para el campo criterio de tipo varchar",       
                                              'item' => "Ingresar valor de pruebas para el campo item de tipo int4",       
                                              'condicionante' => "Ingresar valor de pruebas para el campo condicionante de tipo varchar",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'tipo_valoracion' => "Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4",       
                                              'porcentaje_ponderacion' => "Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4",       
                                              'puntuacion' => "Ingresar valor de pruebas para el campo puntuacion de tipo numeric",       
                                              'formato' => "Ingresar valor de pruebas para el campo formato de tipo int4",       
                                              'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdParamEvaluacionesController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdParamEvaluacionesController('FdParamEvaluacionesController','frontend\controllers\poc\FdParamEvaluacionesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamEvaluacionesController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdParamEvaluacionesController' => [
                                         'id_evaluacion' => "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4",       
                                          'componente' => "Ingresar valor de pruebas para el campo componente de tipo varchar",       
                                          'criterio' => "Ingresar valor de pruebas para el campo criterio de tipo varchar",       
                                          'item' => "Ingresar valor de pruebas para el campo item de tipo int4",       
                                          'condicionante' => "Ingresar valor de pruebas para el campo condicionante de tipo varchar",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'tipo_valoracion' => "Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4",       
                                          'porcentaje_ponderacion' => "Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4",       
                                          'puntuacion' => "Ingresar valor de pruebas para el campo puntuacion de tipo numeric",       
                                          'formato' => "Ingresar valor de pruebas para el campo formato de tipo int4",       
                                          'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdParamEvaluacionesController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdParamEvaluacionesController('FdParamEvaluacionesController','frontend\controllers\poc\FdParamEvaluacionesController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdParamEvaluacionesController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdParamEvaluacionesController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
