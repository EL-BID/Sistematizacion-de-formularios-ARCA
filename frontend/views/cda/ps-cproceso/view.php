<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCproceso */

$this->title = $model->id_cproceso;
$this->params['breadcrumbs'][] = ['label' => 'Ps Cprocesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cproceso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_cproceso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_cproceso], [
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
            'id_cproceso',
            'ult_id_eproceso',
            'id_proceso',
            'id_usuario',
            'id_modulo',
            'num_quipux',
            'fecha_registro_quipux',
            'asunto_quipux',
            'tipo_documento_quipux',
            'ult_id_actividad',
            'ult_id_usuario',
            'ult_fecha_actividad',
            'ult_fecha_estado',
            'numero',
        ],
    ]) ?>

</div>
