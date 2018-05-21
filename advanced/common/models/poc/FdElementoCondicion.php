<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_elemento_condicion".
 *
 * @property string $valor
 * @property integer $id_condicion
 * @property integer $id_tcondicion
 * @property integer $id_pregunta_habilitadora
 * @property integer $id_pregunta_condicionada
 * @property integer $id_capitulo_condicionado
 * @property integer $id_adm_estado
 * @property string $cod_rol
 * @property string $operacion
 *
 * @property FdAdmEstado $idAdmEstado
 * @property FdCapitulo $idCapituloCondicionado
 * @property FdPregunta $idPreguntaHabilitadora
 * @property FdPregunta $idPreguntaCondicionada
 * @property FdTipoCondicion $idTcondicion
 * @property Rol $codRol
 */
class FdElementoCondicion extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_elemento_condicion';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_condicion'], 'required'],
            [['id_condicion', 'id_tcondicion', 'id_pregunta_habilitadora', 'id_pregunta_condicionada', 'id_capitulo_condicionado', 'id_adm_estado'], 'integer'],
            [['valor'], 'string', 'max' => 50],
            [['cod_rol'], 'string', 'max' => 10],
            [['operacion'], 'string', 'max' => 2],
            [['id_adm_estado'], 'exist', 'skipOnError' => true, 'targetClass' => FdAdmEstado::className(), 'targetAttribute' => ['id_adm_estado' => 'id_adm_estado']],
            [['id_capitulo_condicionado'], 'exist', 'skipOnError' => true, 'targetClass' => FdCapitulo::className(), 'targetAttribute' => ['id_capitulo_condicionado' => 'id_capitulo']],
            [['id_pregunta_habilitadora'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta_habilitadora' => 'id_pregunta']],
            [['id_pregunta_condicionada'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta_condicionada' => 'id_pregunta']],
            [['id_tcondicion'], 'exist', 'skipOnError' => true, 'targetClass' => FdTipoCondicion::className(), 'targetAttribute' => ['id_tcondicion' => 'id_tcondicion']],
            [['cod_rol'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\autenticacion\Rol::className(), 'targetAttribute' => ['cod_rol' => 'cod_rol']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'valor' => 'Valor',
            'id_condicion' => 'Id Condicion',
            'id_tcondicion' => 'Id Tcondicion',
            'id_pregunta_habilitadora' => 'Id Pregunta Habilitadora',
            'id_pregunta_condicionada' => 'Id Pregunta Condicionada',
            'id_capitulo_condicionado' => 'Id Capitulo Condicionado',
            'id_adm_estado' => 'Id Adm Estado',
            'cod_rol' => 'Cod Rol',
            'operacion' => 'Operacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdAdmEstado()
    {
        return $this->hasOne(FdAdmEstado::className(), ['id_adm_estado' => 'id_adm_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCapituloCondicionado()
    {
        return $this->hasOne(FdCapitulo::className(), ['id_capitulo' => 'id_capitulo_condicionado']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPreguntaHabilitadora()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta_habilitadora']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPreguntaCondicionada()
    {
        return $this->hasOne(FdPregunta::className(), ['id_pregunta' => 'id_pregunta_condicionada']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdTcondicion()
    {
        return $this->hasOne(FdTipoCondicion::className(), ['id_tcondicion' => 'id_tcondicion']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRol()
    {
        return $this->hasOne(Rol::className(), ['cod_rol' => 'cod_rol']);
    }
}
