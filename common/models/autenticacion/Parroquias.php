<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "parroquias".
 *
 * @property string $cod_parroquia
 * @property string $nombre_parroquia
 * @property string $cod_canton
 * @property string $cod_provincia
 *
 * @property Entidades[] $entidades
 * @property Cantones $codCanton
 */
class Parroquias extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parroquias';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['cod_parroquia', 'cod_canton', 'cod_provincia'], 'required'],
            [['cod_parroquia', 'cod_canton', 'cod_provincia'], 'string', 'max' => 4],
            [['nombre_parroquia'], 'string', 'max' => 100],
            [['cod_canton', 'cod_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Cantones::className(), 'targetAttribute' => ['cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'cod_parroquia' => 'Cod Parroquia',
            'nombre_parroquia' => 'Nombre Parroquia',
            'cod_canton' => 'Cod Canton',
            'cod_provincia' => 'Cod Provincia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getEntidades()
    {
        return $this->hasMany(Entidades::className(), ['cod_canton_p' => 'cod_canton', 'cod_provincia_p' => 'cod_provincia', 'cod_parroquia' => 'cod_parroquia']);
    }

     /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdUbicacions()
    {
        return $this->hasMany(FdUbicacion::className(), ['cod_parroquia' => 'cod_parroquia', 'cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodCanton()
    {
        return $this->hasOne(Cantones::className(), ['cod_canton' => 'cod_canton', 'cod_provincia' => 'cod_provincia']);
    }

    
    public function getParroquiasD($provincia,$canton)
    {
        $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
        $v_parroquias = self::find()
                    ->innerJoin('entidades', 'entidades.cod_parroquia=parroquias.cod_parroquia')
                    ->innerJoin('regionentidades', 'regionentidades.id_entidad=entidades.id_entidad')
                    ->innerJoin('region', 'region.cod_region=regionentidades.cod_region')
                    ->innerJoin('perfil_region', 'perfil_region.cod_region=region.cod_region')
                    ->innerJoin('usuarios_ap', 'usuarios_ap.id_usuario=perfil_region.id_usuario')
                    ->where(['=', 'parroquias.cod_canton', $canton])
                    ->andwhere(['=', 'parroquias.cod_provincia', $provincia])
                    ->andwhere(['=', 'usuarios_ap.usuario', $user_login])
                    ->all();
        
        return $v_parroquias;
    }
    
}
