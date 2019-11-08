<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdParamEvaluaciones */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-param-evaluaciones-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'componente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Componente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Componente'        
                                         ]) ?>

    <?= $form->field($model, 'criterio')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Criterio',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Criterio'        
                                         ]) ?>

    <?= $form->field($model, 'item')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Item',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Item'        
                                         ]) ?>

    <?= $form->field($model, 'condicionante')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Condicionante',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Condicionante'        
                                         ]) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?= $form->field($model, 'tipo_valoracion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Tipo Valoracion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Tipo Valoracion'        
                                         ]) ?>

    <?= $form->field($model, 'porcentaje_ponderacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Porcentaje Ponderacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Porcentaje Ponderacion'        
                                         ]) ?>

    <?= $form->field($model, 'puntuacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntuacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Puntuacion'        
                                         ]) ?>

    <?= $form->field($model, 'formato')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Formato',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Formato'        
                                         ]) ?>

    <?= $form->field($model, 'detalle')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Detalle',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Detalle'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
