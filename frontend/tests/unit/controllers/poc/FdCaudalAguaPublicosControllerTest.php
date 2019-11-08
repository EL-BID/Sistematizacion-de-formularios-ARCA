<?php

namespace frontend\tests\unit\controllers\poc;

use Yii;
use frontend\controllers\poc\FdCaudalAguaPublicosController;


/**
 * FdCaudalAguaPublicosControllerTest implementa las acciones a través del sistema CRUD para el modelo FdCaudalAguaPublicos.
 */
class FdCaudalAguaPublicosControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdCaudalAguaPublicosController('FdCaudalAguaPublicosController','frontend\controllers\poc\FdCaudalAguaPublicosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdCaudalAguaPublicosController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdCaudalAguaPublicosController('FdCaudalAguaPublicosController','frontend\controllers\poc\FdCaudalAguaPublicosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdCaudalAguaPublicosController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdcaudalaguapublicos/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdCaudalAguaPublicos que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdCaudalAguaPublicosController('FdCaudalAguaPublicosController','frontend\controllers\poc\FdCaudalAguaPublicosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdCaudalAguaPublicosController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['FdCaudalAguaPublicosSearch' => [
                                             'id_caudal_agua_publicos' => "Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4",       
                                              'codigo' => "Ingresar valor de pruebas para el campo codigo de tipo varchar",       
                                              'enero' => "Ingresar valor de pruebas para el campo enero de tipo numeric",       
                                              'febrero' => "Ingresar valor de pruebas para el campo febrero de tipo numeric",       
                                              'marzo' => "Ingresar valor de pruebas para el campo marzo de tipo numeric",       
                                              'abril' => "Ingresar valor de pruebas para el campo abril de tipo numeric",       
                                              'mayo' => "Ingresar valor de pruebas para el campo mayo de tipo numeric",       
                                              'junio' => "Ingresar valor de pruebas para el campo junio de tipo numeric",       
                                              'julio' => "Ingresar valor de pruebas para el campo julio de tipo numeric",       
                                              'agosto' => "Ingresar valor de pruebas para el campo agosto de tipo numeric",       
                                              'septiembre' => "Ingresar valor de pruebas para el campo septiembre de tipo numeric",       
                                              'octubre' => "Ingresar valor de pruebas para el campo octubre de tipo numeric",       
                                              'noviembre' => "Ingresar valor de pruebas para el campo noviembre de tipo numeric",       
                                              'diciembre' => "Ingresar valor de pruebas para el campo diciembre de tipo numeric",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdCaudalAguaPublicosController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdCaudalAguaPublicosController('FdCaudalAguaPublicosController','frontend\controllers\poc\FdCaudalAguaPublicosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdCaudalAguaPublicosController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdCaudalAguaPublicosController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdCaudalAguaPublicosController('FdCaudalAguaPublicosController','frontend\controllers\poc\FdCaudalAguaPublicosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdCaudalAguaPublicosController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdCaudalAguaPublicosController' => [
                                             'id_caudal_agua_publicos' => "Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4",       
                                              'codigo' => "Ingresar valor de pruebas para el campo codigo de tipo varchar",       
                                              'enero' => "Ingresar valor de pruebas para el campo enero de tipo numeric",       
                                              'febrero' => "Ingresar valor de pruebas para el campo febrero de tipo numeric",       
                                              'marzo' => "Ingresar valor de pruebas para el campo marzo de tipo numeric",       
                                              'abril' => "Ingresar valor de pruebas para el campo abril de tipo numeric",       
                                              'mayo' => "Ingresar valor de pruebas para el campo mayo de tipo numeric",       
                                              'junio' => "Ingresar valor de pruebas para el campo junio de tipo numeric",       
                                              'julio' => "Ingresar valor de pruebas para el campo julio de tipo numeric",       
                                              'agosto' => "Ingresar valor de pruebas para el campo agosto de tipo numeric",       
                                              'septiembre' => "Ingresar valor de pruebas para el campo septiembre de tipo numeric",       
                                              'octubre' => "Ingresar valor de pruebas para el campo octubre de tipo numeric",       
                                              'noviembre' => "Ingresar valor de pruebas para el campo noviembre de tipo numeric",       
                                              'diciembre' => "Ingresar valor de pruebas para el campo diciembre de tipo numeric",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdCaudalAguaPublicosController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdCaudalAguaPublicosController('FdCaudalAguaPublicosController','frontend\controllers\poc\FdCaudalAguaPublicosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdCaudalAguaPublicosController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdCaudalAguaPublicosController' => [
                                         'id_caudal_agua_publicos' => "Ingresar valor de pruebas para el campo id_caudal_agua_publicos de tipo int4",       
                                          'codigo' => "Ingresar valor de pruebas para el campo codigo de tipo varchar",       
                                          'enero' => "Ingresar valor de pruebas para el campo enero de tipo numeric",       
                                          'febrero' => "Ingresar valor de pruebas para el campo febrero de tipo numeric",       
                                          'marzo' => "Ingresar valor de pruebas para el campo marzo de tipo numeric",       
                                          'abril' => "Ingresar valor de pruebas para el campo abril de tipo numeric",       
                                          'mayo' => "Ingresar valor de pruebas para el campo mayo de tipo numeric",       
                                          'junio' => "Ingresar valor de pruebas para el campo junio de tipo numeric",       
                                          'julio' => "Ingresar valor de pruebas para el campo julio de tipo numeric",       
                                          'agosto' => "Ingresar valor de pruebas para el campo agosto de tipo numeric",       
                                          'septiembre' => "Ingresar valor de pruebas para el campo septiembre de tipo numeric",       
                                          'octubre' => "Ingresar valor de pruebas para el campo octubre de tipo numeric",       
                                          'noviembre' => "Ingresar valor de pruebas para el campo noviembre de tipo numeric",       
                                          'diciembre' => "Ingresar valor de pruebas para el campo diciembre de tipo numeric",       
                                          'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                          'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                          'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                          'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdCaudalAguaPublicosController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdCaudalAguaPublicosController('FdCaudalAguaPublicosController','frontend\controllers\poc\FdCaudalAguaPublicosController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\poc\FdCaudalAguaPublicosController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('FdCaudalAguaPublicosController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
