<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdNivelDesempenio */

$this->title = 'Create Fd Nivel Desempenio';
$this->params['breadcrumbs'][] = ['label' => 'Fd Nivel Desempenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-nivel-desempenio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
