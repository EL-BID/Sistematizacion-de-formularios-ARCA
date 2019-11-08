<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdClasificacionPregunta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-clasificacion-pregunta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'valor')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Valor',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Valor'        
                                         ]) ?>

    <?= $form->field($model, 'id_clasificacion')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdClasificacionPregunta::find()->all(),'id_clasificacion','id_clasificacion'),['prompt'=>'Indique el valor para id_clasificacion']) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdClasificacionPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
