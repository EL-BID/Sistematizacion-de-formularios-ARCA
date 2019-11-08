<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesform */

$this->title = 'Create Clientesform';
$this->params['breadcrumbs'][] = ['label' => 'Clientesforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="clientesform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

