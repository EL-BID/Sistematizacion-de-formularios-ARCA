<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\CreateUserForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Crear Usuarios desde archivo excel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title); ?></h1>
    

    <p>Por favor seleccione el archivo excel para crear usuarios:</p>

    <div class="row">
        <div class="col-lg-5">
  <?php $form = ActiveForm::begin(['id' => 'create-user-excel-form']); ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?= $form->field($model, 'id_formato')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdFormato::find()->all(), 'id_formato', 'nom_formato'), ['prompt' => 'Seleccione un formato' ,'onchange'=>'visualizarProvincia(this)']); ?>

    <button>Enviar</button>

<?php ActiveForm::end() ?>
        </div>
    </div>
</div>
