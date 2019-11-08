<style>
    
    .tbcapitulo{
        margin: 0 auto;
        width: 90%;
        border: 1px solid #000;
    }
    
    .nomcapitulo{
        font-size: 1.3em;
        color:#8CD4F5;
        font-weight: bolder;
        border: solid 2px #000;
    }
    
    .tbseccion{
       width: 100%; 
    }
    .titleseccion{
       font-size: 1.2em;
       font-weight: bolder;
       background-color: #C7CCD1;
       border-bottom: solid 1px #ccc;
    }
    
    .labelpregunta{
        border: dotted 1px #000;
        border-bottom: solid 1px #ccc;
        padding: 2px 2px;
        font-size:0.9em;
        width: 25%;
        color:#0044cc;
        
    }
    
     .inputpregunta{
        border-right: solid 1px #000;
        border-bottom: solid 1px #ccc;
        padding: 2px 2px;
    }
</style>  
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCoordenada */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-coordenada-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
    <div class="form-group"  style="text-align:right">
        <?= ($botton === FALSE )? Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):'' ?>
    </div>

    <?php /*$form->field($model, 'id_coordenada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Coordenada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Coordenada'        
                                         ])*/ ?>
    
     <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="2"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        
        <tr>
            
            <!----------------------------------------------------PREGUNTA PARA X(m)--------------------------------------------------->
            <td class="labelpregunta"><?= $numerar; ?>.1 X (m):
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"", 
                                        ["title" => "Asigne valor de x en metros", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>  
            </td>
            <td class="inputpregunta"><?= $form->field($model, 'x')->widget(\yii\widgets\MaskedInput::className(), 
                                        ["mask" => "99.99999","options"=>["disabled" => $botton]])->label(false); ?></td>
        </tr>    
        
        <!----------------------------------------------------------PREGUNTA PARA Y(m)-------------------------------------------------->
        <tr>
             <td class="labelpregunta"><?= $numerar; ?>.2 Y (m):
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"", 
                                        ["title" => "Asigne valor de y en metros", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?> </td>
             
             <td class="inputpregunta">  <?= $form->field($model, 'y')->widget(\yii\widgets\MaskedInput::className(), 
                                        ["mask" => "99.99999","options"=>["disabled" => $botton]])->label(false);  ?>
        </tr>
   

        <tr>
            <td class="labelpregunta"><?= $numerar; ?>.3 Altura (m.s.n.m):
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"", 
                                        ["title" => "Asigne valor de altura (m.s.n.m)", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta"><?= $form->field($model, 'altura')->widget(\yii\widgets\MaskedInput::className(), 
                                        ["mask" => "99.99999","options"=>["disabled" => $botton]])->label(false);  ?></td>
        </tr>
        
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>.4 Longitud ():
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"", 
                                        ["title" => "Asigne valor de longitud ()", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta"><?= $form->field($model, 'longitud')->widget(\yii\widgets\MaskedInput::className(), 
                                        ["mask" => "99.99999","options"=>["disabled" => $botton]])->label(false);  ?></td>
        </tr>
        
        
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>.5 Latitud ():
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"", 
                                        ["title" => "Asigne valor de latitud ()", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta"><?= $form->field($model, 'latitud')->widget(\yii\widgets\MaskedInput::className(), 
                                        ["mask" => "99.99999","options"=>["disabled" => $botton]])->label(false);   ?></td>
        </tr>
        
         <tr>
            <td class="labelpregunta"><?= $numerar; ?>.6 Tipo de Coordenada ():
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"", 
                                        ["title" => "Seleccione un tipo de coordenada", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta"> <?= $form->field($model, 'id_tcoordenada')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\TrTipoCoordenada::find()->all(),
                                            'id_tcoordenada','nom_tcoordenada'),
                                            ['prompt'=>'Seleccione una coordenada',"disabled" => $botton])->label(false); ?>
            </td>
        </tr>

     </table>

   

    

   
    <?php //$form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <?php //$form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?php // $form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

    <div class="form-group"  style="text-align:right">
        <?= ($botton === FALSE )? Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):'' ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
