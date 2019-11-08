<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdUbicacion;
/**
 * Este es el unit test para la clase "fd_ubicacion".
 *
 * @property int4 $id_ubicacion
 * @property varchar $cod_parroquia
 * @property varchar $cod_canton
 * @property varchar $cod_provincia
 * @property numeric $id_demarcacion
 * @property int4 $cod_centro_atencion_ciudadano
 * @property varchar $descripcion_ubicacion
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 *
 * @property CentroAtencionCiudadano $codCentroAtencionCiudadano
 * @property Demarcaciones $idDemarcacion
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 * @property Parroquias $codParroquia
 */
class FdUbicacionTest extends \Codeception\Test\Unit
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
        $tester = new FdUbicacion();
        $tester->id_ubicacion = "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4";
        $tester->cod_parroquia = "Ingresar valor de pruebas para el campo cod_parroquia de tipo varchar";
        $tester->cod_canton = "Ingresar valor de pruebas para el campo cod_canton de tipo varchar";
        $tester->cod_provincia = "Ingresar valor de pruebas para el campo cod_provincia de tipo varchar";
        $tester->id_demarcacion = "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric";
        $tester->cod_centro_atencion_ciudadano = "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4";
        $tester->descripcion_ubicacion = "Ingresar valor de pruebas para el campo descripcion_ubicacion de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdUbicacion;
        $tester->id_ubicacion = "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4";
        $tester->cod_parroquia = "Ingresar valor de pruebas para el campo cod_parroquia de tipo varchar";
        $tester->cod_canton = "Ingresar valor de pruebas para el campo cod_canton de tipo varchar";
        $tester->cod_provincia = "Ingresar valor de pruebas para el campo cod_provincia de tipo varchar";
        $tester->id_demarcacion = "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric";
        $tester->cod_centro_atencion_ciudadano = "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4";
        $tester->descripcion_ubicacion = "Ingresar valor de pruebas para el campo descripcion_ubicacion de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdUbicacion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdUbicacion::findOne(                                                               
        [
           'id_ubicacion' => "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4",
           'cod_parroquia' => "Ingresar valor de pruebas para el campo cod_parroquia de tipo varchar",
           'cod_canton' => "Ingresar valor de pruebas para el campo cod_canton de tipo varchar",
           'cod_provincia' => "Ingresar valor de pruebas para el campo cod_provincia de tipo varchar",
           'id_demarcacion' => "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric",
           'cod_centro_atencion_ciudadano' => "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4",
           'descripcion_ubicacion' => "Ingresar valor de pruebas para el campo descripcion_ubicacion de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdUbicacion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdUbicacion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdUbicacion::findOne(                                                               
        [
           'id_ubicacion' => "Ingresar valor de pruebas para el campo id_ubicacion de tipo int4",
           'cod_parroquia' => "Ingresar valor de pruebas para el campo cod_parroquia de tipo varchar",
           'cod_canton' => "Ingresar valor de pruebas para el campo cod_canton de tipo varchar",
           'cod_provincia' => "Ingresar valor de pruebas para el campo cod_provincia de tipo varchar",
           'id_demarcacion' => "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric",
           'cod_centro_atencion_ciudadano' => "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4",
           'descripcion_ubicacion' => "Ingresar valor de pruebas para el campo descripcion_ubicacion de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdUbicacion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdUbicacion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdUbicacion();
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
         expect($tester->id_ubicacion)->equals('Ingresar valor de pruebas para el campo id_ubicacion de tipo int4');
         expect($tester->cod_parroquia)->equals('Ingresar valor de pruebas para el campo cod_parroquia de tipo varchar');
         expect($tester->cod_canton)->equals('Ingresar valor de pruebas para el campo cod_canton de tipo varchar');
         expect($tester->cod_provincia)->equals('Ingresar valor de pruebas para el campo cod_provincia de tipo varchar');
         expect($tester->id_demarcacion)->equals('Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric');
         expect($tester->cod_centro_atencion_ciudadano)->equals('Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4');
         expect($tester->descripcion_ubicacion)->equals('Ingresar valor de pruebas para el campo descripcion_ubicacion de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
      }

}
