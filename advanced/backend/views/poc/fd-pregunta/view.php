<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPregunta */

$this->title = $model->id_pregunta;
$this->params['breadcrumbs'][] = ['label' => 'Fd Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-pregunta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pregunta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pregunta], [
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
            'id_pregunta',
            'nom_pregunta',
            'ayuda_pregunta',
            'obligatorio',
            'max_largo',
            'min_largo',
            'max_date',
            'min_date',
            'orden',
            'estado',
            'ini_fecha',
            'fin_fecha',
            'id_tpregunta',
            'id_capitulo',
            'id_seccion',
            'id_agrupacion',
            'id_tselect',
            'caracteristica_preg',
            'id_conjunto_pregunta',
            'visible',
            'visible_desc_preg',
            'num_col_label',
            'num_col_input',
            'stylecss',
            'format',
            'min_number',
            'max_number',
            'atributos',
            'reg_exp',
            'numerada',
        ],
    ]) ?>

</div>
