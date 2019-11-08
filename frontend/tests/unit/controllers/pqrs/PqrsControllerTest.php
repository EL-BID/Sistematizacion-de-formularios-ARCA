<?php

namespace frontend\tests\unit\controllers\pqrs;

use Yii;
use frontend\controllers\pqrs\PqrsController;


/**
 * PqrsControllerTest implementa las acciones a través del sistema CRUD para el modelo Pqrs.
 */
class PqrsControllerTest extends \Codeception\Test\Unit
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
        $tester = new  PqrsController('PqrsController','frontend\controllers\pqrs\PqrsController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  PqrsController('PqrsController','frontend\controllers\pqrs\PqrsController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/pqrs/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo Pqrs que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PqrsController('PqrsController','frontend\controllers\pqrs\PqrsController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
            $queryParams = ['PqrsSearch' => [
                                             'id_pqrs' => "Ingresar valor de pruebas para el campo id_pqrs de tipo int4",       
                                              'fecha_recepcion' => "Ingresar valor de pruebas para el campo fecha_recepcion de tipo date",       
                                              'num_consecutivo' => "Ingresar valor de pruebas para el campo num_consecutivo de tipo int4",       
                                              'sol_nombres' => "Ingresar valor de pruebas para el campo sol_nombres de tipo varchar",       
                                              'sol_doc_identificacion' => "Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4",       
                                              'sol_direccion' => "Ingresar valor de pruebas para el campo sol_direccion de tipo varchar",       
                                              'sol_email' => "Ingresar valor de pruebas para el campo sol_email de tipo varchar",       
                                              'sol_telefono' => "Ingresar valor de pruebas para el campo sol_telefono de tipo varchar",       
                                              'en_nom_nombres' => "Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar",       
                                              'en_nom_ruc' => "Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4",       
                                              'en_nom_direccion' => "Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar",       
                                              'en_nom_email' => "Ingresar valor de pruebas para el campo en_nom_email de tipo varchar",       
                                              'en_nom_telefono' => "Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar",       
                                              'aquien_dirige' => "Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar",       
                                              'objeto_peticion' => "Ingresar valor de pruebas para el campo objeto_peticion de tipo text",       
                                              'descripcion_peticion' => "Ingresar valor de pruebas para el campo descripcion_peticion de tipo text",       
                                              'subtipo_queja' => "Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar",       
                                              'subtipo_reclamo' => "Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar",       
                                              'subtipo_controversia' => "Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar",       
                                              'por_quien_qrc' => "Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar",       
                                              'lugar_hechos' => "Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar",       
                                              'fecha_hechos' => "Ingresar valor de pruebas para el campo fecha_hechos de tipo date",       
                                              'naracion_hechos' => "Ingresar valor de pruebas para el campo naracion_hechos de tipo text",       
                                              'elementos_probatorios' => "Ingresar valor de pruebas para el campo elementos_probatorios de tipo text",       
                                              'denunc_nombre' => "Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar",       
                                              'denunc_direccion' => "Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar",       
                                              'denunc_telefono' => "Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar",       
                                              'subtipo_sugerencia' => "Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar",       
                                              'subtipo_felicitacion' => "Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar",       
                                              'descripcion_sugerencia' => "Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text",       
                                              'sol_cod_provincia' => "Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar",       
                                              'sol_cod_canton' => "Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar",       
                                              'en_nom_cod_provincia' => "Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar",       
                                              'en_nom_cod_canton' => "Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar",       
                                              'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index     
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('PqrsController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  PqrsController('PqrsController','frontend\controllers\pqrs\PqrsController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('PqrsController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PqrsController('PqrsController','frontend\controllers\pqrs\PqrsController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['PqrsController' => [
                                             'id_pqrs' => "Ingresar valor de pruebas para el campo id_pqrs de tipo int4",       
                                              'fecha_recepcion' => "Ingresar valor de pruebas para el campo fecha_recepcion de tipo date",       
                                              'num_consecutivo' => "Ingresar valor de pruebas para el campo num_consecutivo de tipo int4",       
                                              'sol_nombres' => "Ingresar valor de pruebas para el campo sol_nombres de tipo varchar",       
                                              'sol_doc_identificacion' => "Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4",       
                                              'sol_direccion' => "Ingresar valor de pruebas para el campo sol_direccion de tipo varchar",       
                                              'sol_email' => "Ingresar valor de pruebas para el campo sol_email de tipo varchar",       
                                              'sol_telefono' => "Ingresar valor de pruebas para el campo sol_telefono de tipo varchar",       
                                              'en_nom_nombres' => "Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar",       
                                              'en_nom_ruc' => "Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4",       
                                              'en_nom_direccion' => "Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar",       
                                              'en_nom_email' => "Ingresar valor de pruebas para el campo en_nom_email de tipo varchar",       
                                              'en_nom_telefono' => "Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar",       
                                              'aquien_dirige' => "Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar",       
                                              'objeto_peticion' => "Ingresar valor de pruebas para el campo objeto_peticion de tipo text",       
                                              'descripcion_peticion' => "Ingresar valor de pruebas para el campo descripcion_peticion de tipo text",       
                                              'subtipo_queja' => "Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar",       
                                              'subtipo_reclamo' => "Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar",       
                                              'subtipo_controversia' => "Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar",       
                                              'por_quien_qrc' => "Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar",       
                                              'lugar_hechos' => "Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar",       
                                              'fecha_hechos' => "Ingresar valor de pruebas para el campo fecha_hechos de tipo date",       
                                              'naracion_hechos' => "Ingresar valor de pruebas para el campo naracion_hechos de tipo text",       
                                              'elementos_probatorios' => "Ingresar valor de pruebas para el campo elementos_probatorios de tipo text",       
                                              'denunc_nombre' => "Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar",       
                                              'denunc_direccion' => "Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar",       
                                              'denunc_telefono' => "Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar",       
                                              'subtipo_sugerencia' => "Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar",       
                                              'subtipo_felicitacion' => "Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar",       
                                              'descripcion_sugerencia' => "Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text",       
                                              'sol_cod_provincia' => "Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar",       
                                              'sol_cod_canton' => "Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar",       
                                              'en_nom_cod_provincia' => "Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar",       
                                              'en_nom_cod_canton' => "Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar",       
                                              'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                              ]];
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('PqrsController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  PqrsController('PqrsController','frontend\controllers\pqrs\PqrsController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['PqrsController' => [
                                         'id_pqrs' => "Ingresar valor de pruebas para el campo id_pqrs de tipo int4",       
                                          'fecha_recepcion' => "Ingresar valor de pruebas para el campo fecha_recepcion de tipo date",       
                                          'num_consecutivo' => "Ingresar valor de pruebas para el campo num_consecutivo de tipo int4",       
                                          'sol_nombres' => "Ingresar valor de pruebas para el campo sol_nombres de tipo varchar",       
                                          'sol_doc_identificacion' => "Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4",       
                                          'sol_direccion' => "Ingresar valor de pruebas para el campo sol_direccion de tipo varchar",       
                                          'sol_email' => "Ingresar valor de pruebas para el campo sol_email de tipo varchar",       
                                          'sol_telefono' => "Ingresar valor de pruebas para el campo sol_telefono de tipo varchar",       
                                          'en_nom_nombres' => "Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar",       
                                          'en_nom_ruc' => "Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4",       
                                          'en_nom_direccion' => "Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar",       
                                          'en_nom_email' => "Ingresar valor de pruebas para el campo en_nom_email de tipo varchar",       
                                          'en_nom_telefono' => "Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar",       
                                          'aquien_dirige' => "Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar",       
                                          'objeto_peticion' => "Ingresar valor de pruebas para el campo objeto_peticion de tipo text",       
                                          'descripcion_peticion' => "Ingresar valor de pruebas para el campo descripcion_peticion de tipo text",       
                                          'subtipo_queja' => "Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar",       
                                          'subtipo_reclamo' => "Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar",       
                                          'subtipo_controversia' => "Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar",       
                                          'por_quien_qrc' => "Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar",       
                                          'lugar_hechos' => "Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar",       
                                          'fecha_hechos' => "Ingresar valor de pruebas para el campo fecha_hechos de tipo date",       
                                          'naracion_hechos' => "Ingresar valor de pruebas para el campo naracion_hechos de tipo text",       
                                          'elementos_probatorios' => "Ingresar valor de pruebas para el campo elementos_probatorios de tipo text",       
                                          'denunc_nombre' => "Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar",       
                                          'denunc_direccion' => "Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar",       
                                          'denunc_telefono' => "Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar",       
                                          'subtipo_sugerencia' => "Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar",       
                                          'subtipo_felicitacion' => "Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar",       
                                          'descripcion_sugerencia' => "Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text",       
                                          'sol_cod_provincia' => "Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar",       
                                          'sol_cod_canton' => "Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar",       
                                          'en_nom_cod_provincia' => "Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar",       
                                          'en_nom_cod_canton' => "Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar",       
                                          'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",       
                          ]];
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('PqrsController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  PqrsController('PqrsController','frontend\controllers\pqrs\PqrsController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction('PqrsController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
