<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsResponsablesProceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-responsables-proceso-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_usuario')->dropDownList(\yii\helpers\ArrayHelper::map(UsuariosAp::find()->all(),'id_usuario','id_usuario'),['prompt'=>'Indique el valor para id_usuario']) ?>

    <?= $form->field($model, 'id_cproceso')->dropDownList(\yii\helpers\ArrayHelper::map(PsCproceso::find()->all(),'id_cproceso','id_cproceso'),['prompt'=>'Indique el valor para id_cproceso']) ?>

    <?= $form->field($model, 'id_tresponsabilidad')->dropDownList(\yii\helpers\ArrayHelper::map(PsTipoResponsabilidad::find()->all(),'id_tresponsabilidad','id_tresponsabilidad'),['prompt'=>'Indique el valor para id_tresponsabilidad']) ?>

    <?= $form->field($model, 'fecha')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'observacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observacion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
