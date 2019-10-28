<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdInformacionComunidad */

$this->title = $model->id_info_comunida;
$this->params['breadcrumbs'][] = ['label' => 'Fd Informacion Comunidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-informacion-comunidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_info_comunida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_info_comunida], [
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
            'id_info_comunida',
            'parroquia',
            'comunidad',
            'habitantes',
            'id_conjunto_respuesta',
            'id_pregunta',
            'id_respuesta',
            'id_capitulo',
            'id_reporte_informacion',
        ],
    ]) ?>

</div>
