<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\cda\Cda */

$this->title = $model->id_cda;
$this->params['breadcrumbs'][] = ['label' => 'Cdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_cda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_cda], [
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
            'fecha_ingreso',
            'fecha_solicitud',
            'tramite_administrativo',
            'id_cproceso_arca',
            'id_cproceso_senagua',
            'rol_en_calidad',
            'numero_tramites',
            'id_cda',
            'id_usuario_enviado_por',
            'institucion_solicitante',
            'solicitante',
            'cod_centro_atencion_ciudadano',
            'id_demarcacion',
        ],
    ]) ?>

</div>
