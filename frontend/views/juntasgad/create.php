<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\JuntasGad */

$this->title = 'Crear Nueva Junta';
$this->params['breadcrumbs'][] = ['label' => 'Juntas Gads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juntas-gad-create">

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
        'migadepan' =>$migadepan,
        'estado' => $estado,
        'capitulo' => $capitulo,       
        'periodos' => $periodos,
        'antvista' => $antvista,
    ]); ?>  

</div>
