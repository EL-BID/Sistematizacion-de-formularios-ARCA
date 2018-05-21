<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_reporte_informacion".
 *
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
 * @property integer $id_coordenada
 * @property integer $id_reporte_informacion
 * @property string $abscisa
 * @property integer $id_cda
 * @property string $observaciones
 * @property string $proba_excedencia_obtenida
 * @property string $proba_excedencia_certificado
 * @property string $decision
 * @property string $observaciones_decision
 * @property integer $id_actividad
 * @property integer $id_cactividad_proceso 
 *
 * @property Cda $idCda
 * @property CdaCaracteristica $idCaracteristica
 * @property CdaDestino $idDestino
 * @property CdaSubtipoFuente $idSubtfuente
 * @property CdaTipoFuente $idTfuente
 * @property CdaTipoReporte $idTreporte
 * @property CdaUsoSolicitado $idUsoSolicitado
 * @property FdCoordenada $idCoordenada
 * @property FdUbicacion $idUbicacion
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

            [['q_solicitado', 'abscisa', 'proba_excedencia_obtenida', 'proba_excedencia_certificado'], 'number'],
            [['tiempo_years', 'id_tfuente', 'id_subtfuente', 'id_caracteristica', 'id_treporte', 'id_destino', 'id_uso_solicitado', 'id_ubicacion',  'id_reporte_informacion', 'id_cda', 'id_actividad'], 'integer'],
            [['sector_solicitado',
                'fuente_solicitada','id_tfuente','id_subtfuente','id_caracteristica','q_solicitado','id_uso_solicitado','id_destino','tiempo_years'], 'required'],
            [['sector_solicitado', 'institucion_solicitante'], 'string', 'max' => 500],
            [['solicitante', 'fuente_solicitada'], 'string', 'max' => 50],
            [['observaciones'], 'string', 'max' => 4000],
            [['decision'], 'string', 'max' => 2],
            [['observaciones_decision'], 'string', 'max' => 1000],
            [['id_cda'], 'exist', 'skipOnError' => true, 'targetClass' => Cda::className(), 'targetAttribute' => ['id_cda' => 'id_cda']],
            [['id_caracteristica'], 'exist', 'skipOnError' => true, 'targetClass' => CdaCaracteristica::className(), 'targetAttribute' => ['id_caracteristica' => 'id_caracteristica']],
            [['id_destino'], 'exist', 'skipOnError' => true, 'targetClass' => CdaDestino::className(), 'targetAttribute' => ['id_destino' => 'id_destino']],
            [['id_subtfuente'], 'exist', 'skipOnError' => true, 'targetClass' => CdaSubtipoFuente::className(), 'targetAttribute' => ['id_subtfuente' => 'id_subtfuente']],
            [['id_tfuente'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoFuente::className(), 'targetAttribute' => ['id_tfuente' => 'id_tfuente']],
            [['id_treporte'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTipoReporte::className(), 'targetAttribute' => ['id_treporte' => 'id_treporte']],
            [['id_uso_solicitado'], 'exist', 'skipOnError' => true, 'targetClass' => CdaUsoSolicitado::className(), 'targetAttribute' => ['id_uso_solicitado' => 'id_uso_solicitado']],
           // [['id_coordenada'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\poc\FdCoordenada::className(), 'targetAttribute' => ['id_coordenada' => 'id_coordenada']],
            [['id_ubicacion'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\poc\FdUbicacion::className(), 'targetAttribute' => ['id_ubicacion' => 'id_ubicacion']],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => PsActividad::className(), 'targetAttribute' => ['id_actividad' => 'id_actividad']],
            [['id_cactividad_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCactividadProceso::className(), 'targetAttribute' => ['id_cactividad_proceso' => 'id_cactividad_proceso']], 
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'sector_solicitado' => 'Sector Solicitado',
            'institucion_solicitante' => 'Institucion Solicitante',
            'solicitante' => 'Solicitante',
            'fuente_solicitada' => 'Fuente Solicitada',
            'q_solicitado' => 'Q Solicitado l/s',
            'tiempo_years' => 'Tiempo',
            'id_tfuente' => 'Tipo Fuente',
            'id_subtfuente' => 'Subtipo Fuente',
            'id_caracteristica' => 'Caracteristica',
            'id_treporte' => 'Tipo Reporte',
            'id_destino' => 'Destino',
            'id_uso_solicitado' => 'Uso Solicitado',
            'id_ubicacion' => 'Ubicacion',
            'id_coordenada' => 'Coordenada',
            'id_reporte_informacion' => 'Reporte Informacion',
            'abscisa' => 'Abscisa',
            'id_cda' => 'CDA',
            'observaciones' => 'Observaciones',
            'proba_excedencia_obtenida' => 'Proba Excedencia Obtenida',
            'proba_excedencia_certificado' => 'Proba Excedencia Certificado',
            'decision' => 'Decision',
            'observaciones_decision' => 'Observaciones Decision',
            'id_actividad' => 'Actividad',
            'nomprovincia' => 'Provincia',
            'nomcanton' => 'Canton',
            'nomparroquia' => 'Parroquia',
            'nomtfuente' => 'Tipo Fuente',
            'nomsubtfuente' => 'Subtipo Fuente',
            'nomusosolicitado'=> 'Uso Solicitado',
            'nomdestino'=>'Destino',
            'id_cactividad_proceso' => 'Actividad Proceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCda()
    {
        return $this->hasOne(Cda::className(), ['id_cda' => 'id_cda']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCaracteristica()
    {
        return $this->hasOne(CdaCaracteristica::className(), ['id_caracteristica' => 'id_caracteristica']);
    }
    public function getCaracteristica(){
        return $this->idCaracteristica->nom_caracteristica;
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdDestino()
    {
        return $this->hasOne(CdaDestino::className(), ['id_destino' => 'id_destino']);
    }
    public function getNomDestino(){
        return $this->idDestino->nom_destino;
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdSubtfuente()
    {
        return $this->hasOne(CdaSubtipoFuente::className(), ['id_subtfuente' => 'id_subtfuente']);
    }
    public function getNomSubTFuente(){
        return $this->idSubtfuente->nom_subtfuente;
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTfuente()
    {
        return $this->hasOne(CdaTipoFuente::className(), ['id_tfuente' => 'id_tfuente']);
    }
    public function getNomTFuente(){
        return $this->idTfuente->nom_tfuente;
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
    public function getNomUsoSolicitado(){
        return $this->idUsoSolicitado->nom_uso_solicitado;
    }

//    /**
//     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
//     */
//    public function getIdCoordenada()
//    {
//        return $this->hasOne(\common\models\poc\FdCoordenada::className(), ['id_coordenada' => 'id_coordenada']);
//    }
//    public function getLongitud() {
//        return $this->idCoordenada->longitud;
//    }
//    public function getLatitud() {
//        return $this->idCoordenada->latitud;
//    }
//    public function getAltura() {
//        return $this->idCoordenada->altura;
//    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUbicacion()
    {
        return $this->hasOne(\common\models\poc\FdUbicacion::className(), ['id_reporte_informacion' => 'id_reporte_informacion']);
    }

    public function getNomParroquia(){
        return $this->idUbicacion->codParroquia->nombre_parroquia;
    }
    public function getNomProvincia(){
        return $this->idUbicacion->codProvincia->nombre_provincia;
    }
    public function getNomCanton(){
        return $this->idUbicacion->codCanton->nombre_canton ;
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
    public function getFdCoordenadas()
    {
        return $this->hasOne(\common\models\poc\FdCoordenada::className(), ['id_reporte_informacion' => 'id_reporte_informacion']);
    }
    
    public function getLongitud() {
        return $this->fdCoordenadas->longitud;
    }
    public function getLatitud() {
        return $this->fdCoordenadas->latitud;
    }
    public function getAltura() {
        return $this->fdCoordenadas->altura;
    }
    

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCoordenadas0()
    {
        return $this->hasMany(\common\models\poc\FdCoordenada::className(), ['id_reporte_informacion' => 'id_reporte_informacion']);
    }
    
    /**
    * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
    */
    public function getIdCactividadProceso() 
    { 
        return $this->hasOne(PsCactividadProceso::className(), ['id_cactividad_proceso' => 'id_cactividad_proceso']); 
    } 
    
    
    public function getFdCoordenadasvista()
    {
        return $this->hasOne(\common\models\poc\FdCoordenada::className(), ['id_reporte_informacion' => 'id_reporte_informacion'])->where('id_tcoordenada= :tipo',[':tipo' => '1']);
    }
}
