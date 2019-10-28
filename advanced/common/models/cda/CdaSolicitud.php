<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_solicitud".
 *
 * @property integer $id_cda_solicitud
 * @property string $num_solicitud
 * @property string $fecha_solicitud
 * @property string $fecha_ingreso
 * @property integer $id_cproceso_arca
 * @property integer $id_cproceso_senagua
 * @property string $tramite_administrativo
 * @property integer $numero_tramites
 * @property integer $id_cda_rol
 * @property string $rol_en_calidad
 * @property string $enviado_por
 *
 * @property CdaDhCac $idDhCac
 * @property CdaRol $idCdaRol
 * @property PsCproceso $idCprocesoArca
 * @property PsCproceso $idCprocesoSenagua
 * @property CdaTramite[] $cdaTramites
 */
class CdaSolicitud extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_solicitud';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_solicitud'],'required'],
            [['id_cproceso_arca', 'id_cproceso_senagua', 'numero_tramites', 'id_cda_rol'], 'integer'],
            [['fecha_solicitud', 'fecha_ingreso','fecha_recepcion_anexos'], 'safe'],
            [['num_solicitud', 'rol_en_calidad', 'enviado_por'], 'string', 'max' => 100],
            [['tramite_administrativo'], 'string', 'max' => 50],
            [['id_cda_rol'], 'exist', 'skipOnError' => true, 'targetClass' => CdaRol::className(), 'targetAttribute' => ['id_cda_rol' => 'id_cda_rol']],
            [['cod_centro_atencion_ciudadano'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\poc\CentroAtencionCiudadano::className(), 'targetAttribute' => ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']], 
            [['id_demarcacion'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Demarcaciones::className(), 'targetAttribute' => ['id_demarcacion' => 'id_demarcacion']], 
            [['id_cproceso_arca'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso_arca' => 'id_cproceso']],
            [['id_cproceso_senagua'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso_senagua' => 'id_cproceso']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_cda_solicitud' => 'Id Cda Solicitud',
            'num_solicitud' => 'Número de Solicitud',
            'fecha_solicitud' => 'Fecha Oficio',
            'fecha_ingreso' => 'Fecha Ingreso Quipux',
            'fecha_recepcion_anexos' => 'Fecha Recepción Anexos Completos',
            'id_cproceso_arca' => 'Número Quipux Arca',
            'id_cproceso_senagua' => 'Número Quipux Senagua',
            'tramite_administrativo' => 'Tipo de Atención',
            'numero_tramites' => 'Cantidad Trámites',
            'id_cda_rol' => 'Rol',
            'rol_en_calidad' => 'En Calidad',
            'enviado_por' => 'Enviado Por',
            'cod_centro_atencion_ciudadano' => 'Centro Atencion Ciudadano', 
           'id_demarcacion' => 'Demarcacion', 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdDhCac()
    {
        return $this->hasOne(CdaDhCac::className(), ['id_dh_cac' => 'id_dh_cac']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCdaRol()
    {
        return $this->hasOne(CdaRol::className(), ['id_cda_rol' => 'id_cda_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCprocesoArca()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso_arca']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCprocesoSenagua()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso_senagua']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaTramites()
    {
        return $this->hasMany(CdaTramite::className(), ['id_cda_solicitud' => 'id_cda_solicitud']);
    }
    
    
    public function getCodCentroAtencionCiudadano() 
    { 
       return $this->hasOne(CentroAtencionCiudadano::className(), ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']); 
    } 
 
   /** 
    * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla 
    */ 
   public function getIdDemarcacion() 
   { 
       return $this->hasOne(Demarcaciones::className(), ['id_demarcacion' => 'id_demarcacion']); 
   }
}
