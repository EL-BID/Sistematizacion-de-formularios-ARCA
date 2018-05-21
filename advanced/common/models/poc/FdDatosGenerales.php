<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "fd_datos_generales".
 *
 * @property integer $id_datos_generales
 * @property string $nombres
 * @property integer $num_documento
 * @property integer $num_convencional
 * @property string $correo_electronico
 * @property integer $num_celular
 * @property string $direccion
 * @property string $descripcion_trabajo
 * @property string $nombres_apellidos_replegal
 * @property integer $id_tdocumento
 * @property integer $id_natu_juridica
 * @property integer $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property TrTipoDocumento $idTdocumento
 * @property TrTipoNatuJuridica $idNatuJuridica
 */
class FdDatosGenerales extends ModelPry
{
    
    public $captcha;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_datos_generales';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['num_documento', 'num_convencional', 'num_celular', 'id_tdocumento', 'id_natu_juridica', 'id_conjunto_respuesta'], 'integer','message'=>'El valor debe ser un entero'],
            [['nombres', 'direccion', 'descripcion_trabajo', 'nombres_apellidos_replegal','nom_sistema'], 'string', 'max' => 1000],
            [['correo_electronico'], 'email','message'=>'Inserte un correo valido'],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_tdocumento'], 'exist', 'skipOnError' => true, 'targetClass' => TrTipoDocumento::className(), 'targetAttribute' => ['id_tdocumento' => 'id_tdocumento']],
            [['id_natu_juridica'], 'exist', 'skipOnError' => true, 'targetClass' => TrTipoNatuJuridica::className(), 'targetAttribute' => ['id_natu_juridica' => 'id_natu_juridica']],
            [['nombres', 'num_documento','correo_electronico','captcha'], 'required', 'on' => 'consultaciudadana'],
            [['nombres', 'num_documento','correo_electronico'], 'required', 'on' => 'consultaciudadana_nocaptcha'],
            ['captcha', 'captcha','on' => 'consultaciudadana'],
        ];
    }
    
    /*Aplicando scenarios*/
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['consultaciudadana'] = ['nombres','num_documento','correo_electronico','captcha'];//Scenario Values Only Accepted
        $scenarios['consultaciudadana_nocaptcha'] = ['nombres','num_documento','correo_electronico'];//Scenario Values Only Accepted
        
        return $scenarios;
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'nombres' => 'Nombres',
            'num_documento' => 'Num Documento',
            'num_convencional' => 'Num Convencional',
            'correo_electronico' => 'Correo Electronico',
            'num_celular' => 'Num Celular',
            'direccion' => 'Direccion',
            'descripcion_trabajo' => 'Descripcion Trabajo',
            'nombres_apellidos_replegal' => 'Nombres Apellidos Replegal',
            'id_tdocumento' => 'Id Tdocumento',
            'id_natu_juridica' => 'Id Natu Juridica',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
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
    public function getIdTdocumento()
    {
        return $this->hasOne(TrTipoDocumento::className(), ['id_tdocumento' => 'id_tdocumento']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdNatuJuridica()
    {
        return $this->hasOne(TrTipoNatuJuridica::className(), ['id_natu_juridica' => 'id_natu_juridica']);
    }
}
