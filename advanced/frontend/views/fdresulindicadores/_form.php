<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdResulIndicadores */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-resul-indicadores-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_indicador')->dropDownList(\yii\helpers\ArrayHelper::map(FdParamIndicadores::find()->all(),'id_indicador','id_indicador'),['prompt'=>'Indique el valor para id_indicador']) ?>

    <?= $form->field($model, 'resultado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Resultado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Resultado'        
                                         ]) ?>

    <?= $form->field($model, 'recomendacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Recomendacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Recomendacion'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
