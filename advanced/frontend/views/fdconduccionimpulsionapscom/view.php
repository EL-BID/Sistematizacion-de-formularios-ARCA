<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConduccionImpulsionApscom */

$this->title = $model->id_cond_impulsion_apscom;
$this->params['breadcrumbs'][] = ['label' => 'Fd Conduccion Impulsion Apscoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-conduccion-impulsion-apscom-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cond_impulsion_apscom], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cond_impulsion_apscom], [
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
            'id_cond_impulsion_apscom',
            'nombre_lug_conduccion',
            'id_material_tuberia',
            'id_estado_tuberia',
            'id_frec_mantenimiento_condimp',
            'id_estado_bomba',
            'problemas_identificados',
            'especifique_otro_tuberia',
            'id_conjunto_respuesta',
            'id_pregunta',
            'id_respuesta',
            'id_capitulo',
            'id_junta',
        ],
    ]) ?>

</div>
