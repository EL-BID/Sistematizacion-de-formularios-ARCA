<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\PsTipoSelect */

$this->title = 'Nuevo Ps Tipo Select';
$this->params['breadcrumbs'][] = ['label' => 'Ps Tipo Selects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-tipo-select-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
