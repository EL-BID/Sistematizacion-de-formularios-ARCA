<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pagina */

$this->title = 'Create Pagina';
$this->params['breadcrumbs'][] = ['label' => 'Paginas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
