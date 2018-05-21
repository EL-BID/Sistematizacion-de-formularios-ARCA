<?php

namespace common\tests\unit\models;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\Cda;
/**
 * Este es el unit test para la clase "cda".
 *
 * @property string $fecha_ingreso
 * @property string $fecha_solicitud
 * @property string $tramite_administrativo
 * @property integer $id_cproceso_arca
 * @property integer $id_cproceso_senagua
 * @property string $rol_en_calidad
 * @property integer $id_cda
 * @property integer $id_usuario_enviado_por
 *
 * @property PsCproceso $idCprocesoArca
 * @property PsCproceso $idCprocesoSenagua
 * @property Rol $rolEnCalidad
 * @property UsuariosAp $idUsuarioEnviadoPor
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 * @property CdaErrores[] $cdaErrores
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaTest extends \Codeception\Test\Unit
{

    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester = new  Cda;
    }


                                                                 
                                                                                             
    protected function _after()                                                              
    {             
    
        /** Se pregunta si aun existe el registro despues de probar*/
        if($this->tester)                                                                      
        {                                                                                    
            $this->tester->delete();                                                           
        }                                                                                    
    }                
    
    
     
                                                                                             
    protected function testInsert()                                                             
    {                                                                                        
        
               $this->tester->fecha_ingreso = "Ingresar valor de pruebas para el campo fecha_ingreso de tipo string";
 
               $this->tester->fecha_solicitud = "Ingresar valor de pruebas para el campo fecha_solicitud de tipo string";
 
               $this->tester->tramite_administrativo = "Ingresar valor de pruebas para el campo tramite_administrativo de tipo string";
 
               $this->tester->id_cproceso_arca = "Ingresar valor de pruebas para el campo id_cproceso_arca de tipo integer";
 
               $this->tester->id_cproceso_senagua = "Ingresar valor de pruebas para el campo id_cproceso_senagua de tipo integer";
 
               $this->tester->rol_en_calidad = "Ingresar valor de pruebas para el campo rol_en_calidad de tipo string";
 
               $this->tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo integer";
 
               $this->tester->id_usuario_enviado_por = "Ingresar valor de pruebas para el campo id_usuario_enviado_por de tipo integer";
 
                          /** Tablas en donde se encuentra como llave foranea */
                   $this->tester->idCprocesoArca = "Colocar un valor valido para la llave foranea PsCproceso $idCprocesoArca";
 
                       $this->tester->idCprocesoSenagua = "Colocar un valor valido para la llave foranea PsCproceso $idCprocesoSenagua";
 
                       $this->tester->rolEnCalidad = "Colocar un valor valido para la llave foranea Rol $rolEnCalidad";
 
                       $this->tester->idUsuarioEnviadoPor = "Colocar un valor valido para la llave foranea UsuariosAp $idUsuarioEnviadoPor";
 
                       $this->tester->cdaAnalisisHidrologicos = "Colocar un valor valido para la llave foranea CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos";
 
                       $this->tester->cdaErrores = "Colocar un valor valido para la llave foranea CdaErrores[] $cdaErrores";
 
                       $this->tester->cdaReporteInformacions = "Colocar un valor valido para la llave foranea CdaReporteInformacion[] $cdaReporteInformacions";
 
                          
        $this->tester->save();
        $this->assertNotNull($tester,                                                          
            'Cda  puede ser insertado en la base de datos.');      
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $cda= Cda::findOne(                                                               
            [

                                                     'fecha_ingreso' => $this->tester->fecha_ingreso                    ,
                                     'fecha_solicitud' => $this->tester->fecha_solicitud                    ,
                                     'tramite_administrativo' => $this->tester->tramite_administrativo                    ,
                                     'id_cproceso_arca' => $this->tester->id_cproceso_arca                    ,
                                     'id_cproceso_senagua' => $this->tester->id_cproceso_senagua                    ,
                                     'rol_en_calidad' => $this->tester->rol_en_calidad                    ,
                                     'id_cda' => $this->tester->id_cda                    ,
                                     'id_usuario_enviado_por' => $this->tester->id_usuario_enviado_por                                                 ]);                                                
        $this->assertNotNull($cda,                                                          
            'Cda se puede consultar en la base de datos.'); 
        $this->assertNull($cda,                                                          
            'Cda NO se puede consultar en la base de datos.');   
    }   
    
    
    protected function testDelete()                                                             
    {                                                                                        
       
        $this->tester->delete();
        $this->assertNull($tester,                                                          
            'Cda  fue eliminado de la base de datos.');      
    }   
    /**
     * @inheritdoc
     */
    public function testTableName()
    {
        $table= Cda::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio correctamente el nombre de la tabla '.$table); 
        $this->assertEmpty($table,                                                          
            'NO se devolvio correctamente el nombre de la tabla '.$table);  
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function testRules()
    {
        $rules= $this->tester->rules();
         $this->assertNotEmpty($rules,                                                          
            'Se devolvio correctamente laconexion '.implode(",", $rules));  
        $this->assertEmpty($rules,                                                          
            'NO ee devolvio correctamente la conexion '.implode(",", $rules));  
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function testAttributeLabels()
    {
        $labels= $this->tester->attributeLabels();
         $this->assertNotEmpty($labels,                                                          
            'Se devolvio correctamente los labels '.implode(",", $labels));  
        $this->assertEmpty($labels,                                                          
            'NO ee devolvio correctamente la conexion '.implode(",", $labels));  
    }

}
