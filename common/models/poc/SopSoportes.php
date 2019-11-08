<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "sop_soportes".
 *
 * @property integer $id_soportes
 * @property string $ruta_soporte
 * @property string $titulo_soporte
 * @property string $palabras_clave
 * @property string $descripcion
 * @property string $fuente_soporte
 * @property string $autor_soporte
 * @property string $idioma_soporte
 * @property string $formato_soportes
 * @property string $tamanio_soportes
 * @property integer $id_respuesta
 *
 * @property FdRespuesta $idRespuesta
 */
class SopSoportes extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sop_soportes';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_soportes'], 'required'],
            [['id_soportes', 'id_respuesta'], 'integer'],
            [['descripcion'], 'string'],
            [['tamanio_soportes'], 'number'],
            [['ruta_soporte', 'titulo_soporte', 'fuente_soporte', 'autor_soporte'], 'string', 'max' => 500],
            [['palabras_clave'], 'string', 'max' => 2000],
            [['idioma_soporte', 'formato_soportes'], 'string', 'max' => 50],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_soportes' => 'Id Soportes',
            'ruta_soporte' => 'Ruta Soporte',
            'titulo_soporte' => 'Titulo Soporte',
            'palabras_clave' => 'Palabras Clave',
            'descripcion' => 'Descripcion',
            'fuente_soporte' => 'Fuente Soporte',
            'autor_soporte' => 'Autor Soporte',
            'idioma_soporte' => 'Idioma Soporte',
            'formato_soportes' => 'Formato Soportes',
            'tamanio_soportes' => 'Tamanio Soportes',
            'id_respuesta' => 'Id Respuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdRespuesta()
    {
        return $this->hasOne(FdRespuesta::className(), ['id_respuesta' => 'id_respuesta']);
    }
}
