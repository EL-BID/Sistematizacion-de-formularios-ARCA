<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdObrasCaptacionRiego */

$this->title = 'Create Fd Obras Captacion Riego';
$this->params['breadcrumbs'][] = ['label' => 'Fd Obras Captacion Riegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-obras-captacion-riego-create">

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
        'valor_tselect'=>$valor_tselect,
        'valor_tselectestado'=>$valor_tselectestado,
        'valor_tselectubicacion'=>$valor_tselectubicacion,
        'bande'=>$bande,
    ]); ?>

</div>