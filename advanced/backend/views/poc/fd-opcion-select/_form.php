<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdOpcionSelect */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-opcion-select-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_opcion_select')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Opcion Select',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Opcion Select'        
                                         ]) ?>

    <?= $form->field($model, 'nom_opcion_select')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Opcion Select',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Opcion Select'        
                                         ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Orden'        
                                         ]) ?>

    <?= $form->field($model, 'id_tselect')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdTipoSelect::find()->all(),'id_tselect','id_tselect'),['prompt'=>'Indique el valor para id_tselect']) ?>

    <?= $form->field($model, 'estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
