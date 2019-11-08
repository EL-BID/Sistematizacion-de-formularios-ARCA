<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorTipoParametro */

$this->title = 'Create Cor Tipo Parametro';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Parametro', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-tipo-parametro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
