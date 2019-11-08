<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PerfilRegion */

$this->title = 'Update Perfil Region: ' . $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Perfil Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usuario, 'url' => ['view', 'id_usuario' => $model->id_usuario, 'cod_rol' => $model->cod_rol, 'cod_region' => $model->cod_region]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
