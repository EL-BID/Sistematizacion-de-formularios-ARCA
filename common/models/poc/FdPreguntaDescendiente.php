<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_pregunta_descendiente".
 *
 * @property integer $id_pregunta_padre
 * @property integer $id_pregunta_descendiente
 * @property integer $id_version_descendiente
 * @property integer $id_version_padre
 *
 * @property FdPregunta $idPreguntaPadre
 * @property FdPregunta $idPreguntaDescendiente
 * @property FdVersion $idVersionDescendiente
 * @property FdVersion $idVersionPadre
 */
class FdPreguntaDescendiente extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_pregunta_descendiente';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_pregunta_padre', 'id_pregunta_descendiente', 'id_version_descendiente', 'id_version_padre'], 'integer'],
            [['id_pregunta_padre'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta_padre' => 'id_pregunta']],
            [['id_pregunta_descendiente'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta_descendiente' => 'id_pregunta']],
            [['id_version_descendiente'], 'exist', 'skipOnError' => true, 'targetClass' => FdVersion::className(), 'targetAttribute' => ['id_version_descendiente' => 'id_version']],
            [['id_version_padre'], 'exist', 'skipOnError' => true, 'targetClass' => FdVersion::className(), 'targetAttribute' => ['id_version_padre' => 'id_version']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_pregunta_padre' => 'Id Pregunta Padre',
            'id_pregunta_descendiente' => 'Id Pregunta Descendiente',
            'id_version_descendiente' => 'Id Version Descendiente',
            'id_version_padre' => 'Id Version Padre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPreguntaPadre()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta_padre']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPreguntaDescendiente()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta_descendiente']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdVersionDescendiente()
    {
        return $this->hasOne(FdVersion::className(), ['id_version' => 'id_version_descendiente']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdVersionPadre()
    {
        return $this->hasOne(FdVersion::className(), ['id_version' => 'id_version_padre']);
    }
}
