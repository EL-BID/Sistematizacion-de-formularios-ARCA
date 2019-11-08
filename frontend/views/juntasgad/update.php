<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\JuntasGad */

$this->title = 'Update Juntas Gad: ' . $model->id_junta;
$this->params['breadcrumbs'][] = ['label' => 'Juntas Gads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_junta, 'url' => ['view', 'id' => $model->id_junta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="juntas-gad-update">
    
        <?php
            if (empty($_ajax)) {
                ?>
             <h1><?= Html::encode($this->title); ?></h1>
        <?php
            }
        ?>
    
    <?= $this->render('_form', [
        'model' => $model,
        'id_fmt' => $id_fmt,        
        'id_conj_prta' => $id_conj_prta,
        'id_conj_rpta' => $id_cnj_rpta,        
        'estado' => $estado,
        'capitulo' => $capitulo,       
        'periodos' => $periodos,
        'antvista' => $antvista,
    ]); ?> 

</div>
