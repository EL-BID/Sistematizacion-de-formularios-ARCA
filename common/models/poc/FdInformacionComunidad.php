<?php

namespace common\models\poc;

use common\models\modelpry\ModelPry;
use common\models\autenticacion\Parroquias;

/**
 * Este es el modelo para la clase "fd_informacion_comunidad".
 *
 * @property int                 $id_info_comunida
 * @property string              $parroquia
 * @property string              $comunidad
 * @property int                 $habitantes
 * @property int                 $id_conjunto_respuesta
 * @property int                 $id_pregunta
 * @property int                 $id_respuesta
 * @property int                 $id_capitulo
 * @property string              $cod_parroquia
 * @property string              $cod_canton
 * @property string              $cod_provincia
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta          $idPregunta
 * @property FdRespuesta         $idRespuesta
 * @property Parroquias          $codParroquia
 */
class FdInformacionComunidad extends ModelPry
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fd_informacion_comunidad';
    }

    /**
     * {@inheritdoc} Reglas de Validación
     */
    public function rules()
    {
        return [
            //[['id_info_comunida'], 'required'],
            [['habitantes', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo'], 'integer'],
            [['parroquia'], 'string', 'max' => 50],
            [['comunidad'], 'string', 'max' => 75],
            [['cod_parroquia', 'cod_canton', 'cod_provincia'], 'string', 'max' => 4],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
            [['cod_parroquia', 'cod_canton', 'cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquias::className(), 'targetAttribute' => ['cod_parroquia' => 'cod_parroquia', 'cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']],
        ];
    }

    /**
     * {@inheritdoc} Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            //'id_info_comunida' => 'Id Info Comunida',
            'comunidad' => 'Comunidad',
            'habitantes' => 'Habitantes',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
            'id_capitulo' => 'Id Capitulo',
            'cod_parroquia' => 'Cod Parroquia',
            'cod_canton' => 'Cod Canton',
            'cod_provincia' => 'Cod Provincia',
        ];
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
        return $this->hasOne(Parroquias::className(), ['cod_parroquia' => 'cod_parroquia', 'cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']);
    }
}
