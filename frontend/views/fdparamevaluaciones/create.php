<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdParamEvaluaciones */

$this->title = 'Create Fd Param Evaluaciones';
$this->params['breadcrumbs'][] = ['label' => 'Fd Param Evaluaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-param-evaluaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
