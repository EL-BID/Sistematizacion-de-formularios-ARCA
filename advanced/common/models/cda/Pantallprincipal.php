<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "cda".
 *
 * @property string $fecha_ingreso
 * @property string $fecha_solicitud
 * @property string $tramite_administrativo
 * @property integer $id_cproceso_arca
 * @property integer $id_cproceso_senagua
 * @property string $rol_en_calidad
 * @property integer $id_cda
 * @property integer $id_usuario_enviado_por
 *
 * @property PsCproceso $idCprocesoArca
 * @property PsCproceso $idCprocesoSenagua
 * @property Rol $rolEnCalidad
 * @property UsuariosAp $idUsuarioEnviadoPor
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 * @property CdaErrores[] $cdaErrores
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class Pantallprincipal extends ModelPry
{
   
    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['numero','nom_actividad','nombres','nom_eproceso'], 'string'],
            [['ult_fecha_actividad', 'ult_fecha_estado'], 'date'],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'numero' => 'Número',
            'nom_actividad' => 'Actividad',
            'nombres' => 'Nombres',
            'ult_fecha_estado' => 'ult_fecha_estado',
            'ult_fecha_actividad' => 'ult_fecha_actividad',
        ];
    }

   
}
