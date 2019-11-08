<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsActividadQuipux */

$this->title = $model->id_actividad_quipux;
$this->params['breadcrumbs'][] = ['label' => 'Ps Actividad Quipuxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-actividad-quipux-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_actividad_quipux], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_actividad_quipux], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
			'body' =>'Guardado con Exito',
		]);
		elseif (Yii::$app->session->getFlash('FormSubmitted')=='1'):
		
		echo Alert::widget([
			'options' => [
				'class' => 'alert-info',
			],
			'body' =>'Modificado con Exito',
		]);
		
		
	endif; ?>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_actividad_quipux',
            'fecha_actividad_quipux',
            'usuario_actual_quipux',
            'accion_realizada',
            'descripcion',
            'estado_actual',
            'numero_referencia',
            'usuario_origen_quipux',
            'usuario_destino_quipux',
            'respondido_a',
            'fecha_carga',
            'id_cproceso',
        ],
    ]) ?>

</div>
