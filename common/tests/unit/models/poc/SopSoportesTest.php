<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\SopSoportes;
/**
 * Este es el unit test para la clase "sop_soportes".
 *
 * @property int4 $id_soportes
 * @property varchar $ruta_soporte
 * @property varchar $titulo_soporte
 * @property varchar $palabras_clave
 * @property text $descripcion
 * @property varchar $fuente_soporte
 * @property varchar $autor_soporte
 * @property varchar $idioma_soporte
 * @property varchar $formato_soportes
 * @property numeric $tamanio_soportes
 * @property int4 $id_respuesta
 *
 * @property FdRespuesta $idRespuesta
 */
class SopSoportesTest extends \Codeception\Test\Unit
{

    /**
     * @var \frontend\tests\UnitTester
     */

    public function _before()
    {
        
    }
                                                                                        
    public function _after()                                                              
    {             
                                                             
    }                
    
    
     /** en caso de querer utilizar Asserts por favor revisar la documentacion en http://codeception.com/docs/modules/Asserts */
    public function testValidate()                                                             
    {                                                                                        
        $tester = new SopSoportes();
        $tester->id_soportes = "Ingresar valor de pruebas para el campo id_soportes de tipo int4";
        $tester->ruta_soporte = "Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar";
        $tester->titulo_soporte = "Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar";
        $tester->palabras_clave = "Ingresar valor de pruebas para el campo palabras_clave de tipo varchar";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo text";
        $tester->fuente_soporte = "Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar";
        $tester->autor_soporte = "Ingresar valor de pruebas para el campo autor_soporte de tipo varchar";
        $tester->idioma_soporte = "Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar";
        $tester->formato_soportes = "Ingresar valor de pruebas para el campo formato_soportes de tipo varchar";
        $tester->tamanio_soportes = "Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new SopSoportes;
        $tester->id_soportes = "Ingresar valor de pruebas para el campo id_soportes de tipo int4";
        $tester->ruta_soporte = "Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar";
        $tester->titulo_soporte = "Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar";
        $tester->palabras_clave = "Ingresar valor de pruebas para el campo palabras_clave de tipo varchar";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo text";
        $tester->fuente_soporte = "Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar";
        $tester->autor_soporte = "Ingresar valor de pruebas para el campo autor_soporte de tipo varchar";
        $tester->idioma_soporte = "Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar";
        $tester->formato_soportes = "Ingresar valor de pruebas para el campo formato_soportes de tipo varchar";
        $tester->tamanio_soportes = "Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'SopSoportes  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = SopSoportes::findOne(                                                               
        [
           'id_soportes' => "Ingresar valor de pruebas para el campo id_soportes de tipo int4",
           'ruta_soporte' => "Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar",
           'titulo_soporte' => "Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar",
           'palabras_clave' => "Ingresar valor de pruebas para el campo palabras_clave de tipo varchar",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo text",
           'fuente_soporte' => "Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar",
           'autor_soporte' => "Ingresar valor de pruebas para el campo autor_soporte de tipo varchar",
           'idioma_soporte' => "Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar",
           'formato_soportes' => "Ingresar valor de pruebas para el campo formato_soportes de tipo varchar",
           'tamanio_soportes' => "Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'SopSoportes No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'SopSoportes Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = SopSoportes::findOne(                                                               
        [
           'id_soportes' => "Ingresar valor de pruebas para el campo id_soportes de tipo int4",
           'ruta_soporte' => "Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar",
           'titulo_soporte' => "Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar",
           'palabras_clave' => "Ingresar valor de pruebas para el campo palabras_clave de tipo varchar",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo text",
           'fuente_soporte' => "Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar",
           'autor_soporte' => "Ingresar valor de pruebas para el campo autor_soporte de tipo varchar",
           'idioma_soporte' => "Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar",
           'formato_soportes' => "Ingresar valor de pruebas para el campo formato_soportes de tipo varchar",
           'tamanio_soportes' => "Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= SopSoportes::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new SopSoportes();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new SopSoportes();
        $labels= $tester->attributeLabels();
         $this->assertNotEmpty($labels,
            'Se devolvio vacio array con los labels ');  
        
    }
    
    
    /**
    *  The following line indicates that the parameter values entered here are derived from testSelect Output 
    * @depends testSelect
    */
   public function testModelProperty($tester)
   {
         expect($tester->id_soportes)->equals('Ingresar valor de pruebas para el campo id_soportes de tipo int4');
         expect($tester->ruta_soporte)->equals('Ingresar valor de pruebas para el campo ruta_soporte de tipo varchar');
         expect($tester->titulo_soporte)->equals('Ingresar valor de pruebas para el campo titulo_soporte de tipo varchar');
         expect($tester->palabras_clave)->equals('Ingresar valor de pruebas para el campo palabras_clave de tipo varchar');
         expect($tester->descripcion)->equals('Ingresar valor de pruebas para el campo descripcion de tipo text');
         expect($tester->fuente_soporte)->equals('Ingresar valor de pruebas para el campo fuente_soporte de tipo varchar');
         expect($tester->autor_soporte)->equals('Ingresar valor de pruebas para el campo autor_soporte de tipo varchar');
         expect($tester->idioma_soporte)->equals('Ingresar valor de pruebas para el campo idioma_soporte de tipo varchar');
         expect($tester->formato_soportes)->equals('Ingresar valor de pruebas para el campo formato_soportes de tipo varchar');
         expect($tester->tamanio_soportes)->equals('Ingresar valor de pruebas para el campo tamanio_soportes de tipo numeric');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
      }

}
