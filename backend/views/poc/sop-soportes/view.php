<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\SopSoportes */

$this->title = $model->id_soportes;
$this->params['breadcrumbs'][] = ['label' => 'Sop Soportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sop-soportes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_soportes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_soportes], [
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
            'id_soportes',
            'ruta_soporte',
            'titulo_soporte',
            'palabras_clave',
            'descripcion:ntext',
            'fuente_soporte',
            'autor_soporte',
            'idioma_soporte',
            'formato_soportes',
            'tamanio_soportes',
            'id_respuesta',
        ],
    ]) ?>

</div>
