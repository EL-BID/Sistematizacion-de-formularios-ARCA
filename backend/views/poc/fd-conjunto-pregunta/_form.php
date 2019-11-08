<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoPregunta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-conjunto-pregunta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Conjunto Pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Conjunto Pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdConjuntoPregunta::find()->all(),'id_formato','id_formato'),['prompt'=>'Indique el valor para id_formato']) ?>

    <?= $form->field($model, 'id_version')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdConjuntoPregunta::find()->all(),'id_version','id_version'),['prompt'=>'Indique el valor para id_version']) ?>

    <?= $form->field($model, 'id_tipo_view_formato')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdConjuntoPregunta::find()->all(),'id_tipo_view_formato','id_tipo_view_formato'),['prompt'=>'Indique el valor para id_tipo_view_formato']) ?>

    <?= $form->field($model, 'cod_rol')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdConjuntoPregunta::find()->all(),'cod_rol','cod_rol'),['prompt'=>'Indique el valor para cod_rol']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
