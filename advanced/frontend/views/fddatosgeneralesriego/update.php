<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesRiego */

$this->title = 'Update Fd Datos Generales Riego: ' . $model->id_datos_generales_riego;
$this->params['breadcrumbs'][] = ['label' => 'Fd Datos Generales Riegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_datos_generales_riego, 'url' => ['view', 'id' => $model->id_datos_generales_riego]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-datos-generales-riego-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
