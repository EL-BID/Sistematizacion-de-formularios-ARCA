<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaPuntosCertificados */

$this->title = 'Update Cda Puntos Certificados: ' . $model->id_puntos_certificados;
$this->params['breadcrumbs'][] = ['label' => 'Cda Puntos Certificados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_puntos_certificados, 'url' => ['view', 'id' => $model->id_puntos_certificados]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cda-puntos-certificados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
