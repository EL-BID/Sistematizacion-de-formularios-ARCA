<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdPreguntaController;


/**
 * FdPreguntaControllerTest implementa las acciones a través del sistema CRUD para el modelo FdPregunta.
 */
class FdPreguntaControllerTest extends \Codeception\Test\Unit
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
        $tester = new  FdPreguntaController('FdPreguntaController','backend\controllers\poc\FdPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaController', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,
            'Se devolvio vacio behaviors');  
                        
    }
    
    

    
    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdPreguntaController('FdPreguntaController','backend\controllers\poc\FdPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaController', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
        $urlroute='/fdpregunta/index';
        $id=null;
        
        //Se ejecuta la funcion y se espera que realice todo
        expect_that($tester->actionProgress($urlroute,$id));
        
    }

	
	
    /**
     * Listado todos los datos del modelo FdPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaController('FdPreguntaController','backend\controllers\poc\FdPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaController', $tester);
        
        
            // Se declaran los $queryParams a enviar los filtros
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
        Yii::$app->request->queryParams=$queryParams;
       
        $actionIndex=Yii::$app->runAction('FdPreguntaController/index');
   
        $this->assertNotNull($actionIndex);
       
    }

   
    
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaController('FdPreguntaController','backend\controllers\poc\FdPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaController', $tester);
        
        // se deben declarar los valores de $id para enviar la llave
        
                        $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                     // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id             
            $actionView=Yii::$app->runAction('FdPreguntaController/view',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView                  
                    'Se devolvio nullo actionView ');  
 
    }

       
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaController('FdPreguntaController','backend\controllers\poc\FdPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaController', $tester);
             
          
            // Se declaran los $queryParams a enviar los datos a crear
            $queryParams = ['FdPreguntaController' => [
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
                            
       //       Se declaran el post1
            Yii::$app->request->queryParams =  $queryParams;
                            
            // se valida que se pueda realizar la insercion del registro
            $actionCreate=Yii::$app->runAction('FdPreguntaController/create');
             
            // se evalua el caso exitoso
            $this->assertNotNull($actionCreate,
                    'Se devolvio nullo actionCreate ');  
       
    }

    
  
    public function testActionUpdate($id)
    {
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaController('FdPreguntaController','backend\controllers\poc\FdPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaController', $tester);
        
        
        // Se declaran los $queryParams a enviar los datos a actualizar
          $queryParams = ['FdPreguntaController' => [
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
        
        
         // se deben declarar los valores de $id para enviar la llave
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        
         // se valida que se pueda realizar el update del registro
                                     
        $actionUpdate=Yii::$app->runAction('FdPreguntaController/update',['id' => $id]);

        // se evalua el caso exitoso
        $this->assertNotNull($actionUpdate,
               'Se devolvio nullo actionUpdate ');  
 
    }


    
    
    public function testActionDeletep($id)
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdPreguntaController('FdPreguntaController','backend\controllers\poc\FdPreguntaController');
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdPreguntaController', $tester);
        
        
        // se deben llenar los siguientes valores para indicar el registro a borrar
                         $id = 'valor adecuado para el tipo de dato del paramtero $id';
                                
        // se valida que se pueda realizar el borrado del registro
         $actionDelete=Yii::$app->runAction(FdPreguntaController/update',['id' => $id]);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionDelete,
                    'Se devolvio nullo actionDelete ');  


    }

    
}
