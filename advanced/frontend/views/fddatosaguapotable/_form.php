<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosAguaPotable */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this);
?>
<div class="fd-datos-agua-potable-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
					],
                ]); ?>

    
 <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>1.Comunidad:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Comunidad',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
    <?= $form->field($model, 'comunidad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Comunidad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Comunidad'        
                                         ]) ->label(false);?>
			</td>				
		</tr>
                 <tr>
            <td class="labelpregunta"><?= $numerar; ?>2.Cantidad de viviendas existentes dentro del área de cobertura:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Viviendas Existentes',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
    <?= $form->field($model, 'viviendas_existentes')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Viviendas Existentes',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Viviendas Existentes'        
                                         ]) ->label(false);?>
			</td>				
		</tr>
                 <tr>
            <td class="labelpregunta"><?= $numerar; ?>3.Cantidad de viviendas que cuentan con agua potable:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Viciendas que cuentan con el servicio de Agua Potable',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
      <?= $form->field($model, 'viviendas_agua_potable')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Viviendas Agua Potable',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Viviendas Agua Potable'        
                                         ]) ->label(false);?>
			</td>				
		</tr>
                <tr>
            <td class="labelpregunta"><?= $numerar; ?>4.Cantidad de conexiones con micromedidores u otras formas de control de volumenes de consumo, instalados y funcionando:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Cantida medidores instalados',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			<td>
       <?= $form->field($model, 'viviendas_medidores')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Viviendas Medidores',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Viviendas Medidores'        
                                         ]) ->label(false);?>
			</td>				
		</tr>	
     
    </table>
    
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
