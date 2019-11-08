<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\PsTipoActividad */

$this->title = 'Nuevo Ps Tipo Actividad';
$this->params['breadcrumbs'][] = ['label' => 'Ps Tipo Actividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-tipo-actividad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
