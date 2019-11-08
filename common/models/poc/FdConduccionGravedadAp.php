<?php

namespace common\models\poc;


use Yii;
use common\models\modelpry\ModelPry;
use common\models\Juntasgad;
use common\models\autenticacion\Parroquias;

/**
 * Este es el modelo para la clase "fd_conduccion_gravedad_ap".
 *
 * @property integer $id_conduccion_gravedad_ap
 * @property string $nombre_conduccion_g
 * @property integer $id_forma_conduccion_g
 * @property integer $id_material_conduccion_g
 * @property integer $id_frec_mantenimiento_g
 * @property integer $id_estado_conduccion_g
 * @property string $problemas_identificados
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 * @property integer $id_capitulo
 * @property integer $id_junta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 * @property JuntasGad $idJunta
 */
class FdConduccionGravedadAp extends ModelPry
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fd_conduccion_gravedad_ap';
    }

    /**
     * {@inheritdoc} Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_forma_conduccion_g', 'id_material_conduccion_g', 'id_frec_mantenimiento_g', 'id_estado_conduccion_g', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            //[['parroquia'], 'string', 'max' => 50],
            [['nombre_conduccion_g'], 'string', 'max' => 1000],
            [['nombre_conduccion_g'],'required'],
            [['problemas_identificados'], 'string', 'max' => 500],
            //[['cod_parroquia', 'cod_canton', 'cod_provincia'], 'string', 'max' => 4],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
            [['id_junta'], 'exist', 'skipOnError' => true, 'targetClass' => JuntasGad::className(), 'targetAttribute' => ['id_junta' => 'id_junta']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_conduccion_gravedad_ap' => 'Id Conduccion Gravedad Ap',
            'nombre_conduccion_g' => 'Nombre Conduccion G',
            'id_forma_conduccion_g' => 'Id Forma Conduccion G',
            'id_material_conduccion_g' => 'Id Material Conduccion G',
            'id_frec_mantenimiento_g' => 'Id Frec Mantenimiento G',
            'id_estado_conduccion_g' => 'Id Estado Conduccion G',
            'problemas_identificados' => 'Problemas Identificados',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
            'id_capitulo' => 'Id Capitulo',
            'id_junta' => 'Id Junta',
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

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdJunta()
    {
        return $this->hasOne(FdRespuesta::className(), ['id_junta' => 'id_junta']);
    }
}
