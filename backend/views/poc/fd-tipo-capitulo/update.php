<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoCapitulo */

$this->title = 'Update Fd Tipo Capitulo: ' . $model->id_tcapitulo;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tcapitulo, 'url' => ['view', 'id' => $model->id_tcapitulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tipo-capitulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
