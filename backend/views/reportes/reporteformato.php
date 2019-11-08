<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\CreateUserForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reporte generado';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title); ?></h1>
    

    <p>Por favor seleccione el formato para crear el reporte:</p>

    <div class="row">
        <div class="col-lg-5">
  <?php $form = ActiveForm::begin(['id' => 'reporte-formato-form']); 
  $bande=false;
  if($formato==6)$bande=true;  
  ?>    
    
    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdFormato::find()->all(), 'id_formato', 'nom_formato'), ['prompt' => 'Seleccione un formato' ,'onchange'=>'visualizarProvincia(this)']); ?>

    <?= ($bande=== true) ? $form->field($model, 'provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'), ['prompt' => 'Seleccione una provincia','style' => 'display: block'])->label('Seleccione provincia',['id'=>'label_provincia','style' => 'display: block']) : $form->field($model, 'provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'), ['prompt' => 'Seleccione una provincia','style' => 'display: none'])->label('Seleccione provincia',['id'=>'label_provincia','style' => 'display: none']) ?>

    <button>Enviar</button>

<?php ActiveForm::end() ?>
        </div>
    </div>
</div>

<script>
    function visualizarProvincia(campo)
    {
        var valor = campo.value;
        if(valor==6)
        {
            document.getElementById('reporteformatoform-provincia').style.display="block";        
            document.getElementById('label_provincia').style.display="block";
        }
        else
        {
            document.getElementById('reporteformatoform-provincia').style.display="none";     
            document.getElementById('label_provincia').style.display="none";
        }
    }
</script>