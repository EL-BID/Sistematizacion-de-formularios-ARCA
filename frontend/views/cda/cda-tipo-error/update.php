<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTipoError */

$this->title = 'Actualizar Cda Tipo Error: ' . $model->id_terror;
$this->params['breadcrumbs'][] = ['label' => 'Cda Tipo Errors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_terror, 'url' => ['view', 'id' => $model->id_terror]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-tipo-error-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
