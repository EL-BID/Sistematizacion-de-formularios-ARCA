<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesprueba */

$this->title = 'Create Clientesprueba';
$this->params['breadcrumbs'][] = ['label' => 'Clientespruebas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesprueba-create">

    <div class="headSection">
    <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
