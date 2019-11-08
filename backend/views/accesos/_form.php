<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\Accesos */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this);
$var = [ 0 => 'Loguin ALL', 1 => 'Logout',  2 => 'Loguin Unico Rol'];        
?>

<div class="accesos-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>


    <?= $form->field($model, 'nombre_acceso')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'id_pagina')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\autenticacion\Pagina::find()->all(),'id_pagina','nombre_pagina'),['prompt'=>'Indique el valor para id_pagina']) ?>

    <?= $form->field($model, 'id_tipo_acceso')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\autenticacion\TipoAcceso::find()->all(),'id_tipo_acceso','nombre_acceso'),['prompt'=>'Indique el valor para id_pagina']) ?>
    
    <?= $form->field($model, 'tipo_usuario')->dropDownList($var, ['prompt' => 'Seleccione Uno' ]); ?>

    <?= $form->field($model, 'cod_rol')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Rol::find()->all(),'cod_rol','nombre_rol'),['prompt'=>'Indique el valor para id_pagina']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
