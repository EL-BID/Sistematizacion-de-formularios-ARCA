<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPeriodoFormato */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-periodo-formato-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'fecha_creacion')->
             widget(\yii\jui\DatePicker\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPeriodoFormato::find()->all(),'id_formato','id_formato'),['prompt'=>'Indique el valor para id_formato']) ?>

    <?= $form->field($model, 'id_periodo')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPeriodoFormato::find()->all(),'id_periodo','id_periodo'),['prompt'=>'Indique el valor para id_periodo']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
