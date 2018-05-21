<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\CentroAtencionCiudadano */

$this->title = 'Update Centro Atencion Ciudadano: ' . $model->cod_centro_atencion_ciudadano;
$this->params['breadcrumbs'][] = ['label' => 'Centro Atencion Ciudadanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_centro_atencion_ciudadano, 'url' => ['view', 'id' => $model->cod_centro_atencion_ciudadano]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="centro-atencion-ciudadano-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
