<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UsuariosAp */

$this->title = 'Create Usuarios Ap';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Aps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-ap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
