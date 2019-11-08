<?php

namespace common\models\cda;

use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda".
 *
 * @property string                    $fecha_ingreso
 * @property string                    $fecha_solicitud
 * @property string                    $tramite_administrativo
 * @property int                       $id_cproceso_arca
 * @property int                       $id_cproceso_senagua
 * @property string                    $rol_en_calidad
 * @property int                       $numero_tramites
 * @property int                       $id_cda
 * @property string                    $id_usuario_enviado_por
 * @property string                    $institucion_solicitante
 * @property string                    $solicitante
 * @property int                       $cod_centro_atencion_ciudadano
 * @property string                    $id_demarcacion
 * @property CentroAtencionCiudadano   $codCentroAtencionCiudadano
 * @property Demarcaciones             $idDemarcacion
 * @property PsCproceso                $idCprocesoArca
 * @property PsCproceso                $idCprocesoSenagua
 * @property Rol                       $rolEnCalidad
 * @property UsuariosAp                $idUsuarioEnviadoPor
 * @property CdaAnalisisHidrologico[]  $cdaAnalisisHidrologicos
 * @property CdaErrores[]              $cdaErrores
 * @property CdaReporteInformacion[]   $cdaReporteInformacions
 * @property CdaSolicitudInformacion[] $cdaSolicitudInformacions
 */
class Cda extends ModelPry
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cda';
    }

    /**
     * {@inheritdoc} Reglas de Validación
     */
    public function rules()
    {
        return [
            [['fecha_ingreso', 'fecha_solicitud', 'codigo_solicitud_tecnico', 'institucion_solicitante', 'solicitante', 'id_usuario_enviado_por', 'id_cda_rol', 'id_dh_cac', 'numero_tramites', 'cod_cda'], 'string'],
            [['id_cproceso_arca', 'id_cproceso_senagua', 'id_cda', 'puntos_solicitados', 'cod_centro_atencion_ciudadano', 'id_demarcacion'], 'integer'],
            [['numero_tramites', 'id_usuario_enviado_por', 'fecha_ingreso'], 'required'],
            [['fecha_ingreso'], 'required', 'on' => 'createsolicitud'],
            [['cod_cda'], 'required', 'on' => 'anexocodcda'],
            [['id_usuario_enviado_por'], 'required', 'on' => 'updateadmin'],
            [['puntos_solicitados', 'codigo_solicitud_tecnico'], 'required', 'on' => 'analizarinformacion'],
            [['institucion_solicitante', 'solicitante', 'id_demarcacion', 'cod_centro_atencion_ciudadano'], 'required', 'on' => 'registrardatos'],
            [['id_demarcacion','cod_centro_atencion_ciudadano',''],'required','on'=>'datossalida'],
            [['tramite_administrativo'], 'string', 'max' => 50],
            [['institucion_solicitante', 'solicitante', 'rol_en_calidad'], 'string', 'max' => 500],
            [['cod_centro_atencion_ciudadano'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\poc\CentroAtencionCiudadano::className(), 'targetAttribute' => ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']],
            [['id_demarcacion'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Demarcaciones::className(), 'targetAttribute' => ['id_demarcacion' => 'id_demarcacion']],
            [['id_cproceso_arca'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso_arca' => 'id_cproceso']],
            [['id_cproceso_senagua'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso_senagua' => 'id_cproceso']],
            //[['rol_en_calidad'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Rol::className(), 'targetAttribute' => ['rol_en_calidad' => 'cod_rol']],
         ];
    }

    /**
     * {@inheritdoc} Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'fecha_ingreso' => 'Fecha Ingreso a la Arca',
            'fecha_solicitud' => 'Fecha Solicitud',
            'tramite_administrativo' => 'Tipo de Atención',
            'id_cproceso_arca' => 'Proceso Arca',
            'id_cproceso_senagua' => 'Proceso Senagua',
            'rol_en_calidad' => 'En Calidad',
            'numero_tramites' => 'Cantidad de Trámites',
            'id_cda' => 'Id Cda',
            'id_usuario_enviado_por' => 'Enviado Por',
            'institucion_solicitante' => 'Institución o gremio solicitante',
            'solicitante' => 'Solicitante/Representante',
            'cod_centro_atencion_ciudadano' => 'Centro Atención Ciudadano',
            'id_demarcacion' => 'Demarcación',
            'id_cda_rol' => 'Rol',
            'id_dh_cac' => 'DH/CAC',
            'fecha_oficio' => 'Fecha Oficio'
        ];
    }

    /*Aplicando scenarios*/
    public function scenarios()
    {
        $scenarios = parent::scenarios();

        //Scenario para analizar informacion================================================================================================
        $scenarios['analizarinformacion'] = ['puntos_solicitados', 'codigo_solicitud_tecnico']; //Scenario Values Only Accepted

        //Scenario para registrar datos======================================================================================================
        $scenarios['registrardatos'] = ['institucion_solicitante', 'solicitante', 'id_demarcacion', 'cod_centro_atencion_ciudadano'];

        //Datos Administrativos ===================================================================================================================================================================
        $scenarios['updateadmin'] = ['id_cproceso_senagua', 'id_cproceso_arca', 'id_usuario_enviado_por', 'fecha_ingreso', 'fecha_solicitud', 'id_dh_cac'];

        $scenarios['createsolicitud'] = ['fecha_ingreso', 'fecha_solicitud'];

        $scenarios['anexocodcda'] = ['cod_cda'];

        return $scenarios;
    }

    public function getIdDemarcacion()
    {
        return $this->hasOne(\common\models\autenticacion\Demarcaciones::className(), ['id_demarcacion' => 'id_demarcacion']);
    }

    public function getCentroatencion()
    {
        return $this->hasOne(\common\models\poc\CentroAtencionCiudadano::className(), ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']);
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
    public function getRolEnCalidad()
    {
        return $this->hasOne(Rol::className(), ['cod_rol' => 'rol_en_calidad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaAnalisisHidrologicos()
    {
        return $this->hasMany(CdaAnalisisHidrologico::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaErrores()
    {
        return $this->hasMany(CdaErrores::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaReporteInformacions()
    {
        return $this->hasMany(CdaReporteInformacion::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCdaSolicitudInformacions()
    {
        return $this->hasMany(CdaSolicitudInformacion::className(), ['id_cda' => 'id_cda']);
    }

    public function getObtenerultidcactividaproceso()
    {
        return $this->hasOne(PsCactividadProceso::className(), ['id_cproceso' => 'id_cproceso_arca'])->orderBy(['ps_cactividad_proceso.fecha_creacion' => SORT_DESC, 'id_cactividad_proceso' => SORT_DESC]);
    }
}
