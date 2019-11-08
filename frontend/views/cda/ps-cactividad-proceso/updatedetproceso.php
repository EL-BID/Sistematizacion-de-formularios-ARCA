<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCactividadProceso */

$this->title = 'Editar Actividad';
$this->params['breadcrumbs'][] = ['label' => 'Ps Cactividad Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cactividad_proceso, 'url' => ['view', 'id' => $model->id_cactividad_proceso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ps-cactividad-proceso-update">

        <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>

    <?= $this->render('_formdetproceso', [
        'model' => $model,'listcausal' => $listcausal,'visible' =>$visibles, 'disabled' => $disabled
    ]) ?>

</div>
