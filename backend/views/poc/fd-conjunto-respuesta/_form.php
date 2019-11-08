<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoRespuesta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-conjunto-respuesta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Conjunto Respuesta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Conjunto Respuesta'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoPregunta::find()->all(),'id_conjunto_pregunta','id_conjunto_pregunta'),['prompt'=>'Indique el valor para id_conjunto_pregunta']) ?>

    <?= $form->field($model, 'id_entidad')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Entidades::find()->all(),'id_entidad','id_entidad'),['prompt'=>'Indique el valor para id_entidad']) ?>

    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdFormato::find()->all(),'id_formato','id_formato'),['prompt'=>'Indique el valor para id_formato']) ?>

    <?= $form->field($model, 'ult_id_adm_estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ult Id Adm Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ult Id Adm Estado'        
                                         ]) ?>

    <?= $form->field($model, 'id_periodo')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\TrPeriodo::find()->all(),'id_periodo','id_periodo'),['prompt'=>'Indique el valor para id_periodo']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
