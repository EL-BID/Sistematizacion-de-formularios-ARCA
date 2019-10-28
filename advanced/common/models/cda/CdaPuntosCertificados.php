<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda_puntos_certificados".
 *
 * @property integer $id_puntos_certificados
 * @property integer $puntos_solicitados_tramite
 * @property integer $puntos_visita_tecnica
 * @property integer $puntos_verificados_senagua
 * @property integer $puntos_certificados
 * @property integer $puntos_devueltos
 * @property integer $id_cda_solicitud
 *
 * @property CdaSolicitud $idCdaSolicitud
 */
class CdaPuntosCertificados extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cda_puntos_certificados';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_puntos_certificados', 'puntos_solicitados_tramite', 'puntos_visita_tecnica', 'puntos_verificados_senagua', 'puntos_certificados', 'puntos_devueltos', 'id_cda_tramite','puntos_simplificados'], 'integer','skipOnEmpty'=>true],
            [['id_cda_tramite'], 'exist', 'skipOnError' => true, 'targetClass' => CdaTramite::className(), 'targetAttribute' => ['id_cda_tramite' => 'id_cda_tramite']],
            [['puntos_solicitados_tramite','puntos_simplificados','puntos_devueltos'], 'required', 'on' => 'datossalida'],
        ];
    }

    /**
     * @inheritdoc Atributos para los labels del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_puntos_certificados' => 'Id Puntos Certificados',
            'puntos_solicitados_tramite' => 'Puntos Solicitados Tramite',
            'puntos_visita_tecnica' => 'Puntos Visita Tecnica',
            'puntos_verificados_senagua' => 'Puntos Verificados Senagua',
            'puntos_certificados' => 'Puntos Certificados',
            'puntos_devueltos' => 'Puntos Devueltos',
            'id_cda_tramite' => 'Id Cda Tramite',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdCdaTramite()
    {
        return $this->hasOne(CdaTramite::className(), ['id_cda_tramite' => 'id_cda_tramite']);
    }
}
