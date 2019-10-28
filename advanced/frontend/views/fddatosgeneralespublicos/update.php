<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesPublicos */

$this->title = 'Update Fd Datos Generales Publicos: ' . $model->id_datos_generales_publicos;
$this->params['breadcrumbs'][] = ['label' => 'Fd Datos Generales Publicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_datos_generales_publicos, 'url' => ['view', 'id' => $model->id_datos_generales_publicos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-datos-generales-publicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
