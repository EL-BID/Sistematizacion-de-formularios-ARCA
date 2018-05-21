<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoPregunta */

$this->title = 'Update Fd Conjunto Pregunta: ' . $model->id_conjunto_pregunta;
$this->params['breadcrumbs'][] = ['label' => 'Fd Conjunto Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_conjunto_pregunta, 'url' => ['view', 'id' => $model->id_conjunto_pregunta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-conjunto-pregunta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
