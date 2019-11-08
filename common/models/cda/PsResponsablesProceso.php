<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_responsables_proceso".
 *
 * @property integer $id_responsable_proceso
 * @property integer $id_usuario
 * @property integer $id_cproceso
 * @property integer $id_tresponsabilidad
 * @property string $fecha
 * @property string $observacion
 *
 * @property PsCproceso $idCproceso
 * @property PsTipoResponsabilidad $idTresponsabilidad
 * @property UsuariosAp $idUsuario
 */
class PsResponsablesProceso extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_responsables_proceso';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_cproceso', 'id_tresponsabilidad'], 'integer'],
            [['fecha'], 'string'],
            [['observacion'], 'string', 'max' => 1000,'skipOnEmpty' => true],
            [['id_cproceso'], 'exist', 'skipOnError' => true, 'targetClass' => PsCproceso::className(), 'targetAttribute' => ['id_cproceso' => 'id_cproceso']],
            [['id_tresponsabilidad'], 'exist', 'skipOnError' => true, 'targetClass' => PsTipoResponsabilidad::className(), 'targetAttribute' => ['id_tresponsabilidad' => 'id_tresponsabilidad']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\UsuariosAp::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_responsable_proceso' => 'Id Responsable Proceso',
            'id_usuario' => 'Usuario',
            'id_cproceso' => 'Id Cproceso',
            'id_tresponsabilidad' => 'Tipo de Responsabilidad',
            'fecha' => 'Fecha',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCproceso()
    {
        return $this->hasOne(PsCproceso::className(), ['id_cproceso' => 'id_cproceso']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTresponsabilidad()
    {
        return $this->hasOne(PsTipoResponsabilidad::className(), ['id_tresponsabilidad' => 'id_tresponsabilidad']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdUsuario()
    {
        return $this->hasOne(\common\models\autenticacion\UsuariosAp::className(), ['id_usuario' => 'id_usuario']);
    }
}
