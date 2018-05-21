<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrPeriodo */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="tr-periodo-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_periodo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Periodo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Periodo'        
                                         ]) ?>

    <?= $form->field($model, 'nom_periodo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Periodo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Periodo'        
                                         ]) ?>

    <?= $form->field($model, 'identificador')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Identificador',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Identificador'        
                                         ]) ?>

    <?= $form->field($model, 'vigencia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Vigencia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Vigencia'        
                                         ]) ?>

    <?= $form->field($model, 'id_tperiodo')->dropDownList(\yii\helpers\ArrayHelper::map(tr_tipo_periodo::find()->all(),'id_tperiodo','id_tperiodo'),['prompt'=>'Indique el valor para id_tperiodo']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
