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
    

    <p>Seleccione los archivos a unir:</p>

    <div class="row">
        <div class="col-lg-5">
  <?php $form = ActiveForm::begin(['id' => 'reporte-unir-form']); 

  
  ?>    
    
    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdFormato::find()->all(), 'id_formato', 'nom_formato'), ['prompt' => 'Seleccione un formato' ,'onchange'=>'visualizarProvincia(this)']); ?>
    <?= $form->field($model, 'uploadFile[]')->fileInput(['multiple' => true]) ?>

    <button>Enviar</button>

<?php ActiveForm::end() ?>
        </div>
    </div>
</div>

