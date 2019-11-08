<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdInformacionComunidad */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this);
?>
<div class="fd-informacion-comunidad-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
                    ],
                ]); ?>

   
 <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        
        
		
		<tr>
		<td class="labelpregunta"><?= $numerar; ?>2. Provincia:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Seleccione una Provincia',
                                        'data-toggle' => 'tooltip',
                                        ]); ?>  
            </td>
            <td class="inputpregunta"><?= $form->field($model, 'cod_provincia')
                         ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'),
                           ['prompt' => 'Seleccione una provincia',
                          'onchange' => '$.post("index.php?r=fdinformacioncomunidad/listado&id='.'"+$(this).val(),function(data){
                              $("#fdinformacioncomunidad-cod_canton").html(data);
                          });', ])->label(false); ?></td>
        </tr>

		
		<tr>
		<tr>
            
            <!----------------------------------------------------PREGUNTA PARA CANTONES--------------------------------------------------->

            <td class="labelpregunta"><?= $numerar; ?>3. Cantón:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => '',
                                          'data-toggle' => 'tooltip',
                                        ]); ?> 
            </td>
            
            <?php
            if ($model->isNewRecord) {
                ?>
                    <td class="inputpregunta"> <?= $form->field($model, 'cod_canton')
                                                    ->dropDownList([], ['prompt' => 'Seleccione un Canton',
                                                        'onchange' => '$.post("index.php?r=fdinformacioncomunidad/listadopd&id_prov='.'"+$("#fdinformacioncomunidad-cod_provincia :selected").val()+"'.'&id='.'"+$(this).val(),function(data){
                                                        $("#fdinformacioncomunidad-cod_parroquia").html(data);
                                                    });', ])->label(false); ?></td>
            
             <?php
            } else {
                ?>  
                  <td class="inputpregunta"> <?= $form->field($model, 'cod_canton')
                                            ->dropDownList(\yii\helpers\ArrayHelper::map($cantonesPost, 'cod_canton', 'nombre_canton'), ['prompt' => 'Seleccione un Canton',
                                                'onchange' => '$.post("index.php?r=fdinformacioncomunidad/listadopd&id_prov='.'"+$("#fdinformacioncomunidad-cod_provincia :selected").val()+"'.'&id='.'"+$(this).val(),function(data){
                                                $("#fdinformacioncomunidad-cod_parroquia").html(data);
                                            });', ])->label(false); ?></td>
            
            <?php
            }
           ?>
		</tr>
		
		<tr>
            <td class="labelpregunta"><?= $numerar; ?>3. Parroquia:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Parroquia',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
            
            <?php
            if ($model->isNewRecord) {
                ?>
            <td class="inputpregunta"> <?= $form->field($model, 'cod_parroquia')
                                        ->dropDownList([],
                                        ['prompt' => 'Indique la parroquia'])->label(false); ?></td>

            <?php
            } else {
                ?>
            <td class="inputpregunta"> <?= $form->field($model, 'cod_parroquia')
                                        ->dropDownList(\yii\helpers\ArrayHelper::map($parroquiasPost, 'cod_parroquia', 'nombre_parroquia'),
                                        ['prompt' => 'Indique la parroquia'])->label(false); ?></td>
            <?php
            }
           ?>
        </tr>

		<tr>
            <td class="labelpregunta"><?= $numerar; ?>4. Comunidad:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Parroquia',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			
			<td>
		
    <?= $form->field($model, 'comunidad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Comunidad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Comunidad',
                                         ])->label(false); ?>

			</td>				
		</tr>

		<tr>


			<td class="labelpregunta"><?= $numerar; ?>4. Habitantes:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Indique Número de habitantes',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>

			<td>
		
			<?= $form->field($model, 'habitantes')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Habitantes',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Habitantes',
                                         ])->label(false); ?>


			</td>	

		</tr>
	</table>

 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
