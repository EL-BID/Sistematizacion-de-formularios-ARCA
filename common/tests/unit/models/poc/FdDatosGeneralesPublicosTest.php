<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdDatosGeneralesPublicos;
/**
 * Este es el unit test para la clase "fd_datos_generales_publicos".
 *
 * @property int4 $id_datos_generales_publicos
 * @property varchar $pagina_web_prestador
 * @property varchar $correo_electronico_prestador
 * @property date $fecha_llenado_fichas
 * @property varchar $nombres_responsable_informacion
 * @property varchar $cargo_desempenia
 * @property varchar $correo_electronico
 * @property varchar $num_celular
 * @property int4 $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdDatosGeneralesPublicosTest extends \Codeception\Test\Unit
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
        $tester = new FdDatosGeneralesPublicos();
        $tester->id_datos_generales_publicos = "Ingresar valor de pruebas para el campo id_datos_generales_publicos de tipo int4";
        $tester->pagina_web_prestador = "Ingresar valor de pruebas para el campo pagina_web_prestador de tipo varchar";
        $tester->correo_electronico_prestador = "Ingresar valor de pruebas para el campo correo_electronico_prestador de tipo varchar";
        $tester->fecha_llenado_fichas = "Ingresar valor de pruebas para el campo fecha_llenado_fichas de tipo date";
        $tester->nombres_responsable_informacion = "Ingresar valor de pruebas para el campo nombres_responsable_informacion de tipo varchar";
        $tester->cargo_desempenia = "Ingresar valor de pruebas para el campo cargo_desempenia de tipo varchar";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->num_celular = "Ingresar valor de pruebas para el campo num_celular de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdDatosGeneralesPublicos;
        $tester->id_datos_generales_publicos = "Ingresar valor de pruebas para el campo id_datos_generales_publicos de tipo int4";
        $tester->pagina_web_prestador = "Ingresar valor de pruebas para el campo pagina_web_prestador de tipo varchar";
        $tester->correo_electronico_prestador = "Ingresar valor de pruebas para el campo correo_electronico_prestador de tipo varchar";
        $tester->fecha_llenado_fichas = "Ingresar valor de pruebas para el campo fecha_llenado_fichas de tipo date";
        $tester->nombres_responsable_informacion = "Ingresar valor de pruebas para el campo nombres_responsable_informacion de tipo varchar";
        $tester->cargo_desempenia = "Ingresar valor de pruebas para el campo cargo_desempenia de tipo varchar";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->num_celular = "Ingresar valor de pruebas para el campo num_celular de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdDatosGeneralesPublicos  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdDatosGeneralesPublicos::findOne(                                                               
        [
           'id_datos_generales_publicos' => "Ingresar valor de pruebas para el campo id_datos_generales_publicos de tipo int4",
           'pagina_web_prestador' => "Ingresar valor de pruebas para el campo pagina_web_prestador de tipo varchar",
           'correo_electronico_prestador' => "Ingresar valor de pruebas para el campo correo_electronico_prestador de tipo varchar",
           'fecha_llenado_fichas' => "Ingresar valor de pruebas para el campo fecha_llenado_fichas de tipo date",
           'nombres_responsable_informacion' => "Ingresar valor de pruebas para el campo nombres_responsable_informacion de tipo varchar",
           'cargo_desempenia' => "Ingresar valor de pruebas para el campo cargo_desempenia de tipo varchar",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdDatosGeneralesPublicos No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdDatosGeneralesPublicos Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdDatosGeneralesPublicos::findOne(                                                               
        [
           'id_datos_generales_publicos' => "Ingresar valor de pruebas para el campo id_datos_generales_publicos de tipo int4",
           'pagina_web_prestador' => "Ingresar valor de pruebas para el campo pagina_web_prestador de tipo varchar",
           'correo_electronico_prestador' => "Ingresar valor de pruebas para el campo correo_electronico_prestador de tipo varchar",
           'fecha_llenado_fichas' => "Ingresar valor de pruebas para el campo fecha_llenado_fichas de tipo date",
           'nombres_responsable_informacion' => "Ingresar valor de pruebas para el campo nombres_responsable_informacion de tipo varchar",
           'cargo_desempenia' => "Ingresar valor de pruebas para el campo cargo_desempenia de tipo varchar",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'num_celular' => "Ingresar valor de pruebas para el campo num_celular de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdDatosGeneralesPublicos::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdDatosGeneralesPublicos();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdDatosGeneralesPublicos();
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
         expect($tester->id_datos_generales_publicos)->equals('Ingresar valor de pruebas para el campo id_datos_generales_publicos de tipo int4');
         expect($tester->pagina_web_prestador)->equals('Ingresar valor de pruebas para el campo pagina_web_prestador de tipo varchar');
         expect($tester->correo_electronico_prestador)->equals('Ingresar valor de pruebas para el campo correo_electronico_prestador de tipo varchar');
         expect($tester->fecha_llenado_fichas)->equals('Ingresar valor de pruebas para el campo fecha_llenado_fichas de tipo date');
         expect($tester->nombres_responsable_informacion)->equals('Ingresar valor de pruebas para el campo nombres_responsable_informacion de tipo varchar');
         expect($tester->cargo_desempenia)->equals('Ingresar valor de pruebas para el campo cargo_desempenia de tipo varchar');
         expect($tester->correo_electronico)->equals('Ingresar valor de pruebas para el campo correo_electronico de tipo varchar');
         expect($tester->num_celular)->equals('Ingresar valor de pruebas para el campo num_celular de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
      }

}
