<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaXMes */

$this->title = $model->id_respuesta_x_mes;
$this->params['breadcrumbs'][] = ['label' => 'Fd Respuesta Xmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-respuesta-xmes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_respuesta_x_mes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_respuesta_x_mes], [
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
            'ene_decimal',
            'feb_decimal',
            'mar_decimal',
            'abr_decimal',
            'may_decimal',
            'jun_decimal',
            'jul_decimal',
            'ago_decimal',
            'sep_decimal',
            'oct_decimal',
            'nov_decimal',
            'dic_decimal',
            'id_respuesta',
            'id_pregunta',
            'descripcion',
            'id_opcion_select',
            'id_respuesta_x_mes',
        ],
    ]) ?>

</div>
