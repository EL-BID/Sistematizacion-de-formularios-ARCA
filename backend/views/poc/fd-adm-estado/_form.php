<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdAdmEstado */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-adm-estado-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_adm_estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Adm Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Adm Estado'        
                                         ]) ?>

    <?= $form->field($model, 'nom_adm_estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Adm Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Adm Estado'        
                                         ]) ?>

    <?= $form->field($model, 'cod_rol')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdAdmEstado::find()->all(),'cod_rol','cod_rol'),['prompt'=>'Indique el valor para cod_rol']) ?>

    <?= $form->field($model, 'id_modulo')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdAdmEstado::find()->all(),'id_modulo','id_modulo'),['prompt'=>'Indique el valor para id_modulo']) ?>

    <?= $form->field($model, 'p_actualizar')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique P Actualizar',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique P Actualizar'        
                                         ]) ?>

    <?= $form->field($model, 'p_crear')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique P Crear',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique P Crear'        
                                         ]) ?>

    <?= $form->field($model, 'p_borrar')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique P Borrar',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique P Borrar'        
                                         ]) ?>

    <?= $form->field($model, 'p_ejecutar')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique P Ejecutar',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique P Ejecutar'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
