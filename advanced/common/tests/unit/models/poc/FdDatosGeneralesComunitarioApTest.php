<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdDatosGeneralesComunitarioAp;
/**
 * Este es el unit test para la clase "fd_datos_generales_comunitario_ap".
 *
 * @property int4 $id_datos_generales_cumunitario_ap
 * @property varchar $nombres_prestador
 * @property varchar $nombre_comunidad
 * @property int4 $numero_viviendas
 * @property int4 $telefono_prestador
 * @property varchar $correo_prestador
 * @property varchar $direccion_prestador
 * @property int4 $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdDatosGeneralesComunitarioApTest extends \Codeception\Test\Unit
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
        $tester = new FdDatosGeneralesComunitarioAp();
        $tester->id_datos_generales_cumunitario_ap = "Ingresar valor de pruebas para el campo id_datos_generales_cumunitario_ap de tipo int4";
        $tester->nombres_prestador = "Ingresar valor de pruebas para el campo nombres_prestador de tipo varchar";
        $tester->nombre_comunidad = "Ingresar valor de pruebas para el campo nombre_comunidad de tipo varchar";
        $tester->numero_viviendas = "Ingresar valor de pruebas para el campo numero_viviendas de tipo int4";
        $tester->telefono_prestador = "Ingresar valor de pruebas para el campo telefono_prestador de tipo int4";
        $tester->correo_prestador = "Ingresar valor de pruebas para el campo correo_prestador de tipo varchar";
        $tester->direccion_prestador = "Ingresar valor de pruebas para el campo direccion_prestador de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdDatosGeneralesComunitarioAp;
        $tester->id_datos_generales_cumunitario_ap = "Ingresar valor de pruebas para el campo id_datos_generales_cumunitario_ap de tipo int4";
        $tester->nombres_prestador = "Ingresar valor de pruebas para el campo nombres_prestador de tipo varchar";
        $tester->nombre_comunidad = "Ingresar valor de pruebas para el campo nombre_comunidad de tipo varchar";
        $tester->numero_viviendas = "Ingresar valor de pruebas para el campo numero_viviendas de tipo int4";
        $tester->telefono_prestador = "Ingresar valor de pruebas para el campo telefono_prestador de tipo int4";
        $tester->correo_prestador = "Ingresar valor de pruebas para el campo correo_prestador de tipo varchar";
        $tester->direccion_prestador = "Ingresar valor de pruebas para el campo direccion_prestador de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdDatosGeneralesComunitarioAp  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdDatosGeneralesComunitarioAp::findOne(                                                               
        [
           'id_datos_generales_cumunitario_ap' => "Ingresar valor de pruebas para el campo id_datos_generales_cumunitario_ap de tipo int4",
           'nombres_prestador' => "Ingresar valor de pruebas para el campo nombres_prestador de tipo varchar",
           'nombre_comunidad' => "Ingresar valor de pruebas para el campo nombre_comunidad de tipo varchar",
           'numero_viviendas' => "Ingresar valor de pruebas para el campo numero_viviendas de tipo int4",
           'telefono_prestador' => "Ingresar valor de pruebas para el campo telefono_prestador de tipo int4",
           'correo_prestador' => "Ingresar valor de pruebas para el campo correo_prestador de tipo varchar",
           'direccion_prestador' => "Ingresar valor de pruebas para el campo direccion_prestador de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdDatosGeneralesComunitarioAp No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdDatosGeneralesComunitarioAp Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdDatosGeneralesComunitarioAp::findOne(                                                               
        [
           'id_datos_generales_cumunitario_ap' => "Ingresar valor de pruebas para el campo id_datos_generales_cumunitario_ap de tipo int4",
           'nombres_prestador' => "Ingresar valor de pruebas para el campo nombres_prestador de tipo varchar",
           'nombre_comunidad' => "Ingresar valor de pruebas para el campo nombre_comunidad de tipo varchar",
           'numero_viviendas' => "Ingresar valor de pruebas para el campo numero_viviendas de tipo int4",
           'telefono_prestador' => "Ingresar valor de pruebas para el campo telefono_prestador de tipo int4",
           'correo_prestador' => "Ingresar valor de pruebas para el campo correo_prestador de tipo varchar",
           'direccion_prestador' => "Ingresar valor de pruebas para el campo direccion_prestador de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdDatosGeneralesComunitarioAp::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdDatosGeneralesComunitarioAp();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdDatosGeneralesComunitarioAp();
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
         expect($tester->id_datos_generales_cumunitario_ap)->equals('Ingresar valor de pruebas para el campo id_datos_generales_cumunitario_ap de tipo int4');
         expect($tester->nombres_prestador)->equals('Ingresar valor de pruebas para el campo nombres_prestador de tipo varchar');
         expect($tester->nombre_comunidad)->equals('Ingresar valor de pruebas para el campo nombre_comunidad de tipo varchar');
         expect($tester->numero_viviendas)->equals('Ingresar valor de pruebas para el campo numero_viviendas de tipo int4');
         expect($tester->telefono_prestador)->equals('Ingresar valor de pruebas para el campo telefono_prestador de tipo int4');
         expect($tester->correo_prestador)->equals('Ingresar valor de pruebas para el campo correo_prestador de tipo varchar');
         expect($tester->direccion_prestador)->equals('Ingresar valor de pruebas para el campo direccion_prestador de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
      }

}
