<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdComandoPregunta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-comando-pregunta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado'        
                                         ]) ?>

    <?= $form->field($model, 'id_comando')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdComandoPregunta::find()->all(),'id_comando','id_comando'),['prompt'=>'Indique el valor para id_comando']) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdComandoPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
