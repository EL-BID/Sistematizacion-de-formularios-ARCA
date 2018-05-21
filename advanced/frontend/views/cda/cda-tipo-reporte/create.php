<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTipoReporte */

$this->title = 'Nuevo Cda Tipo Reporte';
$this->params['breadcrumbs'][] = ['label' => 'Cda Tipo Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-tipo-reporte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
