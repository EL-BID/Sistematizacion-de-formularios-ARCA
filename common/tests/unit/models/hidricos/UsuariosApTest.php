<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\UsuariosAp;
/**
 * Este es el unit test para la clase "usuarios_ap".
 *
 * @property numeric $id_usuario
 * @property varchar $usuario
 * @property varchar $clave
 * @property varchar $login
 * @property varchar $tipo_usuario
 * @property varchar $estado_usuario
 * @property numeric $identificacion
 * @property varchar $nombres
 * @property varchar $usuario_digitador
 * @property date $fecha_digitacion
 * @property varchar $email
 * @property varchar $auth_key
 *
 * @property Cda[] $cdas
 * @property Perfiles[] $perfiles
 * @property Rol[] $codRols
 * @property PsCactividadProceso[] $psCactividadProcesos
 * @property PsCproceso[] $psCprocesos
 * @property PsHistoricoEstados[] $psHistoricoEstados
 * @property PsResponsablesProceso[] $psResponsablesProcesos
 */
class UsuariosApTest extends \Codeception\Test\Unit
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
        $tester = new UsuariosAp();
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->usuario = "Ingresar valor de pruebas para el campo usuario de tipo varchar";
        $tester->clave = "Ingresar valor de pruebas para el campo clave de tipo varchar";
        $tester->login = "Ingresar valor de pruebas para el campo login de tipo varchar";
        $tester->tipo_usuario = "Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar";
        $tester->estado_usuario = "Ingresar valor de pruebas para el campo estado_usuario de tipo varchar";
        $tester->identificacion = "Ingresar valor de pruebas para el campo identificacion de tipo numeric";
        $tester->nombres = "Ingresar valor de pruebas para el campo nombres de tipo varchar";
        $tester->usuario_digitador = "Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar";
        $tester->fecha_digitacion = "Ingresar valor de pruebas para el campo fecha_digitacion de tipo date";
        $tester->email = "Ingresar valor de pruebas para el campo email de tipo varchar";
        $tester->auth_key = "Ingresar valor de pruebas para el campo auth_key de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new UsuariosAp;
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->usuario = "Ingresar valor de pruebas para el campo usuario de tipo varchar";
        $tester->clave = "Ingresar valor de pruebas para el campo clave de tipo varchar";
        $tester->login = "Ingresar valor de pruebas para el campo login de tipo varchar";
        $tester->tipo_usuario = "Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar";
        $tester->estado_usuario = "Ingresar valor de pruebas para el campo estado_usuario de tipo varchar";
        $tester->identificacion = "Ingresar valor de pruebas para el campo identificacion de tipo numeric";
        $tester->nombres = "Ingresar valor de pruebas para el campo nombres de tipo varchar";
        $tester->usuario_digitador = "Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar";
        $tester->fecha_digitacion = "Ingresar valor de pruebas para el campo fecha_digitacion de tipo date";
        $tester->email = "Ingresar valor de pruebas para el campo email de tipo varchar";
        $tester->auth_key = "Ingresar valor de pruebas para el campo auth_key de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'UsuariosAp  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = UsuariosAp::findOne(                                                               
        [
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'usuario' => "Ingresar valor de pruebas para el campo usuario de tipo varchar",
           'clave' => "Ingresar valor de pruebas para el campo clave de tipo varchar",
           'login' => "Ingresar valor de pruebas para el campo login de tipo varchar",
           'tipo_usuario' => "Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar",
           'estado_usuario' => "Ingresar valor de pruebas para el campo estado_usuario de tipo varchar",
           'identificacion' => "Ingresar valor de pruebas para el campo identificacion de tipo numeric",
           'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",
           'usuario_digitador' => "Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar",
           'fecha_digitacion' => "Ingresar valor de pruebas para el campo fecha_digitacion de tipo date",
           'email' => "Ingresar valor de pruebas para el campo email de tipo varchar",
           'auth_key' => "Ingresar valor de pruebas para el campo auth_key de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'UsuariosAp No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'UsuariosAp Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = UsuariosAp::findOne(                                                               
        [
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'usuario' => "Ingresar valor de pruebas para el campo usuario de tipo varchar",
           'clave' => "Ingresar valor de pruebas para el campo clave de tipo varchar",
           'login' => "Ingresar valor de pruebas para el campo login de tipo varchar",
           'tipo_usuario' => "Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar",
           'estado_usuario' => "Ingresar valor de pruebas para el campo estado_usuario de tipo varchar",
           'identificacion' => "Ingresar valor de pruebas para el campo identificacion de tipo numeric",
           'nombres' => "Ingresar valor de pruebas para el campo nombres de tipo varchar",
           'usuario_digitador' => "Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar",
           'fecha_digitacion' => "Ingresar valor de pruebas para el campo fecha_digitacion de tipo date",
           'email' => "Ingresar valor de pruebas para el campo email de tipo varchar",
           'auth_key' => "Ingresar valor de pruebas para el campo auth_key de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= UsuariosAp::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new UsuariosAp();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new UsuariosAp();
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
         expect($tester->id_usuario)->equals('Ingresar valor de pruebas para el campo id_usuario de tipo numeric');
         expect($tester->usuario)->equals('Ingresar valor de pruebas para el campo usuario de tipo varchar');
         expect($tester->clave)->equals('Ingresar valor de pruebas para el campo clave de tipo varchar');
         expect($tester->login)->equals('Ingresar valor de pruebas para el campo login de tipo varchar');
         expect($tester->tipo_usuario)->equals('Ingresar valor de pruebas para el campo tipo_usuario de tipo varchar');
         expect($tester->estado_usuario)->equals('Ingresar valor de pruebas para el campo estado_usuario de tipo varchar');
         expect($tester->identificacion)->equals('Ingresar valor de pruebas para el campo identificacion de tipo numeric');
         expect($tester->nombres)->equals('Ingresar valor de pruebas para el campo nombres de tipo varchar');
         expect($tester->usuario_digitador)->equals('Ingresar valor de pruebas para el campo usuario_digitador de tipo varchar');
         expect($tester->fecha_digitacion)->equals('Ingresar valor de pruebas para el campo fecha_digitacion de tipo date');
         expect($tester->email)->equals('Ingresar valor de pruebas para el campo email de tipo varchar');
         expect($tester->auth_key)->equals('Ingresar valor de pruebas para el campo auth_key de tipo varchar');
      }

}
