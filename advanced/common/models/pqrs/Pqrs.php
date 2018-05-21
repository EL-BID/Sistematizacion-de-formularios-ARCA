<?php

namespace common\models\pqrs;

use Yii;
use common\models\modelpry\ModelPry;
use common\models\autenticacion\Cantones;
use common\models\autenticacion\Provincias;
use common\models\cda\PsCproceso;
use common\models\cda\PsEstadoProceso;
use common\models\cda\PsActividad;
use common\models\autenticacion\UsuariosAp;

/**
 * Este es el modelo para la clase "pqrs".
 *
 * @property integer $id_pqrs
 * @property string $fecha_recepcion
 * @property integer $num_consecutivo
 * @property string $sol_nombres
 * @property integer $sol_doc_identificacion
 * @property string $sol_direccion
 * @property string $sol_email
 * @property string $sol_telefono
 * @property string $en_nom_nombres
 * @property integer $en_nom_ruc
 * @property string $en_nom_direccion
 * @property string $en_nom_email
 * @property string $en_nom_telefono
 * @property string $aquien_dirige
 * @property string $objeto_peticion
 * @property string $descripcion_peticion
 * @property string $subtipo_queja
 * @property string $subtipo_reclamo
 * @property string $subtipo_controversia
 * @property string $por_quien_qrc
 * @property string $lugar_hechos
 * @property string $fecha_hechos
 * @property string $naracion_hechos
 * @property string $elementos_probatorios
 * @property string $denunc_nombre
 * @property string $denunc_direccion
 * @property string $denunc_telefono
 * @property string $subtipo_sugerencia
 * @property string $subtipo_felicitacion
 * @property string $descripcion_sugerencia
 * @property string $sol_cod_provincia
 * @property string $sol_cod_canton
 * @property string $en_nom_cod_provincia
 * @property string $en_nom_cod_canton
 * @property integer $id_cproceso
 *
 * @property Cantones $solCodProvincia
 * @property Cantones $enNomCodProvincia
 * @property Provincias $solCodProvincia0
 * @property Provincias $enNomCodProvincia0
 * @property PsCproceso $idCproceso
 */
class Pqrs extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pqrs';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['en_nom_cod_provincia','en_nom_cod_canton'], 'default', 'value' => null],
            [['fecha_recepcion','sol_nombres','sol_doc_identificacion','sol_direccion','sol_email','sol_telefono','aquien_dirige','descripcion_peticion'], 'required', 'on' => 'sc_peticion','message'=>'Campo Obligatorio'],
            [['sol_doc_identificacion', 'en_nom_ruc', 'id_cproceso'], 'integer'],
            [['fecha_recepcion', 'fecha_hechos'], 'string'],
            [['objeto_peticion', 'descripcion_peticion', 'naracion_hechos', 'elementos_probatorios', 'descripcion_sugerencia'], 'string'],
            [['sol_nombres', 'sol_direccion', 'sol_email', 'en_nom_nombres', 'en_nom_direccion', 'en_nom_email', 'aquien_dirige', 'por_quien_qrc', 'lugar_hechos', 'denunc_nombre', 'denunc_direccion'], 'string', 'max' => 500],
            [['sol_telefono', 'en_nom_telefono', 'denunc_telefono'], 'string', 'max' => 50],
            [['subtipo_queja', 'subtipo_reclamo', 'subtipo_controversia', 'subtipo_sugerencia', 'subtipo_felicitacion'], 'string', 'max' => 2],
            [['sol_cod_provincia', 'sol_cod_canton', 'en_nom_cod_provincia', 'en_nom_cod_canton'], 'string', 'max' => 4],
            [['sol_cod_provincia', 'sol_cod_canton'], 'exist', 'skipOnError' => true, 'targetClass' => Cantones::className(), 'targetAttribute' => ['sol_cod_provincia' => 'cod_provincia', 'sol_cod_canton' => 'cod_canton']],
            [['en_nom_cod_provincia', 'en_nom_cod_canton'], 'exist', 'skipOnError' => true, 'targetClass' => Cantones::className(), 'targetAttribute' => ['en_nom_cod_provincia' => 'cod_provincia', 'en_nom_cod_canton' => 'cod_canton']],
            [['sol_cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincias::className(), 'targetAttribute' => ['sol_cod_provincia' => 'cod_provincia']],
            [['en_nom_cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincias::className(), 'targetAttribute' => ['en_nom_cod_provincia' => 'cod_provincia']],
            [['id_cproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso' => 'id_cproceso']]
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_pqrs' => 'Id Pqrs',
            'fecha_recepcion' => 'Fecha Recepcion',
            'num_consecutivo' => 'Num Consecutivo',
            'sol_nombres' => 'Nombres y Apellidos Completos',
            'sol_doc_identificacion' => 'Documento de Identificación',
            'sol_direccion' => 'Direccion',
            'sol_email' => 'Correo Electronico',
            'sol_telefono' => 'Telefono',
            'en_nom_nombres' => 'En Nom Nombres',
            'en_nom_ruc' => 'En Nom Ruc',
            'en_nom_direccion' => 'En Nom Direccion',
            'en_nom_email' => 'En Nom Email',
            'en_nom_telefono' => 'En Nom Telefono',
            'aquien_dirige' => 'Aquien Dirige',
            'objeto_peticion' => 'Objeto Peticion',
            'descripcion_peticion' => 'Descripcion Peticion',
            'subtipo_queja' => 'Subtipo Queja',
            'subtipo_reclamo' => 'Subtipo Reclamo',
            'subtipo_controversia' => 'Subtipo Controversia',
            'por_quien_qrc' => 'Por Quien Qrc',
            'lugar_hechos' => 'Lugar Hechos',
            'fecha_hechos' => 'Fecha Hechos',
            'naracion_hechos' => 'Naracion Hechos',
            'elementos_probatorios' => 'Elementos Probatorios',
            'denunc_nombre' => 'Denunc Nombre',
            'denunc_direccion' => 'Denunc Direccion',
            'denunc_telefono' => 'Denunc Telefono',
            'subtipo_sugerencia' => 'Sugerencia',
            'subtipo_felicitacion' => 'Felicitación',
            'descripcion_sugerencia' => 'Descripcion Sugerencia',
            'sol_cod_provincia' => 'Sol Cod Provincia',
            'sol_cod_canton' => 'Sol Cod Canton',
            'en_nom_cod_provincia' => 'En Nom Cod Provincia',
            'en_nom_cod_canton' => 'En Nom Cod Canton',
            'id_cproceso' => 'Id Cproceso',
        ];
    }
    
    
    
     /*Aplicando scenarios*/
    public function scenarios() {
        $scenarios = parent::scenarios();
        
        //Scenario para analizar informacion================================================================================================
        $scenarios['sc_peticion'] = ['fecha_recepcion',
                                    'num_consecutivo',
                                    'sol_nombres',
                                    'sol_doc_identificacion',
                                    'sol_direccion',
                                    'sol_cod_provincia',
                                    'sol_cod_canton',
                                    'sol_email',
                                    'sol_telefono',
                                    'en_nom_nombres',
                                    'en_nom_ruc',
                                    'en_nom_direccion',
                                    'en_nom_cod_provincia',
                                    'en_nom_cod_canton',
                                    'en_nom_email',
                                    'en_nom_telefono',
                                    'aquien_dirige',
                                    'objeto_peticion',
                                    'descripcion_peticion'];//Scenario Values Only Accepted
        
        
        $scenarios['sc_quejas'] = ['fecha_recepcion',
                                    'num_consecutivo',
                                    'sol_nombres',
                                    'sol_doc_identificacion',
                                    'sol_direccion',
                                    'sol_cod_provincia',
                                    'sol_cod_canton',
                                    'sol_email',
                                    'sol_telefono',
                                    'en_nom_nombres',
                                    'en_nom_ruc',
                                    'en_nom_direccion',
                                    'en_nom_cod_provincia',
                                    'en_nom_cod_canton',
                                    'en_nom_email',
                                    'en_nom_telefono',
                                    'subtipo_queja',
                                    'subtipo_reclamo',
                                    'subtipo_controversia',
                                    'porquien_qrc',
                                    'lugar_hechos',
                                    'fecha_hechos',
                                    'narracion_hechos',
                                    'elementos_probatorios'];//Scenario Values Only Accepted
        
        
         $scenarios['sc_denuncia'] = ['fecha_recepcion',
                                    'num_consecutivo',
                                    'sol_nombres',
                                    'sol_doc_identificacion',
                                    'sol_direccion',
                                    'sol_cod_provincia',
                                    'sol_cod_canton',
                                    'sol_email',
                                    'sol_telefono',
                                    'en_nom_nombres',
                                    'en_nom_ruc',
                                    'en_nom_direccion',
                                    'en_nom_cod_provincia',
                                    'en_nom_cod_canton',
                                    'en_nom_email',
                                    'en_nom_telefono',
                                    'lugar_hechos',
                                    'fecha_hechos',
                                    'narracion_hechos',
                                    'elementos_probatorios',
                                    'denunc_nombre',
                                    'denunc_direccion',
                                    'denunc_telefono'];//Scenario Values Only Accepted
         
         $scenarios['sc_felicitacion'] = ['fecha_recepcion',
                                    'num_consecutivo',
                                    'sol_nombres',
                                    'sol_doc_identificacion',
                                    'sol_direccion',
                                    'sol_cod_provincia',
                                    'sol_cod_canton',
                                    'sol_email',
                                    'sol_telefono',
                                    'en_nom_nombres',
                                    'en_nom_ruc',
                                    'en_nom_direccion',
                                    'en_nom_cod_provincia',
                                    'en_nom_cod_canton',
                                    'en_nom_email',
                                    'en_nom_telefono',
                                    'aquien_dirige',
                                    'subtipo_sugerencia',
                                    'subtipo_felicitacion',
                                    'descripcion_sugerencia'];//Scenario Values Only Accepted
        
        
	return $scenarios;
    }
    

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getSolCodProvincia()
    {
        return $this->hasOne(Cantones::className(), ['cod_provincia' => 'sol_cod_provincia', 'cod_canton' => 'sol_cod_canton']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getEnNomCodProvincia()
    {
        return $this->hasOne(Cantones::className(), ['cod_provincia' => 'en_nom_cod_provincia', 'cod_canton' => 'en_nom_cod_canton']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getSolCodProvincia0()
    {
        return $this->hasOne(Provincias::className(), ['cod_provincia' => 'sol_cod_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getEnNomCodProvincia0()
    {
        return $this->hasOne(Provincias::className(), ['cod_provincia' => 'en_nom_cod_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCproceso()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso']);
    }
    
    
    public function getEstado(){
        return $this->hasOne(PsEstadoProceso::className(), ['id_eproceso' => 'ult_id_eproceso'])->via('idCproceso'); 
    }
    
    public function getActividad(){
        return $this->hasOne(PsActividad::className(), ['id_actividad' => 'ult_id_actividad'])->via('idCproceso'); 
    }
    
     public function getUsuario(){
        return $this->hasOne(UsuariosAp::className(), ['id_usuario' => 'ult_id_usuario'])->via('idCproceso'); 
    }
}
