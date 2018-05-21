<?php

namespace frontend\tests\unit\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaReporteInformacionController;


/**
 * CdaReporteInformacionControllerTest implementa las acciones a través del sistema CRUD para el modelo CdaReporteInformacion.
 */
class CdaReporteInformacionControllerTest extends \Codeception\Test\Unit
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
        $tester = new  CdaReporteInformacionController('CdaReporteInformacionController','frontend\controllers\cda\CdaReporteInformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionController('CdaReporteInformacionController','frontend\controllers\cda\CdaReporteInformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/cdareporteinformacion/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionController('CdaReporteInformacionController','frontend\controllers\cda\CdaReporteInformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
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
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('CdaReporteInformacionController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionController('CdaReporteInformacionController','frontend\controllers\cda\CdaReporteInformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('CdaReporteInformacionController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionController('CdaReporteInformacionController','frontend\controllers\cda\CdaReporteInformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['CdaReporteInformacionController' => [
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
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('CdaReporteInformacionController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionController('CdaReporteInformacionController','frontend\controllers\cda\CdaReporteInformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['CdaReporteInformacionController' => [
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
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('CdaReporteInformacionController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  CdaReporteInformacionController('CdaReporteInformacionController','frontend\controllers\cda\CdaReporteInformacionController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('frontend\controllers\cda\CdaReporteInformacionController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(CdaReporteInformacionController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
