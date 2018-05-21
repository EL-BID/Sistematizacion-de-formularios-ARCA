<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTipoReporte */

$this->title = 'Actualizar Cda Tipo Reporte: ' . $model->id_treporte;
$this->params['breadcrumbs'][] = ['label' => 'Cda Tipo Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_treporte, 'url' => ['view', 'id' => $model->id_treporte]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-tipo-reporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
