<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Técnicos de la Solicitud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-index">

    <?php Pjax::begin(['id' => 'datos']); ?>
    <h1 style="color:white;"><?= Html::encode($this->title) ?>
        <p style="display: inline-block;">
        <?php if($validaciones['editar'] == TRUE){ echo
        Html::button('Agregar', 
        ['value' =>Url::to(['cda/cda-datos-tecnicos/create','id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]), 'title' => 'Nuevo Datos Técnicos de la Solicitud',
        'class' => 'showModalButton btn btn-success']);
        } ?>
    </p>
    </h1>
   

    <?= GridView::widget([
        'dataProvider' => $dataProviderReporteInformacion,
        'filterModel' => $searchModelReporteInformacion,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'longitud',
            'latitud',
            'altura',
            'nomprovincia',
            'nomcanton',
            'nomparroquia',
            'sector_solicitado',
            'fuente_solicitada',
            [
            'attribute' =>'nomtfuente',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->asArray()->all(), 'id_tfuente', 'nom_tfuente'),
            ],
            [
                'attribute' =>'nomsubtfuente',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaSubtipoFuente::find()->asArray()->all(), 'id_subtfuente', 'nom_subtfuente'),
            ],
            [
                'attribute' =>'caracteristica',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaCaracteristica::find()->asArray()->all(), 'id_caracteristica', 'nom_caracteristica'),
            ],
            'q_solicitado',
             [
                'attribute' =>'nomusosolicitado',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaUsoSolicitado::find()->asArray()->all(), 'id_uso_solicitado', 'nom_uso_solicitado'),
            ],
            [
                'attribute' =>'nomdestino',
                'filter'=> yii\helpers\ArrayHelper::map(\common\models\cda\CdaDestino::find()->asArray()->all(), 'id_destino', 'nom_destino'),
            ],

            'tiempo_years',
            
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => '  {update} {decision} ',
                'visibleButtons' => [
                    'update' => $validaciones['editar'], // or whatever condition
                    
                ],
                'buttons' => [
                  
                    'update' => function ($url, $model) {

                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>Url::toRoute(['cda/cda-registro-datos/update','id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado                                          
                      
                            
                    'decision' => function ($url, $model) {

                            return Html::button('<span class="glyphicon glyphicon-pencil">Decisión</span>',  ['value'=>Url::toRoute(['cda/cda-registro-datos/updatedecision','id' => $model->id_reporte_informacion]),
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada sector_solicitado          
                ],
			
			
            ],
        ],
    ]); ?>
    
    <?php Pjax::end(); ?>

  
</div>
