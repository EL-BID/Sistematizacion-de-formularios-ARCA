<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdElementoCondicion;
/**
 * Este es el unit test para la clase "fd_elemento_condicion".
 *
 * @property varchar $valor
 * @property int4 $id_condicion
 * @property int4 $id_tcondicion
 * @property int4 $id_pregunta_habilitadora
 * @property int4 $id_pregunta_condicionada
 * @property int4 $id_capitulo_condicionado
 * @property int4 $id_adm_estado
 * @property varchar $cod_rol
 * @property varchar $operacion
 *
 * @property FdAdmEstado $idAdmEstado
 * @property FdCapitulo $idCapituloCondicionado
 * @property FdPregunta $idPreguntaHabilitadora
 * @property FdPregunta $idPreguntaCondicionada
 * @property FdTipoCondicion $idTcondicion
 * @property Rol $codRol
 */
class FdElementoCondicionTest extends \Codeception\Test\Unit
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
        $tester = new FdElementoCondicion();
        $tester->valor = "Ingresar valor de pruebas para el campo valor de tipo varchar";
        $tester->id_condicion = "Ingresar valor de pruebas para el campo id_condicion de tipo int4";
        $tester->id_tcondicion = "Ingresar valor de pruebas para el campo id_tcondicion de tipo int4";
        $tester->id_pregunta_habilitadora = "Ingresar valor de pruebas para el campo id_pregunta_habilitadora de tipo int4";
        $tester->id_pregunta_condicionada = "Ingresar valor de pruebas para el campo id_pregunta_condicionada de tipo int4";
        $tester->id_capitulo_condicionado = "Ingresar valor de pruebas para el campo id_capitulo_condicionado de tipo int4";
        $tester->id_adm_estado = "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo varchar";
        $tester->operacion = "Ingresar valor de pruebas para el campo operacion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdElementoCondicion;
        $tester->valor = "Ingresar valor de pruebas para el campo valor de tipo varchar";
        $tester->id_condicion = "Ingresar valor de pruebas para el campo id_condicion de tipo int4";
        $tester->id_tcondicion = "Ingresar valor de pruebas para el campo id_tcondicion de tipo int4";
        $tester->id_pregunta_habilitadora = "Ingresar valor de pruebas para el campo id_pregunta_habilitadora de tipo int4";
        $tester->id_pregunta_condicionada = "Ingresar valor de pruebas para el campo id_pregunta_condicionada de tipo int4";
        $tester->id_capitulo_condicionado = "Ingresar valor de pruebas para el campo id_capitulo_condicionado de tipo int4";
        $tester->id_adm_estado = "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo varchar";
        $tester->operacion = "Ingresar valor de pruebas para el campo operacion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdElementoCondicion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdElementoCondicion::findOne(                                                               
        [
           'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",
           'id_condicion' => "Ingresar valor de pruebas para el campo id_condicion de tipo int4",
           'id_tcondicion' => "Ingresar valor de pruebas para el campo id_tcondicion de tipo int4",
           'id_pregunta_habilitadora' => "Ingresar valor de pruebas para el campo id_pregunta_habilitadora de tipo int4",
           'id_pregunta_condicionada' => "Ingresar valor de pruebas para el campo id_pregunta_condicionada de tipo int4",
           'id_capitulo_condicionado' => "Ingresar valor de pruebas para el campo id_capitulo_condicionado de tipo int4",
           'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",
           'operacion' => "Ingresar valor de pruebas para el campo operacion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdElementoCondicion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdElementoCondicion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdElementoCondicion::findOne(                                                               
        [
           'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",
           'id_condicion' => "Ingresar valor de pruebas para el campo id_condicion de tipo int4",
           'id_tcondicion' => "Ingresar valor de pruebas para el campo id_tcondicion de tipo int4",
           'id_pregunta_habilitadora' => "Ingresar valor de pruebas para el campo id_pregunta_habilitadora de tipo int4",
           'id_pregunta_condicionada' => "Ingresar valor de pruebas para el campo id_pregunta_condicionada de tipo int4",
           'id_capitulo_condicionado' => "Ingresar valor de pruebas para el campo id_capitulo_condicionado de tipo int4",
           'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo varchar",
           'operacion' => "Ingresar valor de pruebas para el campo operacion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdElementoCondicion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdElementoCondicion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdElementoCondicion();
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
         expect($tester->valor)->equals('Ingresar valor de pruebas para el campo valor de tipo varchar');
         expect($tester->id_condicion)->equals('Ingresar valor de pruebas para el campo id_condicion de tipo int4');
         expect($tester->id_tcondicion)->equals('Ingresar valor de pruebas para el campo id_tcondicion de tipo int4');
         expect($tester->id_pregunta_habilitadora)->equals('Ingresar valor de pruebas para el campo id_pregunta_habilitadora de tipo int4');
         expect($tester->id_pregunta_condicionada)->equals('Ingresar valor de pruebas para el campo id_pregunta_condicionada de tipo int4');
         expect($tester->id_capitulo_condicionado)->equals('Ingresar valor de pruebas para el campo id_capitulo_condicionado de tipo int4');
         expect($tester->id_adm_estado)->equals('Ingresar valor de pruebas para el campo id_adm_estado de tipo int4');
         expect($tester->cod_rol)->equals('Ingresar valor de pruebas para el campo cod_rol de tipo varchar');
         expect($tester->operacion)->equals('Ingresar valor de pruebas para el campo operacion de tipo varchar');
      }

}
