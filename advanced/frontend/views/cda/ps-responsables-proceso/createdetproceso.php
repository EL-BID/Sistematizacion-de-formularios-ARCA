<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsResponsablesProceso */

$this->title = 'Asignar Responsable';
$this->params['breadcrumbs'][] = ['label' => 'Ps Responsables Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-responsables-proceso-create">

    
        <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>

    <?= $this->render('_formdetproceso', [
        'model' => $model,'id_cda'=>$id_cda,'id_cproceso'=>$id_cproceso, 'tecnicos' => $tecnicos,'tipos_responsabilidad'=>$tiporesponsabilidad
    ]) ?>

</div>
