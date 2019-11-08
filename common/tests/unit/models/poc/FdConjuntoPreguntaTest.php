<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdConjuntoPregunta;
/**
 * Este es el unit test para la clase "fd_conjunto_pregunta".
 *
 * @property int4 $id_conjunto_pregunta
 * @property int4 $id_formato
 * @property int4 $id_version
 * @property int4 $id_tipo_view_formato
 * @property varchar $cod_rol
 *
 * @property FdCapitulo[] $fdCapitulos
 * @property FdFormato $idFormato
 * @property FdTipoViewFormato $idTipoViewFormato
 * @property FdVersion $idVersion
 * @property Rol $codRol
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdPregunta[] $fdPreguntas
 * @property FdRespuesta[] $fdRespuestas
 */
class FdConjuntoPreguntaTest extends \Codeception\Test\Unit
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
        $tester = new FdConjuntoPregunta();
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->id_version = "Ingresar valor de pruebas para el campo id_version de tipo int4";
        $tester->id_tipo_view_formato = "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdConjuntoPregunta;
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->id_version = "Ingresar valor de pruebas para el campo id_version de tipo int4";
        $tester->id_tipo_view_formato = "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdConjuntoPregunta  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdConjuntoPregunta::findOne(                                                               
        [
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",
           'id_tipo_view_formato' => "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdConjuntoPregunta No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdConjuntoPregunta Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdConjuntoPregunta::findOne(                                                               
        [
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",
           'id_tipo_view_formato' => "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdConjuntoPregunta::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdConjuntoPregunta();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdConjuntoPregunta();
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
         expect($tester->id_conjunto_pregunta)->equals('Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4');
         expect($tester->id_formato)->equals('Ingresar valor de pruebas para el campo id_formato de tipo int4');
         expect($tester->id_version)->equals('Ingresar valor de pruebas para el campo id_version de tipo int4');
         expect($tester->id_tipo_view_formato)->equals('Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4');
         expect($tester->cod_rol)->equals('Ingresar valor de pruebas para el campo cod_rol de tipo varchar');
      }

}
