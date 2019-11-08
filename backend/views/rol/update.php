<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rol */

$this->title = 'Update Rol: ' . $model->cod_rol;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_rol, 'url' => ['view', 'id' => $model->cod_rol]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
