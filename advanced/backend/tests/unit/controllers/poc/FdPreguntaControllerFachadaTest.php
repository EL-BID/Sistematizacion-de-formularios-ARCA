<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdPreguntaControllerFachada;
/**
 * FdPreguntaControllerFachadaTest implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdPregunta.
 */
class FdPreguntaControllerFachadaTest extends \Codeception\Test\Unit
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
        $tester = new  FdPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaControllerFachada', $tester);
        
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
        $tester = new  FdPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaControllerFachada', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
         $urlroute='/fdpregunta/index';
         $id=null;
        //Se obtiene los valores para la barra de progreso
           $progressbar= $tester->actionProgress($urlroute,$id);
        //Se evalua caso exitoso   
        $this->assertNotEmpty($progressbar,
           'Se devolvio Vacio el html de actionProgress ');  

    }

	
	
    /**
     * Listado todos los datos del modelo FdPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaControllerFachada', $tester);
        
        
        // Se declaran los $queryParams a enviar
            $queryParams = ['FdPreguntaSearch' => [
                                             'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                                              'nom_pregunta' => "Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar",       
                                              'ayuda_pregunta' => "Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar",       
                                              'obligatorio' => "Ingresar valor de pruebas para el campo obligatorio de tipo varchar",       
                                              'max_largo' => "Ingresar valor de pruebas para el campo max_largo de tipo int4",       
                                              'min_largo' => "Ingresar valor de pruebas para el campo min_largo de tipo int4",       
                                              'max_date' => "Ingresar valor de pruebas para el campo max_date de tipo date",       
                                              'min_date' => "Ingresar valor de pruebas para el campo min_date de tipo date",       
                                              'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",       
                                              'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",       
                                              'ini_fecha' => "Ingresar valor de pruebas para el campo ini_fecha de tipo date",       
                                              'fin_fecha' => "Ingresar valor de pruebas para el campo fin_fecha de tipo date",       
                                              'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",       
                                              'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",       
                                              'id_seccion' => "Ingresar valor de pruebas para el campo id_seccion de tipo int4",       
                                              'id_agrupacion' => "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4",       
                                              'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",       
                                              'caracteristica_preg' => "Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar",       
                                              'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",       
                                              'visible' => "Ingresar valor de pruebas para el campo visible de tipo varchar",       
                                              'visible_desc_preg' => "Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar",       
                                              'num_col_label' => "Ingresar valor de pruebas para el campo num_col_label de tipo int4",       
                                              'num_col_input' => "Ingresar valor de pruebas para el campo num_col_input de tipo int4",       
                                              'stylecss' => "Ingresar valor de pruebas para el campo stylecss de tipo varchar",       
                                              'format' => "Ingresar valor de pruebas para el campo format de tipo varchar",       
                                              'min_number' => "Ingresar valor de pruebas para el campo min_number de tipo numeric",       
                                              'max_number' => "Ingresar valor de pruebas para el campo max_number de tipo numeric",       
                                              'atributos' => "Ingresar valor de pruebas para el campo atributos de tipo varchar",       
                                              'reg_exp' => "Ingresar valor de pruebas para el campo reg_exp de tipo varchar",       
                                              'numerada' => "Ingresar valor de pruebas para el campo numerada de tipo varchar",       
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
     * Presenta un dato unico en el modelo FdPregunta.
     * @param integer $id
     * @return mixed
     */
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaControllerFachada', $tester);
    
        // se deben declarar los valores de $id        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
              
        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
             $actionView= $tester->actionView($id);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,
                    'Se devolvio nullo actionView ');  
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdPregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaControllerFachada', $tester);
             
            // Se declaran el rquest
              $request =  ['FdPreguntaControllerFachada' => [
                                'id_pregunta' => 'Ingresar valor de pruebas para el campo id_pregunta de tipo int4',
                             'nom_pregunta' => 'Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar',
                             'ayuda_pregunta' => 'Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar',
                             'obligatorio' => 'Ingresar valor de pruebas para el campo obligatorio de tipo varchar',
                             'max_largo' => 'Ingresar valor de pruebas para el campo max_largo de tipo int4',
                             'min_largo' => 'Ingresar valor de pruebas para el campo min_largo de tipo int4',
                             'max_date' => 'Ingresar valor de pruebas para el campo max_date de tipo date',
                             'min_date' => 'Ingresar valor de pruebas para el campo min_date de tipo date',
                             'orden' => 'Ingresar valor de pruebas para el campo orden de tipo int4',
                             'estado' => 'Ingresar valor de pruebas para el campo estado de tipo varchar',
                             'ini_fecha' => 'Ingresar valor de pruebas para el campo ini_fecha de tipo date',
                             'fin_fecha' => 'Ingresar valor de pruebas para el campo fin_fecha de tipo date',
                             'id_tpregunta' => 'Ingresar valor de pruebas para el campo id_tpregunta de tipo int4',
                             'id_capitulo' => 'Ingresar valor de pruebas para el campo id_capitulo de tipo int4',
                             'id_seccion' => 'Ingresar valor de pruebas para el campo id_seccion de tipo int4',
                             'id_agrupacion' => 'Ingresar valor de pruebas para el campo id_agrupacion de tipo int4',
                             'id_tselect' => 'Ingresar valor de pruebas para el campo id_tselect de tipo int4',
                             'caracteristica_preg' => 'Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar',
                             'id_conjunto_pregunta' => 'Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4',
                             'visible' => 'Ingresar valor de pruebas para el campo visible de tipo varchar',
                             'visible_desc_preg' => 'Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar',
                             'num_col_label' => 'Ingresar valor de pruebas para el campo num_col_label de tipo int4',
                             'num_col_input' => 'Ingresar valor de pruebas para el campo num_col_input de tipo int4',
                             'stylecss' => 'Ingresar valor de pruebas para el campo stylecss de tipo varchar',
                             'format' => 'Ingresar valor de pruebas para el campo format de tipo varchar',
                             'min_number' => 'Ingresar valor de pruebas para el campo min_number de tipo numeric',
                             'max_number' => 'Ingresar valor de pruebas para el campo max_number de tipo numeric',
                             'atributos' => 'Ingresar valor de pruebas para el campo atributos de tipo varchar',
                             'reg_exp' => 'Ingresar valor de pruebas para el campo reg_exp de tipo varchar',
                             'numerada' => 'Ingresar valor de pruebas para el campo numerada de tipo varchar',
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
     * Modifica un dato existente en el modelo FdPregunta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaControllerFachada', $tester);
        
         // Se declaran el rquest
              $request =  ['FdPreguntaControllerFachada' => [
                                'id_pregunta' => 'Ingresar valor de pruebas para el campo id_pregunta de tipo int4',
                             'nom_pregunta' => 'Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar',
                             'ayuda_pregunta' => 'Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar',
                             'obligatorio' => 'Ingresar valor de pruebas para el campo obligatorio de tipo varchar',
                             'max_largo' => 'Ingresar valor de pruebas para el campo max_largo de tipo int4',
                             'min_largo' => 'Ingresar valor de pruebas para el campo min_largo de tipo int4',
                             'max_date' => 'Ingresar valor de pruebas para el campo max_date de tipo date',
                             'min_date' => 'Ingresar valor de pruebas para el campo min_date de tipo date',
                             'orden' => 'Ingresar valor de pruebas para el campo orden de tipo int4',
                             'estado' => 'Ingresar valor de pruebas para el campo estado de tipo varchar',
                             'ini_fecha' => 'Ingresar valor de pruebas para el campo ini_fecha de tipo date',
                             'fin_fecha' => 'Ingresar valor de pruebas para el campo fin_fecha de tipo date',
                             'id_tpregunta' => 'Ingresar valor de pruebas para el campo id_tpregunta de tipo int4',
                             'id_capitulo' => 'Ingresar valor de pruebas para el campo id_capitulo de tipo int4',
                             'id_seccion' => 'Ingresar valor de pruebas para el campo id_seccion de tipo int4',
                             'id_agrupacion' => 'Ingresar valor de pruebas para el campo id_agrupacion de tipo int4',
                             'id_tselect' => 'Ingresar valor de pruebas para el campo id_tselect de tipo int4',
                             'caracteristica_preg' => 'Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar',
                             'id_conjunto_pregunta' => 'Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4',
                             'visible' => 'Ingresar valor de pruebas para el campo visible de tipo varchar',
                             'visible_desc_preg' => 'Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar',
                             'num_col_label' => 'Ingresar valor de pruebas para el campo num_col_label de tipo int4',
                             'num_col_input' => 'Ingresar valor de pruebas para el campo num_col_input de tipo int4',
                             'stylecss' => 'Ingresar valor de pruebas para el campo stylecss de tipo varchar',
                             'format' => 'Ingresar valor de pruebas para el campo format de tipo varchar',
                             'min_number' => 'Ingresar valor de pruebas para el campo min_number de tipo numeric',
                             'max_number' => 'Ingresar valor de pruebas para el campo max_number de tipo numeric',
                             'atributos' => 'Ingresar valor de pruebas para el campo atributos de tipo varchar',
                             'reg_exp' => 'Ingresar valor de pruebas para el campo reg_exp de tipo varchar',
                             'numerada' => 'Ingresar valor de pruebas para el campo numerada de tipo varchar',
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
     * Deletes an existing FdPregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function testActionDeletep()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaControllerFachada', $tester);
        
        
        // se deben llenar los siguientes valores
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                
        // se valida que se pueda realizar el borrado del registro
        expect($tester->actionDeletep($id));

    }
    

}
