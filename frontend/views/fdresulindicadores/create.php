<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdResulIndicadores */

$this->title = 'Create Fd Resul Indicadores';
$this->params['breadcrumbs'][] = ['label' => 'Fd Resul Indicadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-resul-indicadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
