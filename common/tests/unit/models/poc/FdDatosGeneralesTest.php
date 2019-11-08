<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdDatosGenerales;
/**
 * Este es el unit test para la clase "fd_datos_generales".
 *
 * @property int4 $id_datos_generales
 * @property varchar $nombres
 * @property int4 $num_documento
 * @property int4 $num_convencional
 * @property varchar $correo_electronico
 * @property int4 $num_celular
 * @property varchar $direccion
 * @property varchar $descripcion_trabajo
 * @property varchar $nombres_apellidos_replegal
 * @property int4 $id_tdocumento
 * @property int4 $id_natu_juridica
 * @property int4 $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property TrTipoDocumento $idTdocumento
 * @property TrTipoNatuJuridica $idNatuJuridica
 */
class FdDatosGeneralesTest extends \Codeception\Test\Unit
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
        $tester = new FdDatosGenerales();
        $tester->id_datos_generales = "Ingresar valor de pruebas para el campo id_datos_generales de tipo int4";
        $tester->nombres = "Ingresar valor de pruebas para el campo nombres de tipo varchar";
        $tester->num_documento = "Ingresar valor de pruebas para el campo num_documento de tipo int4";
        $tester->num_convencional = "Ingresar valor de pruebas para el campo num_convencional de tipo int4";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->num_celular = "Ingresar valor de pruebas para el campo num_celular de tipo int4";
        $tester->direccion = "Ingresar valor de pruebas para el campo direccion de tipo varchar";
        $tester->descripcion_trabajo = "Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar";
        $tester->nombres_apellidos_replegal = "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar";
        $tester->id_tdocumento = "Ingresar valor de pruebas para el campo id_tdocumento de tipo int4";
        $tester->id_natu_juridica = "Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdDatosGenerales;
        $tester->id_datos_generales = "Ingresar valor de pruebas para el campo id_datos_generales de tipo int4";
        $tester->nombres = "Ingresar valor de pruebas para el campo nombres de tipo varchar";
        $tester->num_documento = "Ingresar valor de pruebas para el campo num_documento de tipo int4";
        $tester->num_convencional = "Ingresar valor de pruebas para el campo num_convencional de tipo int4";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->num_celular = "Ingresar valor de pruebas para el campo num_celular de tipo int4";
        $tester->direccion = "Ingresar valor de pruebas para el campo direccion de tipo varchar";
        $tester->descripcion_trabajo = "Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar";
        $tester->nombres_apellidos_replegal = "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar";
        $tester->id_tdocumento = "Ingresar valor de pruebas para el campo id_tdocumento de tipo int4";
        $tester->id_natu_juridica = "Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdDatosGenerales  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdDatosGenerales::findOne(                                                               
        [
           'id_datos_generales' => "Ingresar valor de pruebas para el campo id_datos_generales de tipo int4",
           'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",
           'num_documento' => "Ingresar valor de pruebas para el campo num_documento de tipo int4",
           'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",
           'direccion' => "Ingresar valor de pruebas para el campo direccion de tipo varchar",
           'descripcion_trabajo' => "Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar",
           'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",
           'id_tdocumento' => "Ingresar valor de pruebas para el campo id_tdocumento de tipo int4",
           'id_natu_juridica' => "Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdDatosGenerales No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdDatosGenerales Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdDatosGenerales::findOne(                                                               
        [
           'id_datos_generales' => "Ingresar valor de pruebas para el campo id_datos_generales de tipo int4",
           'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",
           'num_documento' => "Ingresar valor de pruebas para el campo num_documento de tipo int4",
           'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",
           'direccion' => "Ingresar valor de pruebas para el campo direccion de tipo varchar",
           'descripcion_trabajo' => "Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar",
           'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",
           'id_tdocumento' => "Ingresar valor de pruebas para el campo id_tdocumento de tipo int4",
           'id_natu_juridica' => "Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdDatosGenerales::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdDatosGenerales();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdDatosGenerales();
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
         expect($tester->id_datos_generales)->equals('Ingresar valor de pruebas para el campo id_datos_generales de tipo int4');
         expect($tester->nombres)->equals('Ingresar valor de pruebas para el campo nombres de tipo varchar');
         expect($tester->num_documento)->equals('Ingresar valor de pruebas para el campo num_documento de tipo int4');
         expect($tester->num_convencional)->equals('Ingresar valor de pruebas para el campo num_convencional de tipo int4');
         expect($tester->correo_electronico)->equals('Ingresar valor de pruebas para el campo correo_electronico de tipo varchar');
         expect($tester->num_celular)->equals('Ingresar valor de pruebas para el campo num_celular de tipo int4');
         expect($tester->direccion)->equals('Ingresar valor de pruebas para el campo direccion de tipo varchar');
         expect($tester->descripcion_trabajo)->equals('Ingresar valor de pruebas para el campo descripcion_trabajo de tipo varchar');
         expect($tester->nombres_apellidos_replegal)->equals('Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar');
         expect($tester->id_tdocumento)->equals('Ingresar valor de pruebas para el campo id_tdocumento de tipo int4');
         expect($tester->id_natu_juridica)->equals('Ingresar valor de pruebas para el campo id_natu_juridica de tipo int4');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
      }

}
