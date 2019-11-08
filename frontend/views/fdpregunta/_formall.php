<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model frontend\models\fdpregunta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fdpregunta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

   
    <?= $form->field($model, 'nom_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique nom_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique nom_pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'ayuda_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ayuda_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ayuda_pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'obligatorio')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique obligatorio',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique obligatorio'        
                                         ]) ?>

    <?= $form->field($model, 'max_largo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique max_largo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique max_largo'        
                                         ]) ?>

    <?= $form->field($model, 'min_largo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique min_largo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique min_largo'        
                                         ]) ?>

    <?= $form->field($model, 'max_date')->
             widget(DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'min_date')->
             widget(DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique orden'        
                                         ]) ?>

    <?= $form->field($model, 'estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique estado'        
                                         ]) ?>

    <?= $form->field($model, 'ini_fecha')->
             widget(DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'fin_fecha')->
             widget(DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'id_tpregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_tpregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_tpregunta'        
                                         ]) ?>

    <?= $form->field($model, 'id_capitulo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_capitulo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_capitulo'        
                                         ]) ?>

    <?= $form->field($model, 'id_seccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_seccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_seccion'        
                                         ]) ?>

    <?= $form->field($model, 'id_agrupacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_agrupacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_agrupacion'        
                                         ]) ?>

    <?= $form->field($model, 'id_tselect')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_tselect',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_tselect'        
                                         ]) ?>

    <?= $form->field($model, 'caracteristica_preg')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique caracteristica_preg',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique caracteristica_preg'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_conjunto_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_conjunto_pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'visible')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique visible',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique visible'        
                                         ]) ?>

    <?= $form->field($model, 'visible_desc_preg')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique visible_desc_preg',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique visible_desc_preg'        
                                         ]) ?>

    <?= $form->field($model, 'num_col_label')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique num_col_label',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique num_col_label'        
                                         ]) ?>

    <?= $form->field($model, 'num_col_input')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique num_col_input',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique num_col_input'        
                                         ]) ?>

    <?= $form->field($model, 'stylecss')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique stylecss',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique stylecss'        
                                         ]) ?>

    <?= $form->field($model, 'format')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique format',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique format'        
                                         ]) ?>

    <?= $form->field($model, 'min_number')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique min_number',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique min_number'        
                                         ]) ?>

    <?= $form->field($model, 'max_number')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique max_number',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique max_number'        
                                         ]) ?>

    <?= $form->field($model, 'atributos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique atributos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique atributos'        
                                         ]) ?>

    <?= $form->field($model, 'reg_exp')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique reg_exp',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique reg_exp'        
                                         ]) ?>

    <?= $form->field($model, 'numerada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique numerada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique numerada'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
