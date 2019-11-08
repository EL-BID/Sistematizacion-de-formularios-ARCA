<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCoordenada */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-coordenada-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_coordenada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Coordenada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Coordenada'        
                                         ]) ?>

    <?= $form->field($model, 'x')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique X',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique X'        
                                         ]) ?>

    <?= $form->field($model, 'y')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Y',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Y'        
                                         ]) ?>

    <?= $form->field($model, 'altura')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Altura',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Altura'        
                                         ]) ?>

    <?= $form->field($model, 'longitud')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Longitud',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Longitud'        
                                         ]) ?>

    <?= $form->field($model, 'latitud')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Latitud',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Latitud'        
                                         ]) ?>

    <?= $form->field($model, 'id_tcoordenada')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\TrTipoCoordenada::find()->all(),'id_tcoordenada','id_tcoordenada'),['prompt'=>'Indique el valor para id_tcoordenada']) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?= $form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
