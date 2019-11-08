<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCactividadProceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-cactividad-proceso-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

  
    <?= Html::dropDownList('id_usuario', null,
      ArrayHelper::map($listusuarios, 'id_usuario', 'nombres'))?>

    <div class="form-group">
        <?= Html::submitButton('Asignar Responsable', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
