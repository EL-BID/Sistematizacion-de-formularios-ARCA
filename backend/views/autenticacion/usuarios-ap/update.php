<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\autenticacion\UsuariosAp */

$this->title = 'Actaulizar Usuarios: ' . $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Actualizar Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usuario, 'url' => ['view', 'id' => $model->id_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-ap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
