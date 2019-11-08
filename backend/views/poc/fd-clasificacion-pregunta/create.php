<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdClasificacionPregunta */

$this->title = 'Create Fd Clasificacion Pregunta';
$this->params['breadcrumbs'][] = ['label' => 'Fd Clasificacion Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-clasificacion-pregunta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
