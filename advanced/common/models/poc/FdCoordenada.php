<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;
use \frontend\helpers\formatnumber;

/**
 * Este es el modelo para la clase "fd_coordenada".
 *
 * @property integer $id_coordenada
 * @property string $x
 * @property string $y
 * @property string $altura
 * @property string $longitud
 * @property string $latitud
 * @property integer $id_tcoordenada
 * @property integer $id_conjunto_respuesta
 * @property integer $id_pregunta
 * @property integer $id_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 * @property TrTipoCoordenada $idTcoordenada
 */
class FdCoordenada extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_coordenada';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_tcoordenada','id_conjunto_respuesta', 'id_pregunta', 'id_respuesta','x', 'y', 'altura', 'longitud', 'latitud'], 'required'],
            [['id_tcoordenada', 'id_conjunto_respuesta', 'id_pregunta', 'id_respuesta'], 'integer'],
            [['longitud', 'latitud'], formatnumber::className(),"params"=>["format"=>"##.#####"]],
            [['x'], formatnumber::className(),"params"=>["format"=>"######.##"]],
            [['y'], formatnumber::className(),"params"=>["format"=>"########.##"]],
            [['altura'], formatnumber::className(),"params"=>["format"=>"####.##"]],
            [['id_conjunto_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdConjuntoRespuesta::className(), 'targetAttribute' => ['id_conjunto_respuesta' => 'id_conjunto_respuesta']],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => FdPregunta::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
            [['id_respuesta'], 'exist', 'skipOnError' => true, 'targetClass' => FdRespuesta::className(), 'targetAttribute' => ['id_respuesta' => 'id_respuesta']],
            [['id_tcoordenada'], 'exist', 'skipOnError' => true, 'targetClass' => TrTipoCoordenada::className(), 'targetAttribute' => ['id_tcoordenada' => 'id_tcoordenada']],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_coordenada' => 'Id Coordenada',
            'x' => 'X',
            'y' => 'Y',
            'altura' => 'Altura',
            'longitud' => 'Longitud',
            'latitud' => 'Latitud',
            'id_tcoordenada' => 'Id Tcoordenada',
            'id_conjunto_respuesta' => 'Id Conjunto Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_respuesta' => 'Id Respuesta',
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
    public function getIdTcoordenada()
    {
        return $this->hasOne(TrTipoCoordenada::className(), ['id_tcoordenada' => 'id_tcoordenada']);
    }
}
