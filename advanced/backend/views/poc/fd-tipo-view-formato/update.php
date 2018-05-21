<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoViewFormato */

$this->title = 'Update Fd Tipo View Formato: ' . $model->id_tipo_view_formato;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo View Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_view_formato, 'url' => ['view', 'id' => $model->id_tipo_view_formato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tipo-view-formato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
