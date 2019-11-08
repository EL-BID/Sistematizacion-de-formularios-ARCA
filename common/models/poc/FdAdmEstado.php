<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_adm_estado".
 *
 * @property integer $id_adm_estado
 * @property string $nom_adm_estado
 * @property string $cod_rol
 * @property integer $id_modulo
 * @property string $p_actualizar
 * @property string $p_crear
 * @property string $p_borrar
 * @property string $p_ejecutar
 *
 * @property FdModulo $idModulo
 * @property Rol $codRol
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdElementoCondicion[] $fdElementoCondicions
 * @property FdHistoricoRespuesta[] $fdHistoricoRespuestas
 */
class FdAdmEstado extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_adm_estado';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['nom_adm_estado'], 'required'],
            [['id_adm_estado', 'id_modulo'], 'integer'],
            [['nom_adm_estado'], 'string', 'max' => 50],
            [['cod_rol'], 'string', 'max' => 10],
            [['p_actualizar', 'p_crear', 'p_borrar', 'p_ejecutar'], 'string', 'max' => 1],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => FdModulo::className(), 'targetAttribute' => ['id_modulo' => 'id_modulo']],
            [['cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Rol::className(), 'targetAttribute' => ['cod_rol' => 'cod_rol']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_adm_estado' => 'Id Adm Estado',
            'nom_adm_estado' => 'Nom Adm Estado',
            'cod_rol' => 'Cod Rol',
            'id_modulo' => 'Id Modulo',
            'p_actualizar' => 'P Actualizar',
            'p_crear' => 'P Crear',
            'p_borrar' => 'P Borrar',
            'p_ejecutar' => 'P Ejecutar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdModulo()
    {
        return $this->hasOne(FdModulo::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRol()
    {
        return $this->hasOne(Rol::className(), ['cod_rol' => 'cod_rol']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdConjuntoRespuestas()
    {
        return $this->hasMany(FdConjuntoRespuesta::className(), ['ult_id_adm_estado' => 'id_adm_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdElementoCondicions()
    {
        return $this->hasMany(FdElementoCondicion::className(), ['id_adm_estado' => 'id_adm_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdHistoricoRespuestas()
    {
        return $this->hasMany(FdHistoricoRespuesta::className(), ['id_adm_estado' => 'id_adm_estado']);
    }
}
