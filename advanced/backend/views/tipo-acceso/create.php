<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TipoAcceso */

$this->title = 'Create Tipo Acceso';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Accesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-acceso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
