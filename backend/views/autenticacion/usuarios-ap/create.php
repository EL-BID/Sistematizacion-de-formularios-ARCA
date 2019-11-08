<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\autenticacion\UsuariosAp */

$this->title = 'Crear Usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Crear Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-ap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
