<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Entidades */

$this->title = 'Update Entidades: ' . $model->id_entidad;
$this->params['breadcrumbs'][] = ['label' => 'Entidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_entidad, 'url' => ['view', 'id' => $model->id_entidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
