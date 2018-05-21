<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPreguntaDescendiente */

$this->title = 'Update Fd Pregunta Descendiente: ' . $model->id_pregunta_padre;
$this->params['breadcrumbs'][] = ['label' => 'Fd Pregunta Descendientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pregunta_padre, 'url' => ['view', 'id_pregunta_padre' => $model->id_pregunta_padre, 'id_pregunta_descendiente' => $model->id_pregunta_descendiente, 'id_version_descendiente' => $model->id_version_descendiente, 'id_version_padre' => $model->id_version_padre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-pregunta-descendiente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
