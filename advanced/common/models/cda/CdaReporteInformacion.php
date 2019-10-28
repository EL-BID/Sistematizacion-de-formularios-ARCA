<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\poc\FdCoordenada;

/**
 * Este es el modelo para la clase "cda_reporte_informacion".
 *
 * @property integer $id_reporte_informacion
 * @property string $sector_solicitado
 * @property string $institucion_solicitante
 * @property string $solicitante
 * @property string $fuente_solicitada
 * @property string $q_solicitado
 * @property integer $tiempo_years
 * @property integer $id_tfuente
 * @property integer $id_subtfuente
 * @property integer $id_caracteristica
 * @property integer $id_treporte
 * @property integer $id_destino
 * @property integer $id_uso_solicitado
 * @property integer $id_ubicacion
 * @property string $abscisa
 * @property string $observaciones
 * @property string $proba_excedencia_obtenida
 * @property string $proba_excedencia_certificado
 * @property string $decision
 * @property string $observaciones_decision
 * @property integer $id_actividad
 * @property integer $id_cactividad_proceso
 * @property string $estado
 * @property string $causa_anulacion
 * @property string $causa_correccion
 * @property integer $id_tipo
 * @property integer $id_tramite
 *
 * @property CdaCaracteristica $idCaracteristica
 * @property CdaDestino $idDestino
 * @property CdaSubtipoFuente $idSubtfuente
 * @property CdaTipoFuente $idTfuente
 * @property CdaTipoReporte $idTreporte
 * @property CdaTramite $idTramite
 * @property CdaUsoSolicitado $idUsoSolicitado
 * @property PsActividad $idActividad
 * @property PsCactividadProceso $idCactividadProceso
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdCoordenada[] $fdCoordenadas0
 */
class CdaReporteInformacion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_reporte_informacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['abscisa', 'proba_excedencia_obtenida', 'proba_excedencia_certificado','id_cod_cda','id_cda_institucion_apoyo'], 'number','skipOnEmpty'=>true],
            [['q_solicitado'], 'number', 'numberPattern' => '/^[0-9]+(\.[0-9]{1,4})?$/','message'=>'El valor debe ser un numero decimal separado por punt "." Ej:2.9025','skipOnEmpty'=>true],
            [['id_actividad'],'integer','skipOnEmpty'=>true],
            [['tiempo_years', 'id_tfuente', 'id_subtfuente', 'id_caracteristica', 'id_treporte', 'id_destino', 'id_uso_solicitado', 'id_ubicacion', 'id_cactividad_proceso', 'id_tipo'], 'integer','skipOnEmpty'=>true],
            [['sector_solicitado', 'institucion_solicitante', 'solicitante'], 'string', 'max' => 500,'skipOnEmpty'=>true],
            [['fuente_solicitada','oficio_visita'], 'string', 'max' => 50,'skipOnEmpty'=>true],
            [['fecha_visita'], 'safe','skipOnEmpty'=>true],
            [['observaciones'], 'string', 'max' => 4000,'skipOnEmpty'=>true],
            [['decision'], 'string', 'max' => 2,'skipOnEmpty'=>true],
            [['observaciones_decision','oficios_relacionados','institucion_apoyo_otros'], 'string', 'max' => 1000,'skipOnEmpty'=>true],
            [['estado', 'causa_anulacion', 'causa_correccion'], 'string', 'max' => 100,'skipOnEmpty'=>true],
            [['id_caracteristica'], 'exist', 'skipOnError' => true, 'targetClass' => CdaCaracteristica::className(), 'targetAttribute' => ['id_caracteristica' => 'id_caracteristica']],
            [['id_destino'], 'exist', 'skipOnError' => true, 'targetClass' => CdaDestino::className(), 'targetAttribute' => ['id_destino' => 'id_destino']],
            [['id_subdestino'], 'exist', 'skipOnError' => true, 'targetClass' => CdaSubdestino::className(), 'targetAttribute' => ['id_subdestino' => 'id_subdestino']],
            [['id_subtfuente'], 'exist', 'skipOnError' => true, 'targetClass' => CdaSubtipoFuente::className(), 'targetAttribute' => ['id_subtfuente' => 'id_subtfuente']],
            [['id_tfuente'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoFuente::className(), 'targetAttribute' => ['id_tfuente' => 'id_tfuente']],
            [['id_treporte'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoReporte::className(), 'targetAttribute' => ['id_treporte' => 'id_treporte']],
            [['id_uso_solicitado'], 'exist', 'skipOnError' => true, 'targetClass' => CdaUsoSolicitado::className(), 'targetAttribute' => ['id_uso_solicitado' => 'id_uso_solicitado']],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => PsActividad::className(), 'targetAttribute' => ['id_actividad' => 'id_actividad']],
            [['id_cactividad_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCactividadProceso::className(), 'targetAttribute' => ['id_cactividad_proceso' => 'id_cactividad_proceso']],
            [['id_cda_institucion_apoyo'], 'exist', 'skipOnError' => true, 'targetClass' => CdaInstitucionesApoyo::className(), 'targetAttribute' => ['id_cda_institucion_apoyo' => 'Id']],
            [['sector_solicitado','fuente_solicitada','id_destino','id_subdestino','q_solicitado','proba_excedencia_certificado','id_uso_solicitado','id_tfuente'], 'required', 'on' => 'registrardatoscertificados'],
            [['id_tfuente', 'fecha_visita','id_subtfuente','id_uso_solicitado','fuente_solicitada','id_coordenada','id_destino','id_subdestino'], 'required', 'on' => 'registravisita'],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        switch ($this->scenario) {
            case 'registrardatoscertificados':
                return [
                    'sector_solicitado' => 'Sector Certificado',
                    'fuente_solicitada' => 'Fuente Solicitada',
                    'id_destino' => 'Destino Certificado',
                    'q_solicitado' => 'Q Certificado',
                    'proba_excedencia_certificado' => 'Probabilidad Excedencia Certificada',
                    'id_uso_solicitado' => 'Uso Certificado',
                    'id_tfuente' => 'Tipo de Fuente',
                    'id_cod_cda' => 'Código CDA',
                    'id_subdestino' => 'Subdestino',
                    
                ];
                
            break;
            
            case 'registravisita':
                return [
                    'id_tfuente' => 'Tipo de Fuente Observado',
                    'id_subtfuente' => 'Subtipo Fuente Observado',
                    'id_destino' => 'Destino Observado',
                    'id_uso_solicitado' => 'Uso/Aprovechamiento Observado',
                    'id_cod_cda' => 'Código CDA',
                    'fuente_solicitada' => 'Fuente Observada',
                    'fecha_visita'=>'Fecha de visita',
                    'oficio_visita'=>'Oficio de visita',
                    'id_subdestino' => 'Subdestino'
                ];
                
            break;
        
            default:
                
                 return [
                    'id_reporte_informacion' => 'Id Reporte Informacion',
                    'sector_solicitado' => 'Sector Solicitado',
                    'institucion_solicitante' => 'Institución Solicitante',
                    'solicitante' => 'Solicitante',
                    'fuente_solicitada' => 'Fuente Solicitada',
                    'q_solicitado' => 'Q Solicitado [l/s]',
                    'tiempo_years' => 'Tiempo (Años)',
                    'id_tfuente' => 'Tipo de Fuente',
                    'id_subtfuente' => 'Tipo SubFuente',
                    'id_caracteristica' => 'Característica',
                    'id_treporte' => 'Tipo Reporte',
                    'id_destino' => 'Destino',
                    'id_uso_solicitado' => 'Uso Solicitado',
                    'id_ubicacion' => 'Id Ubicacion',
                    'abscisa' => 'Abscisa',
                    'observaciones' => 'Observaciones',
                    'proba_excedencia_obtenida' => 'Proba Excedencia Obtenida',
                    'proba_excedencia_certificado' => 'Proba Excedencia Certificado',
                    'decision' => 'Decision',
                    'observaciones_decision' => 'Observaciones Decision',
                    'id_actividad' => 'Id Actividad',
                    'id_cactividad_proceso' => 'Id Cactividad Proceso',
                    'estado' => 'Estado',
                    'causa_anulacion' => 'Causa Anulación',
                    'causa_correccion' => 'Causa Corrección',
                    'id_tipo' => 'Id Tipo',
                    'id_cda_institucion_apoyo' => 'Instituciones Apoyo',
                    'id_cod_cda' => 'Código CDA',
                    'id_subdestino' => 'Subdestino',
                ];
            break;
        }
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCaracteristica()
    {
        return $this->hasOne(CdaCaracteristica::className(), ['id_caracteristica' => 'id_caracteristica']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdDestino()
    {
        return $this->hasOne(CdaDestino::className(), ['id_destino' => 'id_destino']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdSubdestino()
    {
        return $this->hasOne(CdaSubdestino::className(), ['id_subdestino' => 'id_subdestino']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdSubtfuente()
    {
        return $this->hasOne(CdaSubtipoFuente::className(), ['id_subtfuente' => 'id_subtfuente']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTfuente()
    {
        return $this->hasOne(CdaTipoFuente::className(), ['id_tfuente' => 'id_tfuente']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTreporte()
    {
        return $this->hasOne(CdaTipoReporte::className(), ['id_treporte' => 'id_treporte']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsoSolicitado()
    {
        return $this->hasOne(CdaUsoSolicitado::className(), ['id_uso_solicitado' => 'id_uso_solicitado']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdActividad()
    {
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCactividadProceso()
    {
        return $this->hasOne(PsCactividadProceso::className(), ['id_cactividad_proceso' => 'id_cactividad_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCoordenadas()
    {
        return $this->hasOne(FdCoordenada::className(), ['id_coordenada' => 'id_coordenada']);
    }
    
    public function getFdUbicacion()
    {
        return $this->hasOne(\common\models\poc\FdUbicacion::className(), ['id_ubicacion' => 'id_ubicacion']);
    }

    public function getPsCodCda()
    {
        return $this->hasOne(PsCodCda::className(), ['id_cod_cda' => 'id_cod_cda']);
    }
    
    
    public function getCodParroquia()
    {
        return $this->hasOne(\common\models\autenticacion\Parroquias::className(), ['cod_parroquia' => 'cod_parroquia', 'cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia'])->viaTable('fd_ubicacion', ['id_ubicacion' => 'id_ubicacion']);
    }

    public function getCodCanton()
    {
        return $this->hasOne(\common\models\autenticacion\Cantones::className(), ['cod_canton' => 'cod_canton','cod_provincia' => 'cod_provincia'])->viaTable('fd_ubicacion', ['id_ubicacion' => 'id_ubicacion']);
    }

    public function getCodProvincia()
    {
        return $this->hasOne(\common\models\autenticacion\Provincias::className(), ['cod_provincia' => 'cod_provincia'])->viaTable('fd_ubicacion', ['id_ubicacion' => 'id_ubicacion']);
    }
    
    public function getCdaInstitucionApoyo()
    {
        return $this->hasOne(CdaInstitucionesApoyo::className(), ['Id' => 'id_cda_institucion_apoyo']);
    }
  
}
