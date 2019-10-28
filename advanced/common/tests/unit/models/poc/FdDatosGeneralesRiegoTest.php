<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdDatosGeneralesRiego;
/**
 * Este es el unit test para la clase "fd_datos_generales_riego".
 *
 * @property int4 $id_datos_generales_riego
 * @property varchar $nombres_prestador_servicio
 * @property varchar $direccion_oficinas
 * @property varchar $nombres_apellidos_replegal
 * @property int4 $posee_convencional
 * @property int4 $num_convencional
 * @property int4 $num_celular
 * @property int4 $num_celular_otro
 * @property int4 $posee_email
 * @property varchar $correo_electronico
 * @property int4 $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdDatosGeneralesRiegoTest extends \Codeception\Test\Unit
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
        $tester = new FdDatosGeneralesRiego();
        $tester->id_datos_generales_riego = "Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4";
        $tester->nombres_prestador_servicio = "Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar";
        $tester->direccion_oficinas = "Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar";
        $tester->nombres_apellidos_replegal = "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar";
        $tester->posee_convencional = "Ingresar valor de pruebas para el campo posee_convencional de tipo int4";
        $tester->num_convencional = "Ingresar valor de pruebas para el campo num_convencional de tipo int4";
        $tester->num_celular = "Ingresar valor de pruebas para el campo num_celular de tipo int4";
        $tester->num_celular_otro = "Ingresar valor de pruebas para el campo num_celular_otro de tipo int4";
        $tester->posee_email = "Ingresar valor de pruebas para el campo posee_email de tipo int4";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdDatosGeneralesRiego;
        $tester->id_datos_generales_riego = "Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4";
        $tester->nombres_prestador_servicio = "Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar";
        $tester->direccion_oficinas = "Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar";
        $tester->nombres_apellidos_replegal = "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar";
        $tester->posee_convencional = "Ingresar valor de pruebas para el campo posee_convencional de tipo int4";
        $tester->num_convencional = "Ingresar valor de pruebas para el campo num_convencional de tipo int4";
        $tester->num_celular = "Ingresar valor de pruebas para el campo num_celular de tipo int4";
        $tester->num_celular_otro = "Ingresar valor de pruebas para el campo num_celular_otro de tipo int4";
        $tester->posee_email = "Ingresar valor de pruebas para el campo posee_email de tipo int4";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdDatosGeneralesRiego  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdDatosGeneralesRiego::findOne(                                                               
        [
           'id_datos_generales_riego' => "Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4",
           'nombres_prestador_servicio' => "Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar",
           'direccion_oficinas' => "Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar",
           'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",
           'posee_convencional' => "Ingresar valor de pruebas para el campo posee_convencional de tipo int4",
           'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",
           'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",
           'num_celular_otro' => "Ingresar valor de pruebas para el campo num_celular_otro de tipo int4",
           'posee_email' => "Ingresar valor de pruebas para el campo posee_email de tipo int4",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdDatosGeneralesRiego No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdDatosGeneralesRiego Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdDatosGeneralesRiego::findOne(                                                               
        [
           'id_datos_generales_riego' => "Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4",
           'nombres_prestador_servicio' => "Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar",
           'direccion_oficinas' => "Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar",
           'nombres_apellidos_replegal' => "Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar",
           'posee_convencional' => "Ingresar valor de pruebas para el campo posee_convencional de tipo int4",
           'num_convencional' => "Ingresar valor de pruebas para el campo num_convencional de tipo int4",
           'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo int4",
           'num_celular_otro' => "Ingresar valor de pruebas para el campo num_celular_otro de tipo int4",
           'posee_email' => "Ingresar valor de pruebas para el campo posee_email de tipo int4",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdDatosGeneralesRiego::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdDatosGeneralesRiego();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdDatosGeneralesRiego();
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
         expect($tester->id_datos_generales_riego)->equals('Ingresar valor de pruebas para el campo id_datos_generales_riego de tipo int4');
         expect($tester->nombres_prestador_servicio)->equals('Ingresar valor de pruebas para el campo nombres_prestador_servicio de tipo varchar');
         expect($tester->direccion_oficinas)->equals('Ingresar valor de pruebas para el campo direccion_oficinas de tipo varchar');
         expect($tester->nombres_apellidos_replegal)->equals('Ingresar valor de pruebas para el campo nombres_apellidos_replegal de tipo varchar');
         expect($tester->posee_convencional)->equals('Ingresar valor de pruebas para el campo posee_convencional de tipo int4');
         expect($tester->num_convencional)->equals('Ingresar valor de pruebas para el campo num_convencional de tipo int4');
         expect($tester->num_celular)->equals('Ingresar valor de pruebas para el campo num_celular de tipo int4');
         expect($tester->num_celular_otro)->equals('Ingresar valor de pruebas para el campo num_celular_otro de tipo int4');
         expect($tester->posee_email)->equals('Ingresar valor de pruebas para el campo posee_email de tipo int4');
         expect($tester->correo_electronico)->equals('Ingresar valor de pruebas para el campo correo_electronico de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
      }

}
