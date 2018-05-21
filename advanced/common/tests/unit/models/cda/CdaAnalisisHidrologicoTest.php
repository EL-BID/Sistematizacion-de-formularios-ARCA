<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaAnalisisHidrologico;
/**
 * Este es el unit test para la clase "cda_analisis_hidrologico".
 *
 * @property int4 $id_analisis_hidrologico
 * @property int4 $id_cartografia
 * @property varchar $id_ehidrografica
 * @property varchar $id_emeteorologica
 * @property int4 $id_metodologia
 * @property int4 $id_cda
 * @property varchar $informe_utilizado
 * @property varchar $probabilidad
 * @property varchar $observacion
 *
 * @property Cda $idCda
 * @property CdaCartografia $idCartografia
 * @property CdaEstacionHidrologica $idEhidrografica
 * @property CdaEstacionMeteorologica $idEmeteorologica
 * @property CdaMetodologia $idMetodologia
 */
class CdaAnalisisHidrologicoTest extends \Codeception\Test\Unit
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
        $tester = new CdaAnalisisHidrologico();
        $tester->id_analisis_hidrologico = "Ingresar valor de pruebas para el campo id_analisis_hidrologico de tipo int4";
        $tester->id_cartografia = "Ingresar valor de pruebas para el campo id_cartografia de tipo int4";
        $tester->id_ehidrografica = "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar";
        $tester->id_emeteorologica = "Ingresar valor de pruebas para el campo id_emeteorologica de tipo varchar";
        $tester->id_metodologia = "Ingresar valor de pruebas para el campo id_metodologia de tipo int4";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->informe_utilizado = "Ingresar valor de pruebas para el campo informe_utilizado de tipo varchar";
        $tester->probabilidad = "Ingresar valor de pruebas para el campo probabilidad de tipo varchar";
        $tester->observacion = "Ingresar valor de pruebas para el campo observacion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaAnalisisHidrologico;
        $tester->id_analisis_hidrologico = "Ingresar valor de pruebas para el campo id_analisis_hidrologico de tipo int4";
        $tester->id_cartografia = "Ingresar valor de pruebas para el campo id_cartografia de tipo int4";
        $tester->id_ehidrografica = "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar";
        $tester->id_emeteorologica = "Ingresar valor de pruebas para el campo id_emeteorologica de tipo varchar";
        $tester->id_metodologia = "Ingresar valor de pruebas para el campo id_metodologia de tipo int4";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->informe_utilizado = "Ingresar valor de pruebas para el campo informe_utilizado de tipo varchar";
        $tester->probabilidad = "Ingresar valor de pruebas para el campo probabilidad de tipo varchar";
        $tester->observacion = "Ingresar valor de pruebas para el campo observacion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaAnalisisHidrologico  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaAnalisisHidrologico::findOne(                                                               
        [
           'id_analisis_hidrologico' => "Ingresar valor de pruebas para el campo id_analisis_hidrologico de tipo int4",
           'id_cartografia' => "Ingresar valor de pruebas para el campo id_cartografia de tipo int4",
           'id_ehidrografica' => "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar",
           'id_emeteorologica' => "Ingresar valor de pruebas para el campo id_emeteorologica de tipo varchar",
           'id_metodologia' => "Ingresar valor de pruebas para el campo id_metodologia de tipo int4",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'informe_utilizado' => "Ingresar valor de pruebas para el campo informe_utilizado de tipo varchar",
           'probabilidad' => "Ingresar valor de pruebas para el campo probabilidad de tipo varchar",
           'observacion' => "Ingresar valor de pruebas para el campo observacion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaAnalisisHidrologico No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaAnalisisHidrologico Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaAnalisisHidrologico::findOne(                                                               
        [
           'id_analisis_hidrologico' => "Ingresar valor de pruebas para el campo id_analisis_hidrologico de tipo int4",
           'id_cartografia' => "Ingresar valor de pruebas para el campo id_cartografia de tipo int4",
           'id_ehidrografica' => "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar",
           'id_emeteorologica' => "Ingresar valor de pruebas para el campo id_emeteorologica de tipo varchar",
           'id_metodologia' => "Ingresar valor de pruebas para el campo id_metodologia de tipo int4",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'informe_utilizado' => "Ingresar valor de pruebas para el campo informe_utilizado de tipo varchar",
           'probabilidad' => "Ingresar valor de pruebas para el campo probabilidad de tipo varchar",
           'observacion' => "Ingresar valor de pruebas para el campo observacion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaAnalisisHidrologico::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaAnalisisHidrologico();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaAnalisisHidrologico();
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
         expect($tester->id_analisis_hidrologico)->equals('Ingresar valor de pruebas para el campo id_analisis_hidrologico de tipo int4');
         expect($tester->id_cartografia)->equals('Ingresar valor de pruebas para el campo id_cartografia de tipo int4');
         expect($tester->id_ehidrografica)->equals('Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar');
         expect($tester->id_emeteorologica)->equals('Ingresar valor de pruebas para el campo id_emeteorologica de tipo varchar');
         expect($tester->id_metodologia)->equals('Ingresar valor de pruebas para el campo id_metodologia de tipo int4');
         expect($tester->id_cda)->equals('Ingresar valor de pruebas para el campo id_cda de tipo int4');
         expect($tester->informe_utilizado)->equals('Ingresar valor de pruebas para el campo informe_utilizado de tipo varchar');
         expect($tester->probabilidad)->equals('Ingresar valor de pruebas para el campo probabilidad de tipo varchar');
         expect($tester->observacion)->equals('Ingresar valor de pruebas para el campo observacion de tipo varchar');
      }

}
