<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdFormato;
/**
 * Este es el unit test para la clase "fd_formato".
 *
 * @property int4 $id_formato
 * @property varchar $nom_formato
 * @property varchar $num_formato
 * @property int4 $id_tipo_view_formato
 * @property int4 $id_modulo
 * @property int4 $ult_id_version
 * @property int4 $cod_rol
 * @property varchar $numeracion
 * @property varchar $sop_ruta
 * @property varchar $url_acceso
 * @property varchar $filtros_search
 *
 * @property FdConjuntoPregunta[] $fdConjuntoPreguntas
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdModulo $idModulo
 * @property FdTipoViewFormato $idTipoViewFormato
 * @property FdVersion $ultIdVersion
 * @property Rol $codRol
 * @property FdPeriodoFormato[] $fdPeriodoFormatos
 * @property TrPeriodo[] $idPeriodos
 * @property FdRespuesta[] $fdRespuestas
 */
class FdFormatoTest extends \Codeception\Test\Unit
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
        $tester = new FdFormato();
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->nom_formato = "Ingresar valor de pruebas para el campo nom_formato de tipo varchar";
        $tester->num_formato = "Ingresar valor de pruebas para el campo num_formato de tipo varchar";
        $tester->id_tipo_view_formato = "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->ult_id_version = "Ingresar valor de pruebas para el campo ult_id_version de tipo int4";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo int4";
        $tester->numeracion = "Ingresar valor de pruebas para el campo numeracion de tipo varchar";
        $tester->sop_ruta = "Ingresar valor de pruebas para el campo sop_ruta de tipo varchar";
        $tester->url_acceso = "Ingresar valor de pruebas para el campo url_acceso de tipo varchar";
        $tester->filtros_search = "Ingresar valor de pruebas para el campo filtros_search de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdFormato;
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->nom_formato = "Ingresar valor de pruebas para el campo nom_formato de tipo varchar";
        $tester->num_formato = "Ingresar valor de pruebas para el campo num_formato de tipo varchar";
        $tester->id_tipo_view_formato = "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->ult_id_version = "Ingresar valor de pruebas para el campo ult_id_version de tipo int4";
        $tester->cod_rol = "Ingresar valor de pruebas para el campo cod_rol de tipo int4";
        $tester->numeracion = "Ingresar valor de pruebas para el campo numeracion de tipo varchar";
        $tester->sop_ruta = "Ingresar valor de pruebas para el campo sop_ruta de tipo varchar";
        $tester->url_acceso = "Ingresar valor de pruebas para el campo url_acceso de tipo varchar";
        $tester->filtros_search = "Ingresar valor de pruebas para el campo filtros_search de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdFormato  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdFormato::findOne(                                                               
        [
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'nom_formato' => "Ingresar valor de pruebas para el campo nom_formato de tipo varchar",
           'num_formato' => "Ingresar valor de pruebas para el campo num_formato de tipo varchar",
           'id_tipo_view_formato' => "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'ult_id_version' => "Ingresar valor de pruebas para el campo ult_id_version de tipo int4",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo int4",
           'numeracion' => "Ingresar valor de pruebas para el campo numeracion de tipo varchar",
           'sop_ruta' => "Ingresar valor de pruebas para el campo sop_ruta de tipo varchar",
           'url_acceso' => "Ingresar valor de pruebas para el campo url_acceso de tipo varchar",
           'filtros_search' => "Ingresar valor de pruebas para el campo filtros_search de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdFormato No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdFormato Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdFormato::findOne(                                                               
        [
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'nom_formato' => "Ingresar valor de pruebas para el campo nom_formato de tipo varchar",
           'num_formato' => "Ingresar valor de pruebas para el campo num_formato de tipo varchar",
           'id_tipo_view_formato' => "Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'ult_id_version' => "Ingresar valor de pruebas para el campo ult_id_version de tipo int4",
           'cod_rol' => "Ingresar valor de pruebas para el campo cod_rol de tipo int4",
           'numeracion' => "Ingresar valor de pruebas para el campo numeracion de tipo varchar",
           'sop_ruta' => "Ingresar valor de pruebas para el campo sop_ruta de tipo varchar",
           'url_acceso' => "Ingresar valor de pruebas para el campo url_acceso de tipo varchar",
           'filtros_search' => "Ingresar valor de pruebas para el campo filtros_search de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdFormato::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdFormato();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdFormato();
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
         expect($tester->id_formato)->equals('Ingresar valor de pruebas para el campo id_formato de tipo int4');
         expect($tester->nom_formato)->equals('Ingresar valor de pruebas para el campo nom_formato de tipo varchar');
         expect($tester->num_formato)->equals('Ingresar valor de pruebas para el campo num_formato de tipo varchar');
         expect($tester->id_tipo_view_formato)->equals('Ingresar valor de pruebas para el campo id_tipo_view_formato de tipo int4');
         expect($tester->id_modulo)->equals('Ingresar valor de pruebas para el campo id_modulo de tipo int4');
         expect($tester->ult_id_version)->equals('Ingresar valor de pruebas para el campo ult_id_version de tipo int4');
         expect($tester->cod_rol)->equals('Ingresar valor de pruebas para el campo cod_rol de tipo int4');
         expect($tester->numeracion)->equals('Ingresar valor de pruebas para el campo numeracion de tipo varchar');
         expect($tester->sop_ruta)->equals('Ingresar valor de pruebas para el campo sop_ruta de tipo varchar');
         expect($tester->url_acceso)->equals('Ingresar valor de pruebas para el campo url_acceso de tipo varchar');
         expect($tester->filtros_search)->equals('Ingresar valor de pruebas para el campo filtros_search de tipo varchar');
      }

}
