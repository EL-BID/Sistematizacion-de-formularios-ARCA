<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\Cda */

$this->title = 'Create Cda';
$this->params['breadcrumbs'][] = ['label' => 'Cdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-create">
	
	<?php
        if(empty($_ajax)){
        ?>
    <h1><?= Html::encode($this->title) ?></h1>
	<?php
            }
    ?>

    <?= $this->render('_formpantallaprincipal', [
        'model' => $model,'modelpscproceso'=>$modelpscproceso,'_editararca' => FALSE, '_editarsenagua' => FALSE
    ]) ?>

</div>
