<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdPeriodoFormatoControllerFachada;
/**
 * FdPeriodoFormatoControllerFachadaTest implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdPeriodoFormato.
 */
class FdPeriodoFormatoControllerFachadaTest extends \Codeception\Test\Unit
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
        $tester = new  FdPeriodoFormatoControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoControllerFachada', $tester);
        
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
        $tester = new  FdPeriodoFormatoControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoControllerFachada', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
         $urlroute='/fdperiodoformato/index';
         $id=null;
        //Se obtiene los valores para la barra de progreso
           $progressbar= $tester->actionProgress($urlroute,$id);
        //Se evalua caso exitoso   
        $this->assertNotEmpty($progressbar,
           'Se devolvio Vacio el html de actionProgress ');  

    }

	
	
    /**
     * Listado todos los datos del modelo FdPeriodoFormato que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoControllerFachada', $tester);
        
        
        // Se declaran los $queryParams a enviar
            $queryParams = ['FdPeriodoFormatoSearch' => [
                                             'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",       
                                              'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",       
                                              'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",       
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
     * Presenta un dato unico en el modelo FdPeriodoFormato.
     * @param integer $id_formato
     * @param integer $id_periodo
     * @return mixed
     */
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoControllerFachada', $tester);
    
        // se deben declarar los valores de $id_formato, $id_periodo        
                        $id_formato = 'valor adecuado para el tipo de dato del paramtero $id_formato';
                 $id_periodo = 'valor adecuado para el tipo de dato del paramtero  $id_periodo';
              
        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id_formato, $id_periodo             
             $actionView= $tester->actionView($id_formato, $id_periodo);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,
                    'Se devolvio nullo actionView ');  
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdPeriodoFormato .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoControllerFachada', $tester);
             
            // Se declaran el rquest
              $request =  ['FdPeriodoFormatoControllerFachada' => [
                                'fecha_creacion' => 'Ingresar valor de pruebas para el campo fecha_creacion de tipo date',
                             'id_formato' => 'Ingresar valor de pruebas para el campo id_formato de tipo int4',
                             'id_periodo' => 'Ingresar valor de pruebas para el campo id_periodo de tipo int4',
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
     * Modifica un dato existente en el modelo FdPeriodoFormato.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id_formato
     * @param integer $id_periodo
     * @return mixed
     */
    public function testActionUpdate($id_formato, $id_periodo)
    {
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoControllerFachada', $tester);
        
         // Se declaran el rquest
              $request =  ['FdPeriodoFormatoControllerFachada' => [
                                'fecha_creacion' => 'Ingresar valor de pruebas para el campo fecha_creacion de tipo date',
                             'id_formato' => 'Ingresar valor de pruebas para el campo id_formato de tipo int4',
                             'id_periodo' => 'Ingresar valor de pruebas para el campo id_periodo de tipo int4',
                          ]];
        
        
        //se valida que sea exitoso
        $actionUpdate= $tester->actionUpdate($id_formato, $id_periodo,$request,false);
        $this->assertCount(0,$actionUpdate['model']['_errors'],                                                                                                    
                        'Se devolvieron errores en el model de actionUpdate, verifique por favor');  
        $this->assertNotEmpty($actionUpdate['update'],                                                          
                'Se devolvio nulo el create de actionUpdate '); 

                
        /**Para imprimir los errores 
         * $this->assert($actionUpdate['model']['_errors'],
                        'Se devolvieron errores en el model de actionCreate, verifique por favor')***/

        
    }

    
     /**
     * Deletes an existing FdPeriodoFormato model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_formato
     * @param integer $id_periodo
     * @return mixed
     */
    public function testActionDeletep()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPeriodoFormatoControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPeriodoFormatoControllerFachada', $tester);
        
        
        // se deben llenar los siguientes valores
                        $id_formato = 'valor adecuado para el tipo de dato del paramtero $id_formato';
                 $id_periodo = 'valor adecuado para el tipo de dato del paramtero  $id_periodo';
                
        // se valida que se pueda realizar el borrado del registro
        expect($tester->actionDeletep($id_formato, $id_periodo));

    }
    

}
