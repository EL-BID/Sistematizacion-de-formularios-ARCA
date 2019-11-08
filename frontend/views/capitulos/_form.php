<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use yii\helpers\ArrayHelper;
use frontend\models\FdTipoViewCap;
use frontend\models\FdTipoCapitulo;
use frontend\models\TrComando;
/* @var $this yii\web\View */
/* @var $model frontend\models\Capitulos */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
      
?>

<div class="capitulos-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

  
    <?= $form->field($model, 'nom_capitulo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique nom_capitulo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique nom_capitulo'        
                                         ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique orden'        
                                         ]) ?>

    <?= $form->field($model, 'url')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique url',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique url'        
                                         ]) ?>

    <?= $form->field($model, 'consulta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique consulta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique consulta'        
                                         ]) ?>
    
    <?= $form->field($model, 'id_tview_cap')->dropDownList(
           ArrayHelper::map(FdTipoViewCap::find()->all(),'id_tview_cap','nom_tview_cap'),
            ['prompt'=>'Seleccione una Tipo de Vista']
            ) 
    ?>

    <?= $form->field($model, 'id_tcapitulo')->dropDownList(
           ArrayHelper::map(FdTipoCapitulo::find()->all(),'id_tcapitulo','nom_tcapitulo'),
            ['prompt'=>'Seleccione una Tipo de Capitulo']
            ) 
    ?>
  
   
    <?= $form->field($model2, 'imageFile')->fileInput(['title' => 'Indique icono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique icono']) ?>
    <?= (!empty($model2->imageFile))? $model2->imageFile:''; ?>
   
    
    <?= $form->field($model, 'id_conjunto_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_conjunto_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_conjunto_pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'id_comando')->dropDownList(
           ArrayHelper::map(TrComando::find()->all(),'id_comando','nom_comando'),
            ['prompt'=>'Seleccione un Comando']
            ) 
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
