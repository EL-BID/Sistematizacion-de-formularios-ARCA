<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsProceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-proceso-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_proceso')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Proceso',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Proceso'        
                                         ]) ?>

    <?= $form->field($model, 'nom_proceso')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Proceso',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Proceso'        
                                         ]) ?>

    <?= $form->field($model, 'id_tproceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_tipo_proceso::find()->all(),'id_tproceso','id_tproceso'),['prompt'=>'Indique el valor para id_tproceso']) ?>

    <?= $form->field($model, 'id_modulo')->dropDownList(\yii\helpers\ArrayHelper::map(fd_modulo::find()->all(),'id_modulo','id_modulo'),['prompt'=>'Indique el valor para id_modulo']) ?>

    <?= $form->field($model, 'url_datos_basicos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Url Datos Basicos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Url Datos Basicos'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
