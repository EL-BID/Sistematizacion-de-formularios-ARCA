<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorCorreo */

$this->title = 'Crear Correo';
$this->params['breadcrumbs'][] = ['label' => 'Correo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-correo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
