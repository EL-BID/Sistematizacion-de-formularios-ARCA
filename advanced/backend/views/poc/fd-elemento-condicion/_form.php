<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdElementoCondicion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-elemento-condicion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'valor')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Valor',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Valor'        
                                         ]) ?>

    <?= $form->field($model, 'id_condicion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Condicion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Condicion'        
                                         ]) ?>

    <?= $form->field($model, 'id_tcondicion')->dropDownList(\yii\helpers\ArrayHelper::map(fd_tipo_condicion::find()->all(),'id_tcondicion','id_tcondicion'),['prompt'=>'Indique el valor para id_tcondicion']) ?>

    <?= $form->field($model, 'id_pregunta_habilitadora')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Pregunta Habilitadora',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Pregunta Habilitadora'        
                                         ]) ?>

    <?= $form->field($model, 'id_pregunta_condicionada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Pregunta Condicionada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Pregunta Condicionada'        
                                         ]) ?>

    <?= $form->field($model, 'id_capitulo_condicionado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Capitulo Condicionado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Capitulo Condicionado'        
                                         ]) ?>

    <?= $form->field($model, 'id_adm_estado')->dropDownList(\yii\helpers\ArrayHelper::map(fd_adm_estado::find()->all(),'id_adm_estado','id_adm_estado'),['prompt'=>'Indique el valor para id_adm_estado']) ?>

    <?= $form->field($model, 'cod_rol')->dropDownList(\yii\helpers\ArrayHelper::map(rol::find()->all(),'cod_rol','cod_rol'),['prompt'=>'Indique el valor para cod_rol']) ?>

    <?= $form->field($model, 'operacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Operacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Operacion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
