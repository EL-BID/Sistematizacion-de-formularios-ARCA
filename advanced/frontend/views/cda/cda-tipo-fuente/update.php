<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTipoFuente */

$this->title = 'Actualizar Cda Tipo Fuente: ' . $model->id_tfuente;
$this->params['breadcrumbs'][] = ['label' => 'Cda Tipo Fuentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tfuente, 'url' => ['view', 'id' => $model->id_tfuente]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-tipo-fuente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
