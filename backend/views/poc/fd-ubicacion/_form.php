<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-ubicacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_ubicacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Ubicacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Ubicacion'        
                                         ]) ?>

    <?= $form->field($model, 'cod_parroquia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Parroquias::find()->all(),'cod_parroquia','cod_parroquia'),['prompt'=>'Indique el valor para cod_parroquia']) ?>

    <?= $form->field($model, 'cod_canton')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Parroquias::find()->all(),'cod_canton','cod_canton'),['prompt'=>'Indique el valor para cod_canton']) ?>

    <?= $form->field($model, 'cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Parroquias::find()->all(),'cod_provincia','cod_provincia'),['prompt'=>'Indique el valor para cod_provincia']) ?>

    <?= $form->field($model, 'id_demarcacion')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\autenticacion\Demarcaciones::find()->all(),'id_demarcacion','id_demarcacion'),['prompt'=>'Indique el valor para id_demarcacion']) ?>

    <?= $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\CentroAtencionCiudadano::find()->all(),'cod_centro_atencion_ciudadano','cod_centro_atencion_ciudadano'),['prompt'=>'Indique el valor para cod_centro_atencion_ciudadano']) ?>

    <?= $form->field($model, 'descripcion_ubicacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripcion Ubicacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripcion Ubicacion'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?= $form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
