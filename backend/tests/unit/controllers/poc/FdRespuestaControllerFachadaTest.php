<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdRespuestaControllerFachada;
/**
 * FdRespuestaControllerFachadaTest implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdRespuesta.
 */
class FdRespuestaControllerFachadaTest extends \Codeception\Test\Unit
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
        $tester = new  FdRespuestaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaControllerFachada', $tester);
        
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
        $tester = new  FdRespuestaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaControllerFachada', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
         $urlroute='/fdrespuesta/index';
         $id=null;
        //Se obtiene los valores para la barra de progreso
           $progressbar= $tester->actionProgress($urlroute,$id);
        //Se evalua caso exitoso   
        $this->assertNotEmpty($progressbar,
           'Se devolvio Vacio el html de actionProgress ');  

    }

	
	
    /**
     * Listado todos los datos del modelo FdRespuesta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaControllerFachada', $tester);
        
        
        // Se declaran los $queryParams a enviar
            $queryParams = ['FdRespuestaSearch' => [
                                             'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",       
                                              'ra_fecha' => "Ingresar valor de pruebas para el campo ra_fecha de tipo date",       
                                              'ra_check' => "Ingresar valor de pruebas para el campo ra_check de tipo varchar",       
                                              'ra_descripcion' => "Ingresar valor de pruebas para el campo ra_descripcion de tipo text",       
                                              'ra_entero' => "Ingresar valor de pruebas para el campo ra_entero de tipo int4",       
                                              'ra_decimal' => "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric",       
                                              'ra_porcentaje' => "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric",       
                                              'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",       
                                              'ra_moneda' => "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",       
                                              'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                              'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",       
                                              'cantidad_registros' => "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4",       
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
     * Presenta un dato unico en el modelo FdRespuesta.
     * @param integer $id
     * @return mixed
     */
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaControllerFachada', $tester);
    
        // se deben declarar los valores de $id        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
              
        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
             $actionView= $tester->actionView($id);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,
                    'Se devolvio nullo actionView ');  
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdRespuesta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaControllerFachada', $tester);
             
            // Se declaran el rquest
              $request =  ['FdRespuestaControllerFachada' => [
                                'id_respuesta' => 'Ingresar valor de pruebas para el campo id_respuesta de tipo int4',
                             'ra_fecha' => 'Ingresar valor de pruebas para el campo ra_fecha de tipo date',
                             'ra_check' => 'Ingresar valor de pruebas para el campo ra_check de tipo varchar',
                             'ra_descripcion' => 'Ingresar valor de pruebas para el campo ra_descripcion de tipo text',
                             'ra_entero' => 'Ingresar valor de pruebas para el campo ra_entero de tipo int4',
                             'ra_decimal' => 'Ingresar valor de pruebas para el campo ra_decimal de tipo numeric',
                             'ra_porcentaje' => 'Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric',
                             'id_conjunto_respuesta' => 'Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4',
                             'ra_moneda' => 'Ingresar valor de pruebas para el campo ra_moneda de tipo numeric',
                             'id_pregunta' => 'Ingresar valor de pruebas para el campo id_pregunta de tipo int4',
                             'id_opcion_select' => 'Ingresar valor de pruebas para el campo id_opcion_select de tipo int4',
                             'id_tpregunta' => 'Ingresar valor de pruebas para el campo id_tpregunta de tipo int4',
                             'id_capitulo' => 'Ingresar valor de pruebas para el campo id_capitulo de tipo int4',
                             'id_formato' => 'Ingresar valor de pruebas para el campo id_formato de tipo int4',
                             'id_conjunto_pregunta' => 'Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4',
                             'id_version' => 'Ingresar valor de pruebas para el campo id_version de tipo int4',
                             'cantidad_registros' => 'Ingresar valor de pruebas para el campo cantidad_registros de tipo int4',
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
     * Modifica un dato existente en el modelo FdRespuesta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaControllerFachada', $tester);
        
         // Se declaran el rquest
              $request =  ['FdRespuestaControllerFachada' => [
                                'id_respuesta' => 'Ingresar valor de pruebas para el campo id_respuesta de tipo int4',
                             'ra_fecha' => 'Ingresar valor de pruebas para el campo ra_fecha de tipo date',
                             'ra_check' => 'Ingresar valor de pruebas para el campo ra_check de tipo varchar',
                             'ra_descripcion' => 'Ingresar valor de pruebas para el campo ra_descripcion de tipo text',
                             'ra_entero' => 'Ingresar valor de pruebas para el campo ra_entero de tipo int4',
                             'ra_decimal' => 'Ingresar valor de pruebas para el campo ra_decimal de tipo numeric',
                             'ra_porcentaje' => 'Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric',
                             'id_conjunto_respuesta' => 'Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4',
                             'ra_moneda' => 'Ingresar valor de pruebas para el campo ra_moneda de tipo numeric',
                             'id_pregunta' => 'Ingresar valor de pruebas para el campo id_pregunta de tipo int4',
                             'id_opcion_select' => 'Ingresar valor de pruebas para el campo id_opcion_select de tipo int4',
                             'id_tpregunta' => 'Ingresar valor de pruebas para el campo id_tpregunta de tipo int4',
                             'id_capitulo' => 'Ingresar valor de pruebas para el campo id_capitulo de tipo int4',
                             'id_formato' => 'Ingresar valor de pruebas para el campo id_formato de tipo int4',
                             'id_conjunto_pregunta' => 'Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4',
                             'id_version' => 'Ingresar valor de pruebas para el campo id_version de tipo int4',
                             'cantidad_registros' => 'Ingresar valor de pruebas para el campo cantidad_registros de tipo int4',
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
     * Deletes an existing FdRespuesta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function testActionDeletep()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdRespuestaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdRespuestaControllerFachada', $tester);
        
        
        // se deben llenar los siguientes valores
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                
        // se valida que se pueda realizar el borrado del registro
        expect($tester->actionDeletep($id));

    }
    

}
