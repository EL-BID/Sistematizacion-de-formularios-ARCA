<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\Cda;
/**
 * Este es el unit test para la clase "cda".
 *
 * @property date $fecha_ingreso
 * @property date $fecha_solicitud
 * @property varchar $tramite_administrativo
 * @property int4 $id_cproceso_arca
 * @property int4 $id_cproceso_senagua
 * @property varchar $rol_en_calidad
 * @property int4 $numero_tramites
 * @property int4 $id_cda
 * @property numeric $id_usuario_enviado_por
 * @property varchar $institucion_solicitante
 * @property varchar $solicitante
 * @property int4 $cod_centro_atencion_ciudadano
 * @property numeric $id_demarcacion
 *
 * @property CentroAtencionCiudadano $codCentroAtencionCiudadano
 * @property Demarcaciones $idDemarcacion
 * @property PsCproceso $idCprocesoArca
 * @property PsCproceso $idCprocesoSenagua
 * @property Rol $rolEnCalidad
 * @property UsuariosAp $idUsuarioEnviadoPor
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 * @property CdaErrores[] $cdaErrores
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions
 */
class CdaTest extends \Codeception\Test\Unit
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
        $tester = new Cda();
        $tester->fecha_ingreso = "Ingresar valor de pruebas para el campo fecha_ingreso de tipo date";
        $tester->fecha_solicitud = "Ingresar valor de pruebas para el campo fecha_solicitud de tipo date";
        $tester->tramite_administrativo = "Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar";
        $tester->id_cproceso_arca = "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4";
        $tester->id_cproceso_senagua = "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4";
        $tester->rol_en_calidad = "Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar";
        $tester->numero_tramites = "Ingresar valor de pruebas para el campo numero_tramites de tipo int4";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->id_usuario_enviado_por = "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo numeric";
        $tester->institucion_solicitante = "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar";
        $tester->solicitante = "Ingresar valor de pruebas para el campo solicitante de tipo varchar";
        $tester->cod_centro_atencion_ciudadano = "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4";
        $tester->id_demarcacion = "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new Cda;
        $tester->fecha_ingreso = "Ingresar valor de pruebas para el campo fecha_ingreso de tipo date";
        $tester->fecha_solicitud = "Ingresar valor de pruebas para el campo fecha_solicitud de tipo date";
        $tester->tramite_administrativo = "Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar";
        $tester->id_cproceso_arca = "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4";
        $tester->id_cproceso_senagua = "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4";
        $tester->rol_en_calidad = "Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar";
        $tester->numero_tramites = "Ingresar valor de pruebas para el campo numero_tramites de tipo int4";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->id_usuario_enviado_por = "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo numeric";
        $tester->institucion_solicitante = "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar";
        $tester->solicitante = "Ingresar valor de pruebas para el campo solicitante de tipo varchar";
        $tester->cod_centro_atencion_ciudadano = "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4";
        $tester->id_demarcacion = "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'Cda  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = Cda::findOne(                                                               
        [
           'fecha_ingreso' => "Ingresar valor de pruebas para el campo fecha_ingreso de tipo date",
           'fecha_solicitud' => "Ingresar valor de pruebas para el campo fecha_solicitud de tipo date",
           'tramite_administrativo' => "Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar",
           'id_cproceso_arca' => "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4",
           'id_cproceso_senagua' => "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4",
           'rol_en_calidad' => "Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar",
           'numero_tramites' => "Ingresar valor de pruebas para el campo numero_tramites de tipo int4",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'id_usuario_enviado_por' => "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo numeric",
           'institucion_solicitante' => "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar",
           'solicitante' => "Ingresar valor de pruebas para el campo solicitante de tipo varchar",
           'cod_centro_atencion_ciudadano' => "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4",
           'id_demarcacion' => "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'Cda No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'Cda Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = Cda::findOne(                                                               
        [
           'fecha_ingreso' => "Ingresar valor de pruebas para el campo fecha_ingreso de tipo date",
           'fecha_solicitud' => "Ingresar valor de pruebas para el campo fecha_solicitud de tipo date",
           'tramite_administrativo' => "Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar",
           'id_cproceso_arca' => "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4",
           'id_cproceso_senagua' => "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4",
           'rol_en_calidad' => "Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar",
           'numero_tramites' => "Ingresar valor de pruebas para el campo numero_tramites de tipo int4",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'id_usuario_enviado_por' => "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo numeric",
           'institucion_solicitante' => "Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar",
           'solicitante' => "Ingresar valor de pruebas para el campo solicitante de tipo varchar",
           'cod_centro_atencion_ciudadano' => "Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4",
           'id_demarcacion' => "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= Cda::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new Cda();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new Cda();
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
         expect($tester->fecha_ingreso)->equals('Ingresar valor de pruebas para el campo fecha_ingreso de tipo date');
         expect($tester->fecha_solicitud)->equals('Ingresar valor de pruebas para el campo fecha_solicitud de tipo date');
         expect($tester->tramite_administrativo)->equals('Ingresar valor de pruebas para el campo tramite_administrativo de tipo varchar');
         expect($tester->id_cproceso_arca)->equals('Ingresar valor de pruebas para el campo id_cproceso_arca de tipo int4');
         expect($tester->id_cproceso_senagua)->equals('Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo int4');
         expect($tester->rol_en_calidad)->equals('Ingresar valor de pruebas para el campo rol_en_calidad de tipo varchar');
         expect($tester->numero_tramites)->equals('Ingresar valor de pruebas para el campo numero_tramites de tipo int4');
         expect($tester->id_cda)->equals('Ingresar valor de pruebas para el campo id_cda de tipo int4');
         expect($tester->id_usuario_enviado_por)->equals('Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo numeric');
         expect($tester->institucion_solicitante)->equals('Ingresar valor de pruebas para el campo institucion_solicitante de tipo varchar');
         expect($tester->solicitante)->equals('Ingresar valor de pruebas para el campo solicitante de tipo varchar');
         expect($tester->cod_centro_atencion_ciudadano)->equals('Ingresar valor de pruebas para el campo cod_centro_atencion_ciudadano de tipo int4');
         expect($tester->id_demarcacion)->equals('Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric');
      }

}
