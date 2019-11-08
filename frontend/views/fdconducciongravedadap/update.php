<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConduccionGravedadAp */

$this->title = 'Update Fd Conduccion Gravedad Ap: '.$model->id_conduccion_gravedad_ap;
$this->params['breadcrumbs'][] = ['label' => 'Fd Conduccion Gravedad Aps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_conduccion_gravedad_ap, 'url' => ['view', 'id' => $model->id_conduccion_gravedad_ap]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-conduccion-gravedad-ap-update">

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
        'cantones' => $cantones,
        'provincia' => $provincia,
        'parroquias' => $parroquias,
        'periodos' => $periodos,
        'antvista' => $antvista,
        'migadepan' => $migadepan,
        'focus' => $focus,
        'id  junta' => $idjunta,
    ]); ?>
</div>
