<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorCorreo */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cor-correo-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>


    <?= $form->field($model, 'nom_correo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombre del Correo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre del Correo'        
                                         ]) ?>

    <?= $form->field($model, 'asunto')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Asunto',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Asunto'        
                                         ]) ?>

    <?= $form->field($model, 'cuerpo')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'id_tarea_programada')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\TarTareaProgramada::find()->all(),'id_tarea_programada','nom_tarea_programada'),['prompt'=>'Indique la tarea programada']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
