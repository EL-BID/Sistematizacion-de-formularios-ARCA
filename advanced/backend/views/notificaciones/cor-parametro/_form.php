<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorParametro */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cor-parametro-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>


    <?= $form->field($model, 'nom_parametro')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombre Parametro',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre Parametro'        
                                         ]) ?>

    <?= $form->field($model, 'val_defecto')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Valor Por Defecto',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Valor Por Defecto'        
                                         ]) ?>
    
        <?= $form->field($model, 'consulta_sql')->textInput([
            'style'=>'height:100px',
                                        'title' => 'Indique la Consulta SQL',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique la Consulta SQL'        
                                         ]) ?>
    
    

    <?= $form->field($model, 'id_correo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorCorreo::find()->all(),'id_correo','nom_correo'),['prompt'=>'Indique el valor para Correo']) ?>

    <?= $form->field($model, 'id_tparametro')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorTipoParametro::find()->all(),'id_tparametro','nom_tparametro'),['prompt'=>'Indique el valor para Tipo de Parametro']) ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
