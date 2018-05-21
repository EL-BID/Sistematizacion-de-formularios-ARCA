<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visita Técnica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-index">

    <?php Pjax::begin(['id' => 'visita']); ?>
    <h1 style="color:white;"><?= Html::encode($this->title) ?>
        <p style="display: inline-block;">
        <?php if($validaciones['agregar'] == TRUE){ echo
        Html::button('Agregar', 
        ['value' =>Url::to(['cda/cda-visita-tecnica/create','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]), 'title' => 'Nuevo Datos Visita Tecnica',
        'class' => 'showModalButton btn btn-success']);
        } ?>
    </p>
    </h1>
   

    <?= GridView::widget([
        'dataProvider' => $dataProviderVisitaTecnica,
        'filterModel' => $searchModelVisitaTecnica,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                
            [
                'label' => 'Tipo fuente observados',
                'attribute' =>'nomtfuente',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->asArray()->all(), 'id_tfuente', 'nom_tfuente'),
            ],
            [
                'label' => 'Subtipo fuente observados',
                'attribute' =>'nomsubtfuente',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaSubtipoFuente::find()->asArray()->all(), 'id_subtfuente', 'nom_subtfuente'),
            ],
             [
                 'label' => 'Uso/Aprovechamiento observados',
                'attribute' =>'nomusosolicitado',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaUsoSolicitado::find()->asArray()->all(), 'id_uso_solicitado', 'nom_uso_solicitado'),
            ],
            [
                'label' => 'Destino observados',
                'attribute' =>'nomdestino',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaDestino::find()->asArray()->all(), 'id_destino', 'nom_destino'),
            ],
            [
                'label' => 'Fuente observados',
                'attribute' => 'fuente_solicitada',

            ],
            
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                'visibleButtons' => [
                    'update' => $validaciones['editar'], // or whatever condition
                    
                ],
                'buttons' => [
                  
                    'update' => function ($url, $model) {

                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>Url::toRoute(['cda/cda-visita-tecnica/update','id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado                                          
                                        
                ],
			
			
            ],
        ],
    ]); ?>
    
    <?php Pjax::end(); ?>

    
    <?php Pjax::begin(['id' => 'coordenadas']); ?>
    
    <h1 style="color:white;"><?= Html::encode('Coordenadas') ?>
    
      <p style="display: inline-block;">
           <?php if($validaciones['editarC'] == TRUE){ echo
                 Html::button('Agregar', 
                ['value' =>Url::to(['cda/cda-visita-tecnica/createcoordenadas','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'id_reporte_informacion'=>$id_reporte_informacion]), 'title' => 'Coordenadas',
                'class' => 'showModalButton btn btn-success']); 
           } ?>
      </p>
    </h1>
    
   
    <?= GridView::widget([
        'dataProvider' => $dataProviderCoordenadas,
        'filterModel' => $searchModelCoordenadas,
        'id' => 'informacion_senagua',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'Longitud observados',
               'attribute' => 'longitud',
            ],
            ['label' => 'Latitud observados',
               'attribute' => 'latitud',
            ],
            ['label' => 'Altitud observados',
               'attribute' => 'altura',
            ],            
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} ',
                'visibleButtons' => [
                    'update' => $validaciones['editarC'], // or whatever condition
                    
                ],
                'buttons' => [
                  
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>Url::toRoute(['cda/cda-visita-tecnica/updatecoordenadas','id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado                    
                    
                                        
            ],
			
			
	],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    
</div>
