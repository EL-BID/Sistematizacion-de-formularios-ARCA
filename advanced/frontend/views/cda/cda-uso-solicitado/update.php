<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaUsoSolicitado */

$this->title = 'Actualizar Cda Uso Solicitado: ' . $model->id_uso_solicitado;
$this->params['breadcrumbs'][] = ['label' => 'Cda Uso Solicitados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_uso_solicitado, 'url' => ['view', 'id' => $model->id_uso_solicitado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-uso-solicitado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
