<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */

$this->title = $model->id_solicitud_info;
$this->params['breadcrumbs'][] = ['label' => 'Cda Solicitud Informacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-solicitud-informacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_solicitud_info], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_solicitud_info], [
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
            'id_solicitud_info',
            'id_tinfo_faltante',
            'id_treporte',
            'id_cactividad_proceso',
            'id_tatencion',
            'observaciones',
            'oficio_atencion',
            'fecha_atencion',
            'id_cda',
            'id_trespuesta',
            'observaciones_res',
            'oficio_respuesta',
            'fecha_respuesta',
            'id_cactividad_proceso_res',
        ],
    ]) ?>

</div>
