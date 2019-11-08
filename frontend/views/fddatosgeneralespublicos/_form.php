<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesPublicos */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-datos-generales-publicos-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'pagina_web_prestador')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Pagina Web Prestador',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Pagina Web Prestador'        
                                         ]) ?>

    <?= $form->field($model, 'correo_electronico_prestador')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Correo Electronico Prestador',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Correo Electronico Prestador'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_llenado_fichas')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'nombres_responsable_informacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombres Responsable Informacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombres Responsable Informacion'        
                                         ]) ?>

    <?= $form->field($model, 'cargo_desempenia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Cargo Desempenia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Cargo Desempenia'        
                                         ]) ?>

    <?= $form->field($model, 'correo_electronico')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Correo Electronico',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Correo Electronico'        
                                         ]) ?>

    <?= $form->field($model, 'num_celular')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Celular',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Celular'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
