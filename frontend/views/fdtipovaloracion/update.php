<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoValoracion */

$this->title = 'Update Fd Tipo Valoracion: ' . $model->id_tipo_valoracion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo Valoracions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_valoracion, 'url' => ['view', 'id' => $model->id_tipo_valoracion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tipo-valoracion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
