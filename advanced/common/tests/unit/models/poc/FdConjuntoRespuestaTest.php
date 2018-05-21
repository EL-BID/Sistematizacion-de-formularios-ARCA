<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdConjuntoRespuesta;
/**
 * Este es el unit test para la clase "fd_conjunto_respuesta".
 *
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_conjunto_pregunta
 * @property varchar $id_entidad
 * @property int4 $id_formato
 * @property int4 $ult_id_adm_estado
 * @property int4 $id_periodo
 *
 * @property Entidades $idEntidad
 * @property FdAdmEstado $ultIdAdmEstado
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdFormato $idFormato
 * @property TrPeriodo $idPeriodo
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdDatosGenerales[] $fdDatosGenerales
 * @property FdHistoricoRespuesta[] $fdHistoricoRespuestas
 * @property FdInvolucrado[] $fdInvolucrados
 * @property FdRespuesta[] $fdRespuestas
 * @property FdUbicacion[] $fdUbicacions
 */
class FdConjuntoRespuestaTest extends \Codeception\Test\Unit
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
        $tester = new FdConjuntoRespuesta();
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_entidad = "Ingresar valor de pruebas para el campo id_entidad de tipo varchar";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->ult_id_adm_estado = "Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4";
        $tester->id_periodo = "Ingresar valor de pruebas para el campo id_periodo de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdConjuntoRespuesta;
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_entidad = "Ingresar valor de pruebas para el campo id_entidad de tipo varchar";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->ult_id_adm_estado = "Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4";
        $tester->id_periodo = "Ingresar valor de pruebas para el campo id_periodo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdConjuntoRespuesta  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdConjuntoRespuesta::findOne(                                                               
        [
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_entidad' => "Ingresar valor de pruebas para el campo id_entidad de tipo varchar",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'ult_id_adm_estado' => "Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4",
           'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdConjuntoRespuesta No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdConjuntoRespuesta Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdConjuntoRespuesta::findOne(                                                               
        [
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_entidad' => "Ingresar valor de pruebas para el campo id_entidad de tipo varchar",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'ult_id_adm_estado' => "Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4",
           'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdConjuntoRespuesta::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdConjuntoRespuesta();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdConjuntoRespuesta();
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
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_conjunto_pregunta)->equals('Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4');
         expect($tester->id_entidad)->equals('Ingresar valor de pruebas para el campo id_entidad de tipo varchar');
         expect($tester->id_formato)->equals('Ingresar valor de pruebas para el campo id_formato de tipo int4');
         expect($tester->ult_id_adm_estado)->equals('Ingresar valor de pruebas para el campo ult_id_adm_estado de tipo int4');
         expect($tester->id_periodo)->equals('Ingresar valor de pruebas para el campo id_periodo de tipo int4');
      }

}
