<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaErrores */

$this->title = 'Create Cda Errores';
$this->params['breadcrumbs'][] = ['label' => 'Cda Errores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-errores-create">

     <?php
        if(empty($_ajax)){
        ?>
    <h1><?= Html::encode($this->title) ?></h1>
	<?php
            }
    ?>

    <?= $this->render('_form', [
        'model' => $model,'ps_cproceso'=>$ps_cproceso,'listadoerrores' => $listadoerrores
    ]) ?>

</div>
