<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\autenticacion\Menus */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="menus-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'nom_menu')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Menu',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Menu'        
                                         ]) ?>

    <?= $form->field($model, 'nivel')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nivel',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nivel'        
                                         ]) ?>

    <?= $form->field($model, 'id_pagina')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\autenticacion\Pagina::find()->all(),'id_pagina','nombre_pagina'),['prompt'=>'Indique el valor para id_pagina']) ?>

    <?= $form->field($model, 'parametros')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Parametros',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Parametros'        
                                         ]) ?>

    <?= $form->field($model, 'id_menu_padre')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Menus::find()->where(['nivel'=>'0'])->all(),'id_menu','nom_menu'),['prompt'=>'Indique el menu padre']) ?>

                        
    <?= $form->field($model, 'tipo_menu')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Tipo Menu',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Tipo Menu'        
                                         ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Orden'        
                                         ]) ?>

    <?= $form->field($model, 'estilos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estilos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estilos'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
