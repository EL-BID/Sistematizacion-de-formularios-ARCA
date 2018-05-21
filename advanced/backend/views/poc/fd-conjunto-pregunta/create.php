<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoPregunta */

$this->title = 'Create Fd Conjunto Pregunta';
$this->params['breadcrumbs'][] = ['label' => 'Fd Conjunto Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-conjunto-pregunta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
