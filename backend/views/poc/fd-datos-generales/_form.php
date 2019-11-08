<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGenerales */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-datos-generales-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_datos_generales')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Datos Generales',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Datos Generales'        
                                         ]) ?>

    <?= $form->field($model, 'nombres')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombres',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombres'        
                                         ]) ?>

    <?= $form->field($model, 'num_documento')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Documento',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Documento'        
                                         ]) ?>

    <?= $form->field($model, 'num_convencional')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Convencional',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Convencional'        
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

    <?= $form->field($model, 'direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Direccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Direccion'        
                                         ]) ?>

    <?= $form->field($model, 'descripcion_trabajo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripcion Trabajo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripcion Trabajo'        
                                         ]) ?>

    <?= $form->field($model, 'nombres_apellidos_replegal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombres Apellidos Replegal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombres Apellidos Replegal'        
                                         ]) ?>

    <?= $form->field($model, 'id_tdocumento')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\TrTipoDocumento::find()->all(),'id_tdocumento','id_tdocumento'),['prompt'=>'Indique el valor para id_tdocumento']) ?>

    <?= $form->field($model, 'id_natu_juridica')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\TrTipoNatuJuridica::find()->all(),'id_natu_juridica','id_natu_juridica'),['prompt'=>'Indique el valor para id_natu_juridica']) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
