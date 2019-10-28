<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSolicitud */

$this->title = 'Create Cda Solicitud';
$this->params['breadcrumbs'][] = ['label' => 'Cda Solicituds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-solicitud-create">

   <?php
        if(empty($_ajax)){
        ?>
            <h1><?= Html::encode($this->title) ?></h1>
	<?php
        }
    ?>

    <?= $this->render('_form',['model' => $model,'modelpscproceso'=>$modelpscproceso,'_editararca' => FALSE, '_editarsenagua' => FALSE,'listadodemarcacion'=>$listadodemarcacion]) ?>

</div>
