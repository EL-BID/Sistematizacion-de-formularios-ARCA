<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TipoEntidad */

$this->title = 'Create Tipo Entidad';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Entidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-entidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
