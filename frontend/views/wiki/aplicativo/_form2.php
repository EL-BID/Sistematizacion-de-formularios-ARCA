<script>
function setTop(){
   var page="<?php echo Yii::$app->getUrlManager()->createUrl('aplicativo/grilla')  ; ?>";
   $.ajax({
           url: page,
           type: "POST",
           data: {
                     provincia: $("#provincia").val(), 
                     cantones:$("#cantones").val(), 
                     parroquias : $("#parroquias").val(),
                     formato : $("#formato").val(),
                     estados : $("#estados").val(),
                     periodos : $("#periodos").val()
                 },
            success: function (response) {
                $("#resultados").html(response);
            }
    });
}
</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use frontend\models\Provincias;                         //Agregando modelo provincias
use frontend\models\Formato;                            //Agregando modelo de formato

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesdropdown */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="clientesdropdown-form">
    
    <!-- -----------------------------------------FORMULARIO CON FILTROS---------------------------------------------------- -->
    <?= Html::beginForm(['aplicativo/index'], 'post', ['class' => 'form-inline']); ?>
    <table class="table">
        <tr>
            <td>
                <?php 

                echo Html::label('Provincia: ', 'provincia', ['class' => 'label-class']);

                echo Html::dropDownList('provincia',[],
                     ArrayHelper::map(Provincias::find()->all(),'cod_provincia','nombre_provincia'),
                      ['prompt'=>'Seleccione una provincia','id'=>'provincia',
                          'onchange'=>'$.post("index.php?r=filtros/listado&id='.'"+$(this).val(),function(data){
                              $("#cantones").html(data);
                          });']
                      ); 
                ?>                 
            </td>
            
            
            <td>
                <?php
         
                echo Html::label('Cantones: ', 'cantones', ['class' => 'label-class']);
                echo Html::dropDownList('cantones',[],[],['prompt'=>'Seleccione un canton','id' => 'cantones',
                         'onchange'=>'$.post("index.php?r=filtros/listadop&id='.'"+$(this).val(),function(data){
                             $("#parroquias").html(data);
                         });'] ); 
         
                ?>                 
            </td>
    
            <td>
                <?php
         
                    echo Html::label('Parroquias: ', 'parroquias', ['class' => 'label-class']);
                    echo Html::dropDownList('parroquias',[],[],['prompt'=>'Seleccione una parroquia','id' => 'parroquias'] ); 

                 ?> 
                
            </td>
        </tr>
        <tr>
            <td>
                 <?php
         
                    echo Html::label('Formato: ', 'formato', ['class' => 'label-class']);
                    echo Html::dropDownList('formato',[],
                         ArrayHelper::map(Formato::find()->all(),'id_formato','fullFormat'),
                         ['prompt'=>'Seleccione una formato','id'=>'formato','onchange'=>'$.post("index.php?r=filtros/listadoe&id='.'"+$(this).val(),function(data){
                             var res = data.split("::");
                             $("#estados").html(res[0]);
                             $("#periodos").html(res[1]);
                         });']
                         );  

                 ?>                 
            </td>
            <td>
                 <?php
         
                    echo Html::label('Estado: ', 'estados', ['class' => 'label-class']);
                    echo Html::dropDownList('estados',[],[],['prompt'=>'Seleccione una formato','id'=>'estados']);  

                 ?>                 
            </td>
            <td>
                 <?php
         
                    echo Html::label('Periodo: ', 'periodos', ['class' => 'label-class']);
                    echo Html::dropDownList('periodos',[],[],['prompt'=>'Seleccione una formato','id'=>'periodos']);  

                 ?>                 
            </td>
            
        </tr>
        <tr>
            
            <td colspan="3" align="right"> <?= Html::Button('Buscar', ['class' => 'btn btn-prueba', 'name' => 'hash-button','onclick'=>'js:setTop()']) ?></td>
        </tr>
        
    </table>
    <?= Html::endForm() ?>

    <div id="resultados">Seleccione sus requisitos de busqueda.</div>
</div>



