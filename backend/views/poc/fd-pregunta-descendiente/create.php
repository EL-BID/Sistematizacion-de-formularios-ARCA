<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPreguntaDescendiente */

$this->title = 'Create Fd Pregunta Descendiente';
$this->params['breadcrumbs'][] = ['label' => 'Fd Pregunta Descendientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-pregunta-descendiente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
