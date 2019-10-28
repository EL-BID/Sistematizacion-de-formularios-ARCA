<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdResulEvaluaciones */

$this->title = 'Create Fd Resul Evaluaciones';
$this->params['breadcrumbs'][] = ['label' => 'Fd Resul Evaluaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-resul-evaluaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
