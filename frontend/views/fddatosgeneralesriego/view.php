<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesRiego */

$this->title = $model->id_datos_generales_riego;
$this->params['breadcrumbs'][] = ['label' => 'Fd Datos Generales Riegos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-datos-generales-riego-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_datos_generales_riego], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_datos_generales_riego], [
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
            'id_datos_generales_riego',
            'nombres_prestador_servicio',
            'direccion_oficinas',
            'nombres_apellidos_replegal',
            'posee_convencional',
            'num_convencional',
            'num_celular',
            'num_celular_otro',
            'posee_email:email',
            'correo_electronico',
            'id_conjunto_respuesta',
        ],
    ]) ?>

</div>
