<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsDetArcCargue */

$this->title = $model->id_det_arc_cargue;
$this->params['breadcrumbs'][] = ['label' => 'Ps Det Arc Cargues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-det-arc-cargue-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_det_arc_cargue], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_det_arc_cargue], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea borrar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
	<!--VALIDACION DE GUARDADO DE LOS DATOS---->

	<?php if  (Yii::$app->session->getFlash('FormSubmitted')=='2'):

		echo Alert::widget([
			'options' => [
				'class' => 'alert-info',
			],
			'body' =>'Guardado con Éxito',
		]);
		elseif (Yii::$app->session->getFlash('FormSubmitted')=='1'):
		
		echo Alert::widget([
			'options' => [
				'class' => 'alert-info',
			],
			'body' =>'Modificado con Ëxito',
		]);
		
		
	endif; ?>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_archivo_cargue',
            'id_det_arc_cargue',
            'num_nom_hoja',
            'num_columna_excel',
            'nom_columna_cargue',
            'nom_columna_excel',
        ],
    ]) ?>

</div>
