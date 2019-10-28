<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\JuntasGad */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)        
?>

<div class="juntas-gad-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); 
    $id_conj_rpta= $_GET['id_cnj_rpta'];
    ?>
<table class="tbcapitulo">        
        <tr>
            <td class="labelpregunta">Nombre del Prestador
                <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                ,'#',
                ['title' => 'Ingrese el nombre del Prestador',
                'data-toggle' => 'tooltip',
                ]); ?>   
            </td>
            <td><?= $form->field($model, 'nombre_junta')->textInput([])->label(false); ?></td>
        </tr>
</table>

    <br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function ValidarNombreJunta()
    {
        var bande =true;
        var valor = document.getElementById('juntasgad-nombre_junta').value;
        var campo = document.getElementById('juntasgad-nombre_junta');
        if(valor=='')
            {
                alertify.alert('Mensaje','Ingrese un nombre del prestador').set('label', 'Aceptar').set({transition:'zoom'}).set('onfocus', function(){campo.value='';  campo.focus();}).show();
                bande= false;
            }  
            event.preventDefault();
         $.ajax({
            type: "POST", 
            url: "?r=detcapitulo/validanjunta",              
            data: {
                   id_conjrpta: <?= $id_conj_rpta?>, 
                   valor: valor 
                   },
            success: function(result){                
                if(result>0)
                  {                      
                      bande= false;
                      alertify.alert('Mensaje','El nombre del prestador ya existe, ingrese otro nombre').set('label', 'Aceptar').set({transition:'zoom'}).set('onfocus', function(){campo.value='';  campo.focus();}).show();                    
                      return false;
                  }
                  else
                      {
                           $("#create-form").submit();
                      }
            }
        });            
    return bande;
    }
</script>