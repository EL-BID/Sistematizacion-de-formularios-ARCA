
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacionGeografica */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>
<div class="fd-ubicacion-geografica-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]);     
    ?>
    
<table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta;?></td>
        </tr>
        <tr>
            <td class="labelpregunta">X(m)
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Valor X',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			
	   <td>

                                        <?= $form->field($model, 'x')->textInput([
                                        'maxlength' => 6,
                                        'title' => 'Valor X',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Ingrese sólo números',
                                        'onkeypress'=>'return soloNumeros(event,this)',
                                         ])->label(false); ?>
 
           </td>
        </tr>
        <tr>
            <td class="labelpregunta">Y(m)
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Valor Y',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			
	   <td>
                                    <?= $form->field($model, 'y')->textInput([
                                        'maxlength' => 8,
                                        'title' => 'Valor Y',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Ingrese sólo números',
                                        'onkeypress'=>'return soloNumeros(event,this)',
                                         ])->label(false); ?>

 
           </td>
           </tr>
           <tr>
            <td class="labelpregunta">Cota (m.s.n.m)
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Valor Cota',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			
	   <td><br>
                                    <?= $form->field($model, 'cota')->textInput([
                                        'maxlength' => 4,
                                        'title' => 'Valor cota',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Ingrese sólo números',
                                        'onkeypress'=>'return soloNumeros(event,this)',
                                         ])->label(false); ?>

 
           </td>
        </tr>
 </table>    

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'onclick'=>'return Validaceros();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function Validaceros()
    {
        var x = document.getElementById('fdubicaciongeografica-x').value;
        var y = document.getElementById('fdubicaciongeografica-y').value;
        var cota = document.getElementById('fdubicaciongeografica-cota').value;
        if(x>0 && y>0 && cota>0)
            return true;
        else
            {
                alert('Debe ingresar números mayores a 0');
                return false;
            }
    }
</script>