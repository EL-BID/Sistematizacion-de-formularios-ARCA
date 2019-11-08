<?php

namespace common\models\poc;


use Yii;
use common\models\modelpry\ModelPry;
use common\models\Juntasgad;

/**
 * Este es el modelo para la clase "fd_conduccion_impulsion_apscom".
 *
 * @property integer $id_cond_impulsion_apscom
 * @property string $nombre_lug_conduccion
 * @property integer $id_material_tuberia
 * @property integer $id_estado_tuberia
 * @property integer $id_frec_mantenimiento_condimp
 * @property integer $id_estado_bomba
 * @property string $problemas_identificados
 * @property string $especifique_otro_tuberia
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
class FdConduccionImpulsionApscom extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_conduccion_impulsion_apscom';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_material_tuberia', 'id_estado_tuberia', 'id_frec_mantenimiento_condimp', 'id_estado_bomba', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta', 'id_capitulo', 'id_junta'], 'integer'],
            [['nombre_lug_conduccion'], 'string', 'max' => 1000],
            [['problemas_identificados'], 'string', 'max' => 500],
            [['especifique_otro_tuberia'], 'string', 'max' => 200],
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
            'id_cond_impulsion_apscom' => 'Id Cond Impulsion Apscom',
            'nombre_lug_conduccion' => 'Nombre Lug Conduccion',
            'id_material_tuberia' => 'Id Material Tuberia',
            'id_estado_tuberia' => 'Id Estado Tuberia',
            'id_frec_mantenimiento_condimp' => 'Id Frec Mantenimiento Condimp',
            'id_estado_bomba' => 'Id Estado Bomba',
            'problemas_identificados' => 'Problemas Identificados',
            'especifique_otro_tuberia' => 'Especifique Otro Tuberia',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
            'id_capitulo' => 'Id Capitulo',
            'id_junta' => 'Id Junta',
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
    public function getIdJunta()
    {
        return $this->hasOne(JuntasGad::className(), ['id_junta' => 'id_junta']);
    }
}
