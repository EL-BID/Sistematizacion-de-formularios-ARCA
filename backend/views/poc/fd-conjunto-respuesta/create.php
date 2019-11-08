<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoRespuesta */

$this->title = 'Create Fd Conjunto Respuesta';
$this->params['breadcrumbs'][] = ['label' => 'Fd Conjunto Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-conjunto-respuesta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
