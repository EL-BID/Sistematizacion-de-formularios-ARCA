<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGenerales */

$this->title = 'Update Fd Datos Generales: ' . $model->id_datos_generales;
$this->params['breadcrumbs'][] = ['label' => 'Fd Datos Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_datos_generales, 'url' => ['view', 'id' => $model->id_datos_generales]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-datos-generales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
