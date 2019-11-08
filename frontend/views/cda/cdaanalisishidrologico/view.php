<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaAnalisisHidrologico */

$this->title = $model->id_analisis_hidrologico;
$this->params['breadcrumbs'][] = ['label' => 'Cda Analisis Hidrologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-analisis-hidrologico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_analisis_hidrologico], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_analisis_hidrologico], [
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
            'id_analisis_hidrologico',
            'id_cartografia',
            'id_ehidrografica',
            'id_emeteorologica',
            'id_metodologia',
            'id_cod_cda',
            'informe_utilizado',
            'probabilidad',
            'observacion',
        ],
    ]) ?>

</div>
