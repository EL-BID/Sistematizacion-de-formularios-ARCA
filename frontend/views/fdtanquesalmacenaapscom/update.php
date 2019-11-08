<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTanquesAlmacenaApscom */

$this->title = 'Update Fd Tanques Almacena Apscom: ' . $model->id_tanquesalmacena;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tanques Almacena Apscoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tanquesalmacena, 'url' => ['view', 'id' => $model->id_tanquesalmacena]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tanques-almacena-apscom-update">

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
        'id_version' => $id_version,
        'id_conj_prta' => $id_conj_prta,
        'id_cnj_rpta' => $id_cnj_rpta,
        'id_capitulo' => $id_capitulo,
        'id_prta' => $id_prta,
        'id_rpta' => $id_rpta,
        'numerar' => $numerar,
        'nom_prta' => $nom_prta,
        'estado' => $estado,
        'capitulo' => $capitulo,       
        'periodos' => $periodos,
        'antvista' => $antvista,
        'migadepan' => $migadepan,
        'focus' => $focus,
        'idjunta' => $idjunta,
        'valor_tselect' =>$valor_tselect,
        'valor_fecuencia' =>$valor_fecuencia,
        'valor_material'=>$valor_material,
        'valor_estado' =>$valor_estado,
        'valor_problemas' =>$valor_problemas,
        'bande' =>$bande,
    ]); ?>
</div>
