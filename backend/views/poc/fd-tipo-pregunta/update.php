<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoPregunta */

$this->title = 'Update Fd Tipo Pregunta: ' . $model->id_tpregunta;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tpregunta, 'url' => ['view', 'id' => $model->id_tpregunta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tipo-pregunta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
