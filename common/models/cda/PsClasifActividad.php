<?php

namespace common\models\cda;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "ps_clasif_actividad".
 *
 * @property integer $id_clasif_actividad
 * @property string $nom_clasif_tactividad
 * @property string $vis_c_obs
 * @property string $nom_c_obs
 * @property string $obl_c_obs
 * @property string $hab_c_obs
 * @property string $vis_c_fec_rea
 * @property string $nom_c_fec_rea
 * @property string $obl_c_fec_rea
 * @property string $hab_c_fec_rea
 * @property string $vis_c_fec_pre
 * @property string $nom_c_fec_pre
 * @property string $obl_c_fec_pre
 * @property string $hab_c_fec_pre
 * @property string $vis_c_num_qpx
 * @property string $nom_c_num_qpx
 * @property string $obl_c_num_qpx
 * @property string $hab_c_num_qpx
 * @property string $vis_c_usua
 * @property string $nom_c_usua
 * @property string $obl_c_usua
 * @property string $hab_c_usua
 * @property string $vis_c_dia_pau
 * @property string $nom_c_dia_pau
 * @property string $obl_c_dia_pau
 * @property string $hab_c_dia_pau
 * @property string $vis_c_caus
 * @property string $nom_c_caus
 * @property string $obl_c_caus
 * @property string $hab_c_caus
 * @property string $vis_c_fec_qpx
 * @property string $nom_c_fec_qpx
 * @property string $obl_c_fec_qpx
 * @property string $hab_c_fec_qpx
 *
 * @property PsActividad[] $psActividads
 */
class PsClasifActividad extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_clasif_actividad';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_clasif_actividad', 'nom_clasif_tactividad'], 'required'],
            [['id_clasif_actividad'], 'integer'],
            [['nom_clasif_tactividad', 'nom_c_obs', 'nom_c_fec_rea', 'nom_c_fec_pre', 'nom_c_num_qpx', 'nom_c_usua', 'nom_c_dia_pau', 'nom_c_caus', 'nom_c_fec_qpx','nom_c_puntos'], 'string', 'max' => 50],
            [['vis_c_obs', 'obl_c_obs', 'hab_c_obs', 'vis_c_fec_rea', 'obl_c_fec_rea', 'hab_c_fec_rea', 'vis_c_fec_pre', 'obl_c_fec_pre', 'hab_c_fec_pre', 'vis_c_num_qpx', 'obl_c_num_qpx', 'hab_c_num_qpx', 'vis_c_usua', 'obl_c_usua', 'hab_c_usua', 'vis_c_dia_pau', 'obl_c_dia_pau', 'hab_c_dia_pau', 'vis_c_caus', 'obl_c_caus', 'hab_c_caus', 'vis_c_fec_qpx', 'obl_c_fec_qpx', 'hab_c_fec_qpx','vis_c_puntos','obl_c_puntos','hab_c_puntos'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_clasif_actividad' => 'Id Clasif Actividad',
            'nom_clasif_tactividad' => 'Nom Clasif Tactividad',
            'vis_c_obs' => 'Vis C Obs',
            'nom_c_obs' => 'Nom C Obs',
            'obl_c_obs' => 'Obl C Obs',
            'hab_c_obs' => 'Hab C Obs',
            'vis_c_fec_rea' => 'Vis C Fec Rea',
            'nom_c_fec_rea' => 'Nom C Fec Rea',
            'obl_c_fec_rea' => 'Obl C Fec Rea',
            'hab_c_fec_rea' => 'Hab C Fec Rea',
            'vis_c_fec_pre' => 'Vis C Fec Pre',
            'nom_c_fec_pre' => 'Nom C Fec Pre',
            'obl_c_fec_pre' => 'Obl C Fec Pre',
            'hab_c_fec_pre' => 'Hab C Fec Pre',
            'vis_c_num_qpx' => 'Vis C Num Qpx',
            'nom_c_num_qpx' => 'Nom C Num Qpx',
            'obl_c_num_qpx' => 'Obl C Num Qpx',
            'hab_c_num_qpx' => 'Hab C Num Qpx',
            'vis_c_usua' => 'Vis C Usua',
            'nom_c_usua' => 'Nom C Usua',
            'obl_c_usua' => 'Obl C Usua',
            'hab_c_usua' => 'Hab C Usua',
            'vis_c_dia_pau' => 'Vis C Dia Pau',
            'nom_c_dia_pau' => 'Nom C Dia Pau',
            'obl_c_dia_pau' => 'Obl C Dia Pau',
            'hab_c_dia_pau' => 'Hab C Dia Pau',
            'vis_c_caus' => 'Vis C Caus',
            'nom_c_caus' => 'Nom C Caus',
            'obl_c_caus' => 'Obl C Caus',
            'hab_c_caus' => 'Hab C Caus',
            'vis_c_fec_qpx' => 'Vis C Fec Qpx',
            'nom_c_fec_qpx' => 'Nom C Fec Qpx',
            'obl_c_fec_qpx' => 'Obl C Fec Qpx',
            'hab_c_fec_qpx' => 'Hab C Fec Qpx',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPsActividads()
    {
        return $this->hasMany(PsActividad::className(), ['id_clasif_actividad' => 'id_clasif_actividad']);
    }
}
