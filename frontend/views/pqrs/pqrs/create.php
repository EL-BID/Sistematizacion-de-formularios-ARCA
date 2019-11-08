<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\pqrs\Pqrs */

$this->title = 'Crear PQRS';
$this->params['breadcrumbs'][] = ['label' => 'Pqrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$select='';
?>
<div class="pqrs-create">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>

    <div class="aplicativo table-responsive">
        <table>
            <tr>
                <td>Seleccione Tipo de PQRS:</td>
                <td>
                    <?= Html::dropDownList('tipopqrs',$select,$list,
                          ['prompt'=>'Seleccione un tipo de PQRS','id'=>'selectipo',
                              'onchange'=>'$.post("");']
                          ); 
                    ?>
                </td>
            </tr>
        </table> 
        
        
        <div id="formulariopqrs">
        
        </div>
        
    </div>    

</div>

<?php
$_url = Yii::$app->getUrlManager()->createUrl('pqrs/pqrs/create');
$script = <<< JS
   $('#selectipo').change(function(){
        dataselect = $(this).val();
         var page='$_url';
        
        if(dataselect == '1'){
           var tipopqr = 'peticion';
        }else if(dataselect == '2'){
            var tipopqr = 'queja';
        }else if(dataselect == '3'){
            var tipopqr = 'denuncia';
        }else if(dataselect == '4'){
            var tipopqr = 'felicitacion';
        }else{
            var tipopqr = 'peticion';
        }
               
        
        $.ajax({
           url: page,
           type: "GET",
           data: {
                     tipo: tipopqr
                 },
            success: function (response) {
                $("#formulariopqrs").html(response);
            }
        });
    })
JS;
$this->registerJs($script);
?>