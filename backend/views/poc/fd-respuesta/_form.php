<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuesta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-respuesta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_respuesta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Respuesta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Respuesta'        
                                         ]) ?>

    <?= $form->field($model, 'ra_fecha')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'ra_check')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ra Check',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ra Check'        
                                         ]) ?>

    <?= $form->field($model, 'ra_descripcion')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'ra_entero')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ra Entero',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ra Entero'        
                                         ]) ?>

    <?= $form->field($model, 'ra_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ra Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ra Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'ra_porcentaje')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ra Porcentaje',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ra Porcentaje'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <?= $form->field($model, 'ra_moneda')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ra Moneda',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ra Moneda'        
                                         ]) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?= $form->field($model, 'id_opcion_select')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdOpcionSelect::find()->all(),'id_opcion_select','id_opcion_select'),['prompt'=>'Indique el valor para id_opcion_select']) ?>

    <?= $form->field($model, 'id_tpregunta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdTipoPregunta::find()->all(),'id_tpregunta','id_tpregunta'),['prompt'=>'Indique el valor para id_tpregunta']) ?>

    <?= $form->field($model, 'id_capitulo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdCapitulo::find()->all(),'id_capitulo','id_capitulo'),['prompt'=>'Indique el valor para id_capitulo']) ?>

    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdFormato::find()->all(),'id_formato','id_formato'),['prompt'=>'Indique el valor para id_formato']) ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoPregunta::find()->all(),'id_conjunto_pregunta','id_conjunto_pregunta'),['prompt'=>'Indique el valor para id_conjunto_pregunta']) ?>

    <?= $form->field($model, 'id_version')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdVersion::find()->all(),'id_version','id_version'),['prompt'=>'Indique el valor para id_version']) ?>

    <?= $form->field($model, 'cantidad_registros')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Cantidad Registros',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Cantidad Registros'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
