<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaXMes */

$this->title = 'Create Fd Respuesta Xmes';
$this->params['breadcrumbs'][] = ['label' => 'Fd Respuesta Xmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-respuesta-xmes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
