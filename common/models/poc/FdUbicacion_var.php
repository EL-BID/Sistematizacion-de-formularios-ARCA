<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_ubicacion".
 *
 * @property integer $id_ubicacion
 * @property string $cod_parroquia
 * @property string $cod_canton
 * @property string $cod_provincia
 * @property string $id_demarcacion
 * @property integer $cod_centro_atencion_ciudadano
 * @property string $descripcion_ubicacion
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 *
 * @property CentroAtencionCiudadano $codCentroAtencionCiudadano
 * @property Demarcaciones $idDemarcacion
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 * @property Parroquias $codParroquia
 */
class FdUbicacion_var extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_ubicacion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_canton','cod_provincia','id_demarcacion','id_conjunto_respuesta','id_capitulo'],'required'],
            [['id_conjunto_respuesta', 'id_pregunta', 'id_respuesta'], 'integer'],
            [['id_demarcacion'], 'number'],
            [['cod_parroquia', 'cod_canton', 'cod_provincia','cod_centro_atencion_ciudadano'], 'string'],
            [['descripcion_ubicacion'], 'string', 'max' => 50],
            [['cod_centro_atencion_ciudadano'], 'exist', 'skipOnError' => true, 'targetClass' => CentroAtencionCiudadano::className(), 'targetAttribute' => ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']],
            [['id_demarcacion'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Demarcaciones::className(), 'targetAttribute' => ['id_demarcacion' => 'id_demarcacion']],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
            //[['cod_parroquia', 'cod_canton', 'cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Parroquias::className(), 'targetAttribute' => ['cod_parroquia' => 'cod_parroquia', 'cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']],
            [['cod_parroquia'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Parroquias::className(), 'targetAttribute' => ['cod_parroquia' => 'cod_parroquia']],
            [['cod_canton'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Cantones::className(), 'targetAttribute' => ['cod_canton' => 'cod_canton']],
            [['cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Provincias::className(), 'targetAttribute' => ['cod_provincia' => 'cod_provincia']],
            
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_parroquia' => 'Cod Parroquia',
            'cod_canton' => 'Cod Canton',
            'cod_provincia' => 'Cod Provincia',
            'id_demarcacion' => 'Id Demarcacion',
            'cod_centro_atencion_ciudadano' => 'Cod Centro Atencion Ciudadano',
            'descripcion_ubicacion' => 'Descripcion Ubicacion',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodCentroAtencionCiudadano()
    {
        return $this->hasOne(CentroAtencionCiudadano::className(), ['cod_centro_atencion_ciudadano' => 'cod_centro_atencion_ciudadano']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdDemarcacion()
    {
        return $this->hasOne(\common\models\autenticacion\Demarcaciones::className(), ['id_demarcacion' => 'id_demarcacion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdConjuntoRespuesta()
    {
        return $this->hasOne(FdConjuntoRespuesta::className(), ['id_conjunto_respuesta' => 'id_conjunto_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPregunta()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdRespuesta()
    {
        return $this->hasOne(FdRespuesta::className(), ['id_respuesta' => 'id_respuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodParroquia()
    {
        return $this->hasOne(\common\models\autenticacion\Parroquias::className(), ['cod_parroquia' => 'cod_parroquia', 'cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']);
    }
    
    public function getCodCanton()
    {
        return $this->hasOne(\common\models\autenticacion\Cantones::className(), ['cod_canton' => 'cod_canton']);
    }
    
    public function getCodProvincia()
    {
        return $this->hasOne(\common\models\autenticacion\Provincias::className(), ['cod_provincia' => 'cod_provincia']);
    }
    
    
}
