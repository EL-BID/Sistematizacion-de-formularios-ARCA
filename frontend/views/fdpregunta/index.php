<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\fdpreguntasearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fdpreguntas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fdpregunta-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fdpregunta', 
        ['value' =>Url::to(['fdpregunta/create']), 'title' => 'Create Fdpregunta',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pregunta',
            'nom_pregunta',
            'ayuda_pregunta',
            'obligatorio',
            'max_largo',
            // 'min_largo',
            // 'max_date',
            // 'min_date',
            // 'orden',
            // 'estado',
            // 'ini_fecha',
            // 'fin_fecha',
            // 'id_tpregunta',
            // 'id_capitulo',
            // 'id_seccion',
            // 'id_agrupacion',
            // 'id_tselect',
            // 'caracteristica_preg',
            // 'id_conjunto_pregunta',
            // 'visible',
            // 'visible_desc_preg',
            // 'num_col_label',
            // 'num_col_input',
            // 'stylecss',
            // 'format',
            // 'min_number',
            // 'max_number',
            // 'atributos',
            // 'reg_exp',
            // 'numerada',

            [
			
				'class' => 'yii\grid\ActionColumn',
				 'header' => 'Action',
                'template' => ' {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                     'class' => 'btn btn-default btn-xs showModalButton',
                        ]);
                        
   
                    }, //Primera columna encontrada id_pregunta                    
					'delete' => function($url, $model){
						$url2 = Url::toRoute(['fdpregunta/deletep','id' => $model->Id],true);
						return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url,[
							'title' => Yii::t('app', 'Delete'),
							'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?::'.$url2),
                            'data-method' => 'post',
						]);
					}
                                        
                                        
                ],
			
			
			],
        ],
    ]); ?>
</div>
