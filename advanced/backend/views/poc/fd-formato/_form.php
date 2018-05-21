<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdFormato */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-formato-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_formato')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Formato',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Formato'        
                                         ]) ?>

    <?= $form->field($model, 'nom_formato')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Formato',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Formato'        
                                         ]) ?>

    <?= $form->field($model, 'num_formato')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Formato',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Formato'        
                                         ]) ?>

    <?= $form->field($model, 'id_tipo_view_formato')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdFormato::find()->all(),'id_tipo_view_formato','id_tipo_view_formato'),['prompt'=>'Indique el valor para id_tipo_view_formato']) ?>

    <?= $form->field($model, 'id_modulo')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdFormato::find()->all(),'id_modulo','id_modulo'),['prompt'=>'Indique el valor para id_modulo']) ?>

    <?= $form->field($model, 'ult_id_version')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ult Id Version',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ult Id Version'        
                                         ]) ?>

    <?= $form->field($model, 'cod_rol')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdFormato::find()->all(),'cod_rol','cod_rol'),['prompt'=>'Indique el valor para cod_rol']) ?>

    <?= $form->field($model, 'numeracion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numeracion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numeracion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
