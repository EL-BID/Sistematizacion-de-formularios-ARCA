<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacion */

$this->title = $model->id_ubicacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headSection">
<h1 class="titSection"><?= Html::encode($this->title) ?></h1>
</div>
<div class="fd-ubicacion-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ubicacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ubicacion], [
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
            'id_ubicacion',
            'cod_parroquia',
            'cod_canton',
            'cod_provincia',
            'id_demarcacion',
            'cod_centro_atencion_ciudadano',
            'descripcion_ubicacion',
            'id_conjunto_respuesta',
            'id_pregunta',
            'id_respuesta',
        ],
    ]) ?>

</div>
