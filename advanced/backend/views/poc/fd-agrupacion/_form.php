<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdAgrupacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-agrupacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_agrupacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Agrupación',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Agrupación'        
                                         ]) ?>

    <?= $form->field($model, 'nom_agrupacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombre Agrupación',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre Agrupación'        
                                         ]) ?>

    <?= $form->field($model, 'id_tagrupacion')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdTipoAgrupacion::find()->all(),'id_tagrupacion','nom_tagrupacion'),['prompt'=>'Seleccione el Tipo de Agrupación']) ?>

    <?= $form->field($model, 'num_col')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Número de Columnas',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Número de Columnas'        
                                         ]) ?>

    <?= $form->field($model, 'num_row')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Número de Filas',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Número de Filas'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
