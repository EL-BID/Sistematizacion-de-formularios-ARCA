<?php

namespace common\models\poc;

use Yii;
use common\models\modelpry\ModelPry;

/**
 * Este es el modelo para la clase "tr_comando".
 *
 * @property integer $id_comando
 * @property string $nom_comando
 * @property string $clase_comando
 * @property string $hash_comando
 *
 * @property FdCapitulo[] $fdCapitulos
 * @property FdComandoPregunta[] $fdComandoPreguntas
 * @property FdPregunta[] $idPreguntas
 */
class TrComando extends ModelPry
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_comando';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['id_comando', 'nom_comando', 'clase_comando'], 'required'],
            [['id_comando'], 'integer'],
            [['nom_comando', 'clase_comando'], 'string', 'max' => 500],
            [['hash_comando'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_comando' => 'Id Comando',
            'nom_comando' => 'Nom Comando',
            'clase_comando' => 'Clase Comando',
            'hash_comando' => 'Hash Comando',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdCapitulos()
    {
        return $this->hasMany(FdCapitulo::className(), ['id_comando' => 'id_comando']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getFdComandoPreguntas()
    {
        return $this->hasMany(FdComandoPregunta::className(), ['id_comando' => 'id_comando']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getIdPreguntas()
    {
        return $this->hasMany(FdPregunta::className(), ['id_pregunta' => 'id_pregunta'])->viaTable('fd_comando_pregunta', ['id_comando' => 'id_comando']);
    }
    
    /*Funcion que se usa en el helperHTML
     * para averiguar los comandos asociados a una pregunta
     */
    
    public function help_comandos($id_pregunta){
        
        $_comando = self::find()
                    ->joinWith('idPreguntas')
                    ->where(['fd_comando_pregunta.id_pregunta' => $id_pregunta])
                    ->one();
        
        return $_comando;
        
    }
}
