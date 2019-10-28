<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdResulEvaluaciones */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-resul-evaluaciones-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_evaluacion')->dropDownList(\yii\helpers\ArrayHelper::map(FdParamEvaluaciones::find()->all(),'id_evaluacion','id_evaluacion'),['prompt'=>'Indique el valor para id_evaluacion']) ?>

    <?= $form->field($model, 'puntaje')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntaje',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Puntaje'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
