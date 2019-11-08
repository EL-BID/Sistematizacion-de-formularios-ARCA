<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdComandoPregunta */

$this->title = 'Update Fd Comando Pregunta: ' . $model->id_comando;
$this->params['breadcrumbs'][] = ['label' => 'Fd Comando Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comando, 'url' => ['view', 'id_comando' => $model->id_comando, 'id_pregunta' => $model->id_pregunta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-comando-pregunta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
