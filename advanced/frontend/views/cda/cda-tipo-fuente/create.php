<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTipoFuente */

$this->title = 'Nuevo Cda Tipo Fuente';
$this->params['breadcrumbs'][] = ['label' => 'Cda Tipo Fuentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-tipo-fuente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
