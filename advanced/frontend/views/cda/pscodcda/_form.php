<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCodCda */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-cod-cda-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'cod_cda')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Cod Cda',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Código CDA'        
                                         ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
