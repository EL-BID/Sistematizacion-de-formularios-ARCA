<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdParamEvaluaciones;
/**
 * Este es el unit test para la clase "fd_param_evaluaciones".
 *
 * @property int4 $id_evaluacion
 * @property varchar $componente
 * @property varchar $criterio
 * @property int4 $item
 * @property varchar $condicionante
 * @property int4 $id_pregunta
 * @property int4 $tipo_valoracion
 * @property int4 $porcentaje_ponderacion
 * @property numeric $puntuacion
 * @property int4 $formato
 * @property varchar $detalle
 *
 * @property FdPregunta $idPregunta
 * @property FdTipoValoracion $tipoValoracion
 */
class FdParamEvaluacionesTest extends \Codeception\Test\Unit
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
        $tester = new FdParamEvaluaciones();
        $tester->id_evaluacion = "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4";
        $tester->componente = "Ingresar valor de pruebas para el campo componente de tipo varchar";
        $tester->criterio = "Ingresar valor de pruebas para el campo criterio de tipo varchar";
        $tester->item = "Ingresar valor de pruebas para el campo item de tipo int4";
        $tester->condicionante = "Ingresar valor de pruebas para el campo condicionante de tipo varchar";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->tipo_valoracion = "Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4";
        $tester->porcentaje_ponderacion = "Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4";
        $tester->puntuacion = "Ingresar valor de pruebas para el campo puntuacion de tipo numeric";
        $tester->formato = "Ingresar valor de pruebas para el campo formato de tipo int4";
        $tester->detalle = "Ingresar valor de pruebas para el campo detalle de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdParamEvaluaciones;
        $tester->id_evaluacion = "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4";
        $tester->componente = "Ingresar valor de pruebas para el campo componente de tipo varchar";
        $tester->criterio = "Ingresar valor de pruebas para el campo criterio de tipo varchar";
        $tester->item = "Ingresar valor de pruebas para el campo item de tipo int4";
        $tester->condicionante = "Ingresar valor de pruebas para el campo condicionante de tipo varchar";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->tipo_valoracion = "Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4";
        $tester->porcentaje_ponderacion = "Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4";
        $tester->puntuacion = "Ingresar valor de pruebas para el campo puntuacion de tipo numeric";
        $tester->formato = "Ingresar valor de pruebas para el campo formato de tipo int4";
        $tester->detalle = "Ingresar valor de pruebas para el campo detalle de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdParamEvaluaciones  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdParamEvaluaciones::findOne(                                                               
        [
           'id_evaluacion' => "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4",
           'componente' => "Ingresar valor de pruebas para el campo componente de tipo varchar",
           'criterio' => "Ingresar valor de pruebas para el campo criterio de tipo varchar",
           'item' => "Ingresar valor de pruebas para el campo item de tipo int4",
           'condicionante' => "Ingresar valor de pruebas para el campo condicionante de tipo varchar",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'tipo_valoracion' => "Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4",
           'porcentaje_ponderacion' => "Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4",
           'puntuacion' => "Ingresar valor de pruebas para el campo puntuacion de tipo numeric",
           'formato' => "Ingresar valor de pruebas para el campo formato de tipo int4",
           'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdParamEvaluaciones No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdParamEvaluaciones Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdParamEvaluaciones::findOne(                                                               
        [
           'id_evaluacion' => "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4",
           'componente' => "Ingresar valor de pruebas para el campo componente de tipo varchar",
           'criterio' => "Ingresar valor de pruebas para el campo criterio de tipo varchar",
           'item' => "Ingresar valor de pruebas para el campo item de tipo int4",
           'condicionante' => "Ingresar valor de pruebas para el campo condicionante de tipo varchar",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'tipo_valoracion' => "Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4",
           'porcentaje_ponderacion' => "Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4",
           'puntuacion' => "Ingresar valor de pruebas para el campo puntuacion de tipo numeric",
           'formato' => "Ingresar valor de pruebas para el campo formato de tipo int4",
           'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdParamEvaluaciones::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdParamEvaluaciones();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdParamEvaluaciones();
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
         expect($tester->id_evaluacion)->equals('Ingresar valor de pruebas para el campo id_evaluacion de tipo int4');
         expect($tester->componente)->equals('Ingresar valor de pruebas para el campo componente de tipo varchar');
         expect($tester->criterio)->equals('Ingresar valor de pruebas para el campo criterio de tipo varchar');
         expect($tester->item)->equals('Ingresar valor de pruebas para el campo item de tipo int4');
         expect($tester->condicionante)->equals('Ingresar valor de pruebas para el campo condicionante de tipo varchar');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->tipo_valoracion)->equals('Ingresar valor de pruebas para el campo tipo_valoracion de tipo int4');
         expect($tester->porcentaje_ponderacion)->equals('Ingresar valor de pruebas para el campo porcentaje_ponderacion de tipo int4');
         expect($tester->puntuacion)->equals('Ingresar valor de pruebas para el campo puntuacion de tipo numeric');
         expect($tester->formato)->equals('Ingresar valor de pruebas para el campo formato de tipo int4');
         expect($tester->detalle)->equals('Ingresar valor de pruebas para el campo detalle de tipo varchar');
      }

}
