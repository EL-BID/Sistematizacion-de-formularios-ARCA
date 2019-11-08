<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoAcceso */

$this->title = 'Update Tipo Acceso: ' . $model->id_tipo_acceso;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Accesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_acceso, 'url' => ['view', 'id' => $model->id_tipo_acceso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-acceso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
