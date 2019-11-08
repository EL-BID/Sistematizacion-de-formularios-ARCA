<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacion */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Fd Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

 <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>
</div>
<div class="fd-ubicacion-create">
	<?= $this->render('_form', [
        'model' => $model, 'numerar'=>$numerar,'nom_prta'=>$nom_prta,'botton'=>$botton,'focus'=>$focus
    ]) ?>

</div>
