<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesauto */

$this->title = 'Create Clientesauto';
$this->params['breadcrumbs'][] = ['label' => 'Clientesautos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="clientesauto-create">

    <div class="headSection">
    <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,'autocomplete'=>$autocomplete,'autocomplete2'=>$autcomplete2,
    ]) ?>

</div>
