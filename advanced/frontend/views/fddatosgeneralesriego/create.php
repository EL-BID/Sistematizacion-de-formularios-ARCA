<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesRiego */

$this->title = 'Create Fd Datos Generales Riego';
$this->params['breadcrumbs'][] = ['label' => 'Fd Datos Generales Riegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-datos-generales-riego-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
