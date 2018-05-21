<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoAgrupacion */

$this->title = 'Update Fd Tipo Agrupacion: ' . $model->id_tagrupacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Agrupacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tagrupacion, 'url' => ['view', 'id' => $model->id_tagrupacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tipo-agrupacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
