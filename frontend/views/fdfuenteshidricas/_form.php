<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdFuentesHidricas */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-fuentes-hidricas-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
 <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta">Nombre Fuente
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Deberá indicar el nombre de las fuentes donde capta el recurso hídrico',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
			
	   <td><br>
    <?= $form->field($model, 'nom_fuente')->textInput([
                                        'maxlength' => true,
                                        'onkeyup'=>'return soloMayusculas(event,this)',
                                        'title' => 'Indique Nombre Fuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Fuente'        
                                         ])->label(false); ?>

 
           </td>
        </tr>
 </table>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
