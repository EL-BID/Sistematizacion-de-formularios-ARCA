<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdFuentesHidricas */

$this->title = 'Update Fd Fuentes Hidricas: ' . $model->id_fuentehidrica;
$this->params['breadcrumbs'][] = ['label' => 'Fd Fuentes Hidricas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fuentehidrica, 'url' => ['view', 'id' => $model->id_fuentehidrica]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="fd-fuentes-hidricas-update">

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
    ]); ?>


</div>
