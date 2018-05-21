<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdClasificacionPregunta */

$this->title = 'Update Fd Clasificacion Pregunta: ' . $model->id_clasificacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Clasificacion Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_clasificacion, 'url' => ['view', 'id_clasificacion' => $model->id_clasificacion, 'id_pregunta' => $model->id_pregunta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-clasificacion-pregunta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
