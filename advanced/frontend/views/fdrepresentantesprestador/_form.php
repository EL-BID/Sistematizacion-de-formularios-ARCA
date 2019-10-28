<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRepresentantesPrestador */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this);
?>
<div class="fd-representantes-prestador-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
                    ],
                ]); ?>
    
    
 <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
    
        
		
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>1.Nombres:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Nombres',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
    <?= $form->field($model, 'nombre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre'        
                                         ]) ->label(false);?>
			</td>				
		</tr>
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>2.Cargo:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Cargo',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
    <?= $form->field($model, 'cargo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Cargo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Cargo'        
                                         ]) ->label(false);?>
			</td>				
		</tr>
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>3.Teléfono:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Telefono',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
      <?= $form->field($model, 'telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Telefono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Telefono'        
                                         ]) ->label(false);?>
			</td>				
		</tr>
	<tr>
            <td class="labelpregunta"><?= $numerar; ?>4.Correo:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Correo',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
      <?= $form->field($model, 'correo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Correo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Correo'        
                                         ]) ->label(false);?>
			</td>				
		</tr>	
     
    </table>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
