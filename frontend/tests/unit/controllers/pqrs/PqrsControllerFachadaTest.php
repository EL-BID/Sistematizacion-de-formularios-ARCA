<?php

namespace frontend\tests\unit\controllers\pqrs;

use Yii;
use frontend\controllers\pqrs\PqrsControllerFachada;
/**
 * PqrsControllerFachadaTest implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Pqrs.
 */
class PqrsControllerFachadaTest extends \Codeception\Test\Unit
{

/**para mayor informacion sobre asserts => http://codeception.com/docs/modules/Asserts y http://codeception.com/10-04-2013/specification-phpunit.html**/
    
    public function _before()
    {
       // declaraciones y asignacion de valores que se deben tener para realizar las funciones test
    }

                                                               
                                                                                             
    public function _after()                                                              
    {             
            // funcion que se ejecuta despues de los test                                                      
    }                
    
 
    public function testBehaviors()
    {
        //Se declara el objeto a verificar
        $tester = new  PqrsControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsControllerFachada', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,                                                          
            'Se devolvio vacio behaviors');  
            
    }
	
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  PqrsControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsControllerFachada', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
         $urlroute='/pqrs/index';
         $id=null;
        //Se obtiene los valores para la barra de progreso
           $progressbar= $tester->actionProgress($urlroute,$id);
        //Se evalua caso exitoso   
        $this->assertNotEmpty($progressbar,
           'Se devolvio Vacio el html de actionProgress ');  

    }

	
	
    /**
     * Listado todos los datos del modelo Pqrs que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PqrsControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsControllerFachada', $tester);
        
        
        // Se declaran los $queryParams a enviar
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
                $actionindex= $tester->actionIndex($queryParams);
                         
              // se evaluan los casos exitosos
                $this->assertNotNull($actionindex['dataProvider'],                                                          
                    'Se devolvio nullo dataProvider de actionIndex ');  
                $this->assertNotNull($actionindex['searchModel'],                                                          
                    'Se devolvio nullo searchModel de actionIndex '); 
                    

                            
    }

    /**
     * Presenta un dato unico en el modelo Pqrs.
     * @param integer $id
     * @return mixed
     */
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  PqrsControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsControllerFachada', $tester);
    
        // se deben declarar los valores de $id        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
              
        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
             $actionView= $tester->actionView($id);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,
                    'Se devolvio nullo actionView ');  
 
    }

    /**
     * Crea un nuevo dato sobre el modelo Pqrs .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PqrsControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsControllerFachada', $tester);
             
            // Se declaran el rquest
              $request =  ['PqrsControllerFachada' => [
                                'id_pqrs' => 'Ingresar valor de pruebas para el campo id_pqrs de tipo int4',
                             'fecha_recepcion' => 'Ingresar valor de pruebas para el campo fecha_recepcion de tipo date',
                             'num_consecutivo' => 'Ingresar valor de pruebas para el campo num_consecutivo de tipo int4',
                             'sol_nombres' => 'Ingresar valor de pruebas para el campo sol_nombres de tipo varchar',
                             'sol_doc_identificacion' => 'Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4',
                             'sol_direccion' => 'Ingresar valor de pruebas para el campo sol_direccion de tipo varchar',
                             'sol_email' => 'Ingresar valor de pruebas para el campo sol_email de tipo varchar',
                             'sol_telefono' => 'Ingresar valor de pruebas para el campo sol_telefono de tipo varchar',
                             'en_nom_nombres' => 'Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar',
                             'en_nom_ruc' => 'Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4',
                             'en_nom_direccion' => 'Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar',
                             'en_nom_email' => 'Ingresar valor de pruebas para el campo en_nom_email de tipo varchar',
                             'en_nom_telefono' => 'Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar',
                             'aquien_dirige' => 'Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar',
                             'objeto_peticion' => 'Ingresar valor de pruebas para el campo objeto_peticion de tipo text',
                             'descripcion_peticion' => 'Ingresar valor de pruebas para el campo descripcion_peticion de tipo text',
                             'subtipo_queja' => 'Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar',
                             'subtipo_reclamo' => 'Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar',
                             'subtipo_controversia' => 'Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar',
                             'por_quien_qrc' => 'Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar',
                             'lugar_hechos' => 'Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar',
                             'fecha_hechos' => 'Ingresar valor de pruebas para el campo fecha_hechos de tipo date',
                             'naracion_hechos' => 'Ingresar valor de pruebas para el campo naracion_hechos de tipo text',
                             'elementos_probatorios' => 'Ingresar valor de pruebas para el campo elementos_probatorios de tipo text',
                             'denunc_nombre' => 'Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar',
                             'denunc_direccion' => 'Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar',
                             'denunc_telefono' => 'Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar',
                             'subtipo_sugerencia' => 'Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar',
                             'subtipo_felicitacion' => 'Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar',
                             'descripcion_sugerencia' => 'Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text',
                             'sol_cod_provincia' => 'Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar',
                             'sol_cod_canton' => 'Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar',
                             'en_nom_cod_provincia' => 'Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar',
                             'en_nom_cod_canton' => 'Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar',
                             'id_cproceso' => 'Ingresar valor de pruebas para el campo id_cproceso de tipo int4',
                          ]];
            
                $actionCreate = $tester->actionCreate($request,false);
                
                // se evaluan que se devuleva la informacion          
                $this->assertCount(0,$actionCreate['model']['_errors'],                                                          
                        'Se devolvieron errores en el model de actionCreate, verifique por favor');   
                $this->assertNotEmpty($actionCreate['create'],                                                          
                        'Se devolvio nulo el create de actionCreate '); 
                        
        /**Para imprimir los errores 
         * $this->assert($actionCreate['model']['_errors'],
                        'Se devolvieron errores en el model de actionCreate, verifique por favor')***/


    }

   
     /**
     * Modifica un dato existente en el modelo Pqrs.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  PqrsControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsControllerFachada', $tester);
        
         // Se declaran el rquest
              $request =  ['PqrsControllerFachada' => [
                                'id_pqrs' => 'Ingresar valor de pruebas para el campo id_pqrs de tipo int4',
                             'fecha_recepcion' => 'Ingresar valor de pruebas para el campo fecha_recepcion de tipo date',
                             'num_consecutivo' => 'Ingresar valor de pruebas para el campo num_consecutivo de tipo int4',
                             'sol_nombres' => 'Ingresar valor de pruebas para el campo sol_nombres de tipo varchar',
                             'sol_doc_identificacion' => 'Ingresar valor de pruebas para el campo sol_doc_identificacion de tipo int4',
                             'sol_direccion' => 'Ingresar valor de pruebas para el campo sol_direccion de tipo varchar',
                             'sol_email' => 'Ingresar valor de pruebas para el campo sol_email de tipo varchar',
                             'sol_telefono' => 'Ingresar valor de pruebas para el campo sol_telefono de tipo varchar',
                             'en_nom_nombres' => 'Ingresar valor de pruebas para el campo en_nom_nombres de tipo varchar',
                             'en_nom_ruc' => 'Ingresar valor de pruebas para el campo en_nom_ruc de tipo int4',
                             'en_nom_direccion' => 'Ingresar valor de pruebas para el campo en_nom_direccion de tipo varchar',
                             'en_nom_email' => 'Ingresar valor de pruebas para el campo en_nom_email de tipo varchar',
                             'en_nom_telefono' => 'Ingresar valor de pruebas para el campo en_nom_telefono de tipo varchar',
                             'aquien_dirige' => 'Ingresar valor de pruebas para el campo aquien_dirige de tipo varchar',
                             'objeto_peticion' => 'Ingresar valor de pruebas para el campo objeto_peticion de tipo text',
                             'descripcion_peticion' => 'Ingresar valor de pruebas para el campo descripcion_peticion de tipo text',
                             'subtipo_queja' => 'Ingresar valor de pruebas para el campo subtipo_queja de tipo varchar',
                             'subtipo_reclamo' => 'Ingresar valor de pruebas para el campo subtipo_reclamo de tipo varchar',
                             'subtipo_controversia' => 'Ingresar valor de pruebas para el campo subtipo_controversia de tipo varchar',
                             'por_quien_qrc' => 'Ingresar valor de pruebas para el campo por_quien_qrc de tipo varchar',
                             'lugar_hechos' => 'Ingresar valor de pruebas para el campo lugar_hechos de tipo varchar',
                             'fecha_hechos' => 'Ingresar valor de pruebas para el campo fecha_hechos de tipo date',
                             'naracion_hechos' => 'Ingresar valor de pruebas para el campo naracion_hechos de tipo text',
                             'elementos_probatorios' => 'Ingresar valor de pruebas para el campo elementos_probatorios de tipo text',
                             'denunc_nombre' => 'Ingresar valor de pruebas para el campo denunc_nombre de tipo varchar',
                             'denunc_direccion' => 'Ingresar valor de pruebas para el campo denunc_direccion de tipo varchar',
                             'denunc_telefono' => 'Ingresar valor de pruebas para el campo denunc_telefono de tipo varchar',
                             'subtipo_sugerencia' => 'Ingresar valor de pruebas para el campo subtipo_sugerencia de tipo varchar',
                             'subtipo_felicitacion' => 'Ingresar valor de pruebas para el campo subtipo_felicitacion de tipo varchar',
                             'descripcion_sugerencia' => 'Ingresar valor de pruebas para el campo descripcion_sugerencia de tipo text',
                             'sol_cod_provincia' => 'Ingresar valor de pruebas para el campo sol_cod_provincia de tipo varchar',
                             'sol_cod_canton' => 'Ingresar valor de pruebas para el campo sol_cod_canton de tipo varchar',
                             'en_nom_cod_provincia' => 'Ingresar valor de pruebas para el campo en_nom_cod_provincia de tipo varchar',
                             'en_nom_cod_canton' => 'Ingresar valor de pruebas para el campo en_nom_cod_canton de tipo varchar',
                             'id_cproceso' => 'Ingresar valor de pruebas para el campo id_cproceso de tipo int4',
                          ]];
        
        
        //se valida que sea exitoso
        $actionUpdate= $tester->actionUpdate($id,$request,false);
        $this->assertCount(0,$actionUpdate['model']['_errors'],                                                                                                    
                        'Se devolvieron errores en el model de actionUpdate, verifique por favor');  
        $this->assertNotEmpty($actionUpdate['update'],                                                          
                'Se devolvio nulo el create de actionUpdate '); 

                
        /**Para imprimir los errores 
         * $this->assert($actionUpdate['model']['_errors'],
                        'Se devolvieron errores en el model de actionCreate, verifique por favor')***/

        
    }

    
     /**
     * Deletes an existing Pqrs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function testActionDeletep()
    {
    
        //Se declara el objeto a verificar
        $tester = new  PqrsControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\pqrs\PqrsControllerFachada', $tester);
        
        
        // se deben llenar los siguientes valores
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                
        // se valida que se pueda realizar el borrado del registro
        expect($tester->actionDeletep($id));

    }
    

}
