<?php

namespace frontend\tests\unit\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaReporteInformacionControllerFachada;
/**
 * CdaReporteInformacionControllerFachadaTest implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaReporteInformacion.
 */
class CdaReporteInformacionControllerFachadaTest extends \Codeception\Test\Unit
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
        $tester = new  CdaReporteInformacionControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionControllerFachada', $tester);
        
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
        $tester = new  CdaReporteInformacionControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionControllerFachada', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
         $urlroute='/cdareporteinformacion/index';
         $id=null;
        //Se obtiene los valores para la barra de progreso
           $progressbar= $tester->actionProgress($urlroute,$id);
        //Se evalua caso exitoso   
        $this->assertNotEmpty($progressbar,
           'Se devolvio Vacio el html de actionProgress ');  

    }

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionControllerFachada', $tester);
        
        
        // Se declaran los $queryParams a enviar
            $queryParams = ['CdaReporteInformacionSearch' => [
                                             'sector_solicitado' => "Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar",       
                                              'institucion_solicitante' => "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar",       
                                              'solicitante' => "Ingresar valor de pruebas para el campo solicitante de tipo varchar",       
                                              'fuente_solicitada' => "Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar",       
                                              'q_solicitado' => "Ingresar valor de pruebas para el campo q_solicitado de tipo numeric",       
                                              'tiempo_years' => "Ingresar valor de pruebas para el campo tiempo_years de tipo int4",       
                                              'id_tfuente' => "Ingresar valor de pruebas para el campo id_tfuente de tipo int4",       
                                              'id_subtfuente' => "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4",       
                                              'id_caracteristica' => "Ingresar valor de pruebas para el campo id_caracteristica de tipo int4",       
                                              'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",       
                                              'id_destino' => "Ingresar valor de pruebas para el campo id_destino de tipo int4",       
                                              'id_uso_solicitado' => "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4",       
                                              'id_ubicacion' => "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4",       
                                              'id_coordenada' => "Ingresar valor de pruebas para el campo id_coordenada de tipo int4",       
                                              'id_reporte_informacion' => "Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4",       
                                              'abscisa' => "Ingresar valor de pruebas para el campo abscisa de tipo numeric",       
                                              'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",       
                                              'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",       
                                              'proba_excedencia_obtenida' => "Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric",       
                                              'proba_excedencia_certificado' => "Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric",       
                                              'decision' => "Ingresar valor de pruebas para el campo decision de tipo varchar",       
                                              'observaciones_decision' => "Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar",       
                                              'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",       
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
     * Presenta un dato unico en el modelo CdaReporteInformacion.
     * @param integer $id
     * @return mixed
     */
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionControllerFachada', $tester);
    
        // se deben declarar los valores de $id        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
              
        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
             $actionView= $tester->actionView($id);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,
                    'Se devolvio nullo actionView ');  
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionControllerFachada', $tester);
             
            // Se declaran el rquest
              $request =  ['CdaReporteInformacionControllerFachada' => [
                                'sector_solicitado' => 'Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar',
                             'institucion_solicitante' => 'Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar',
                             'solicitante' => 'Ingresar valor de pruebas para el campo solicitante de tipo varchar',
                             'fuente_solicitada' => 'Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar',
                             'q_solicitado' => 'Ingresar valor de pruebas para el campo q_solicitado de tipo numeric',
                             'tiempo_years' => 'Ingresar valor de pruebas para el campo tiempo_years de tipo int4',
                             'id_tfuente' => 'Ingresar valor de pruebas para el campo id_tfuente de tipo int4',
                             'id_subtfuente' => 'Ingresar valor de pruebas para el campo id_subtfuente de tipo int4',
                             'id_caracteristica' => 'Ingresar valor de pruebas para el campo id_caracteristica de tipo int4',
                             'id_treporte' => 'Ingresar valor de pruebas para el campo id_treporte de tipo int4',
                             'id_destino' => 'Ingresar valor de pruebas para el campo id_destino de tipo int4',
                             'id_uso_solicitado' => 'Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4',
                             'id_ubicacion' => 'Ingresar valor de pruebas para el campo id_ubicacion de tipo int4',
                             'id_coordenada' => 'Ingresar valor de pruebas para el campo id_coordenada de tipo int4',
                             'id_reporte_informacion' => 'Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4',
                             'abscisa' => 'Ingresar valor de pruebas para el campo abscisa de tipo numeric',
                             'id_cda' => 'Ingresar valor de pruebas para el campo id_cda de tipo int4',
                             'observaciones' => 'Ingresar valor de pruebas para el campo observaciones de tipo varchar',
                             'proba_excedencia_obtenida' => 'Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric',
                             'proba_excedencia_certificado' => 'Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric',
                             'decision' => 'Ingresar valor de pruebas para el campo decision de tipo varchar',
                             'observaciones_decision' => 'Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar',
                             'id_actividad' => 'Ingresar valor de pruebas para el campo id_actividad de tipo int4',
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
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionControllerFachada', $tester);
        
         // Se declaran el rquest
              $request =  ['CdaReporteInformacionControllerFachada' => [
                                'sector_solicitado' => 'Ingresar valor de pruebas para el campo sector_solicitado de tipo varchar',
                             'institucion_solicitante' => 'Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar',
                             'solicitante' => 'Ingresar valor de pruebas para el campo solicitante de tipo varchar',
                             'fuente_solicitada' => 'Ingresar valor de pruebas para el campo fuente_solicitada de tipo varchar',
                             'q_solicitado' => 'Ingresar valor de pruebas para el campo q_solicitado de tipo numeric',
                             'tiempo_years' => 'Ingresar valor de pruebas para el campo tiempo_years de tipo int4',
                             'id_tfuente' => 'Ingresar valor de pruebas para el campo id_tfuente de tipo int4',
                             'id_subtfuente' => 'Ingresar valor de pruebas para el campo id_subtfuente de tipo int4',
                             'id_caracteristica' => 'Ingresar valor de pruebas para el campo id_caracteristica de tipo int4',
                             'id_treporte' => 'Ingresar valor de pruebas para el campo id_treporte de tipo int4',
                             'id_destino' => 'Ingresar valor de pruebas para el campo id_destino de tipo int4',
                             'id_uso_solicitado' => 'Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4',
                             'id_ubicacion' => 'Ingresar valor de pruebas para el campo id_ubicacion de tipo int4',
                             'id_coordenada' => 'Ingresar valor de pruebas para el campo id_coordenada de tipo int4',
                             'id_reporte_informacion' => 'Ingresar valor de pruebas para el campo id_reporte_informacion de tipo int4',
                             'abscisa' => 'Ingresar valor de pruebas para el campo abscisa de tipo numeric',
                             'id_cda' => 'Ingresar valor de pruebas para el campo id_cda de tipo int4',
                             'observaciones' => 'Ingresar valor de pruebas para el campo observaciones de tipo varchar',
                             'proba_excedencia_obtenida' => 'Ingresar valor de pruebas para el campo proba_excedencia_obtenida de tipo numeric',
                             'proba_excedencia_certificado' => 'Ingresar valor de pruebas para el campo proba_excedencia_certificado de tipo numeric',
                             'decision' => 'Ingresar valor de pruebas para el campo decision de tipo varchar',
                             'observaciones_decision' => 'Ingresar valor de pruebas para el campo observaciones_decision de tipo varchar',
                             'id_actividad' => 'Ingresar valor de pruebas para el campo id_actividad de tipo int4',
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
     * Deletes an existing CdaReporteInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function testActionDeletep()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionControllerFachada', $tester);
        
        
        // se deben llenar los siguientes valores
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                
        // se valida que se pueda realizar el borrado del registro
        expect($tester->actionDeletep($id));

    }
    

}
