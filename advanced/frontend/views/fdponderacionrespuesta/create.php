<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPonderacionRespuesta */

$this->title = 'Create Fd Ponderacion Respuesta';
$this->params['breadcrumbs'][] = ['label' => 'Fd Ponderacion Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-ponderacion-respuesta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
