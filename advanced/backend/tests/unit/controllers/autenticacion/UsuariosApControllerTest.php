<?php

namespace backend\tests\unit\controllers\autenticacion;

use Yii;
use backend\controllers\autenticacion\UsuariosApController;


/**
 * UsuariosApControllerTest implementa las acciones a través del sistema CRUD para el modelo UsuariosAp.
 */
class UsuariosApControllerTest extends \Codeception\Test\Unit
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
        $tester = new  UsuariosApController('UsuariosApController','backend\controllers\autenticacion\UsuariosApController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\autenticacion\UsuariosApController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  UsuariosApController('UsuariosApController','backend\controllers\autenticacion\UsuariosApController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\autenticacion\UsuariosApController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/usuariosap/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo UsuariosAp que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  UsuariosApController('UsuariosApController','backend\controllers\autenticacion\UsuariosApController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\autenticacion\UsuariosApController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['UsuariosApSearch' => [
                                             'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",       
                                              'usuario' => "Ingresar valor de pruebas para el campo usuario de tipo varchar",       
                                              'clave' => "Ingresar valor de pruebas para el campo clave de tipo varchar",       
                                              'login' => "Ingresar valor de pruebas para el campo login de tipo varchar",       
                                              'tipo_usuario' => "Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar",       
                                              'estado_usuario' => "Ingresar valor de pruebas para el campo estado_usuario de tipo varchar",       
                                              'identificacion' => "Ingresar valor de pruebas para el campo identificacion de tipo numeric",       
                                              'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",       
                                              'usuario_digitador' => "Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar",       
                                              'fecha_digitacion' => "Ingresar valor de pruebas para el campo fecha_digitacion de tipo date",       
                                              'email' => "Ingresar valor de pruebas para el campo email de tipo varchar",       
                                              'auth_key' => "Ingresar valor de pruebas para el campo auth_key de tipo varchar",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('UsuariosApController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  UsuariosApController('UsuariosApController','backend\controllers\autenticacion\UsuariosApController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\autenticacion\UsuariosApController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('UsuariosApController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  UsuariosApController('UsuariosApController','backend\controllers\autenticacion\UsuariosApController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\autenticacion\UsuariosApController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['UsuariosApController' => [
                                             'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",       
                                              'usuario' => "Ingresar valor de pruebas para el campo usuario de tipo varchar",       
                                              'clave' => "Ingresar valor de pruebas para el campo clave de tipo varchar",       
                                              'login' => "Ingresar valor de pruebas para el campo login de tipo varchar",       
                                              'tipo_usuario' => "Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar",       
                                              'estado_usuario' => "Ingresar valor de pruebas para el campo estado_usuario de tipo varchar",       
                                              'identificacion' => "Ingresar valor de pruebas para el campo identificacion de tipo numeric",       
                                              'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",       
                                              'usuario_digitador' => "Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar",       
                                              'fecha_digitacion' => "Ingresar valor de pruebas para el campo fecha_digitacion de tipo date",       
                                              'email' => "Ingresar valor de pruebas para el campo email de tipo varchar",       
                                              'auth_key' => "Ingresar valor de pruebas para el campo auth_key de tipo varchar",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('UsuariosApController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  UsuariosApController('UsuariosApController','backend\controllers\autenticacion\UsuariosApController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\autenticacion\UsuariosApController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['UsuariosApController' => [
                                         'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",       
                                          'usuario' => "Ingresar valor de pruebas para el campo usuario de tipo varchar",       
                                          'clave' => "Ingresar valor de pruebas para el campo clave de tipo varchar",       
                                          'login' => "Ingresar valor de pruebas para el campo login de tipo varchar",       
                                          'tipo_usuario' => "Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar",       
                                          'estado_usuario' => "Ingresar valor de pruebas para el campo estado_usuario de tipo varchar",       
                                          'identificacion' => "Ingresar valor de pruebas para el campo identificacion de tipo numeric",       
                                          'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",       
                                          'usuario_digitador' => "Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar",       
                                          'fecha_digitacion' => "Ingresar valor de pruebas para el campo fecha_digitacion de tipo date",       
                                          'email' => "Ingresar valor de pruebas para el campo email de tipo varchar",       
                                          'auth_key' => "Ingresar valor de pruebas para el campo auth_key de tipo varchar",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('UsuariosApController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  UsuariosApController('UsuariosApController','backend\controllers\autenticacion\UsuariosApController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\autenticacion\UsuariosApController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(UsuariosApController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
