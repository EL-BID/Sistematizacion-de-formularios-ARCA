<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesPublicos */

$this->title = 'Create Fd Datos Generales Publicos';
$this->params['breadcrumbs'][] = ['label' => 'Fd Datos Generales Publicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-datos-generales-publicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
