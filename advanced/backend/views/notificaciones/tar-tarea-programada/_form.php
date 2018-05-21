<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\TarTareaProgramada */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="tar-tarea-programada-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>


    
    <?= $form->field($model, 'id_ttarea')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\TarTipoTarea::find()->all(),'id_ttarea','nom_ttarea'),['prompt'=>'Indique el valor para el tipo de tarea']) ?>

    
    <?= $form->field($model, 'nom_tarea_programada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Tarea Programada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Tarea Programada'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_inicio')->
             widget(\yii\jui\DatePicker::className(),[
                 'options'=>[
                    'class' => 'form-control',
                     ],
                'dateFormat' => 'yyyy/MM/dd',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'fecha_termina')->
             widget(\yii\jui\DatePicker::className(),[
                 'options'=>[
                    'class' => 'form-control',
                     ],
                'dateFormat' => 'yyyy/MM/dd',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'fecha_proxima_eje')->
             widget(\yii\jui\DatePicker::className(),[
                'options'=>[
                    'class' => 'form-control',
                     ],
                'dateFormat' => 'yyyy/MM/dd',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'intervalo_ejecucion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Intervalo Ejecucion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Intervalo Ejecucion'        
                                         ]) ?>

    <?= $form->field($model, 'numero_ejecucion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero Ejecucion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero Ejecucion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
