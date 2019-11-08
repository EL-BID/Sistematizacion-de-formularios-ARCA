<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCactividadProceso */

$this->title = 'Crear Actividad';
$this->params['breadcrumbs'][] = ['label' => 'Ps Cactividad Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cactividad-proceso-create">

    <h1><?= Html::encode($this->title) ?></h1>

     <?= $this->render('_formdetproceso', [
        'model' => $model,'listusuarios'=>$listusuarios,'listcausal' => $listcausal,'visible' =>$visibles, 'disabled' => $disabled
    ]) ?>

</div>
