<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\pqrs\PqrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PQRS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pqrs-index">

<div class="headSection">
    <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button("<span>Crear PQRS</span>",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['pqrs/pqrs/create']) . "';",
                                                    'data-toggle'=>'Crear PQRS',
                                                ]
                                            ); ?>
        
        <?= Html::button("<span>Gestión Actividades</span>",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor','tipo'=>'2']) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            ); ?>
    </p>
    <div class="aplicativo">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
                'style'=>'overflow: auto; word-wrap: break-word;'
            ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            ['attribute'=>'numero','value'=>'idCproceso.numero','label'=>'Numero de PQRS'],
            
            ['attribute'=>'nom_eproceso',
            'value'=>'estado.nom_eproceso',
            'header'=>'Estado',
            'filter'=> Html::activeDropDownList($searchModel, 
                            'nom_eproceso', 
                            ArrayHelper::map($listestados, 'id_eproceso', 'nom_eproceso'),   
                            ['class' => 'form-control', 'multiple' => true]
                            ),],
            
            ['attribute'=>'nom_actividad',
                'value'=>'actividad.nom_actividad',
                'header'=>'Actividad',
                'filter' => Html::activeDropDownList($searchModel, 
                            'nom_actividad', 
                            ArrayHelper::map($listactividades, 'id_actividad', 'nom_actividad'),   
                            ['class' => 'form-control', 'multiple' => false,'prompt' => '']
                            ),],
            
            ['attribute'=>'nombres',
                'value'=>'usuario.nombres',
                'header'=>'Responsable',
                'filter' => Html::activeDropDownList($searchModel, 
                            'nombres', 
                            ArrayHelper::map($listresponsables, 'id_usuario', 'nombres'),   
                            ['class' => 'form-control', 'multiple' => false,'prompt' => '',
                                'options'=>(Yii::$app->user->identity->codRols[0]->cod_rol==1)? array(Yii::$app->user->identity->id_usuario=>array('selected'=>'selected')):'']
                            ),],
            
            ['attribute'=>'fecha_solicitud',
                'value'=>'idCproceso.fecha_solicitud',
                'header'=>'Fecha Solicitud',
                'format' =>  ['date', 'php:d-m-Y'],
                            'filter' => \yii\jui\DatePicker::widget(
                                                            ['language' => 'es', 
                                                            'model'=>$searchModel,
                                                            'dateFormat' => 'dd-MM-yyyy',
                                                            'class' => 'yii\grid\RangeFilter',
                                                            'attribute'=>'fecha_solicitud',
                                                            'clientOptions' => [
                                                                    'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
                                                                    'changeYear' => true,			//Permitir cambio de año
                                                                    'changeMonth' => true			//Permitir cambio de Mes
                                                            ]			
                                                            ]),
                            'options' => ['width' => '200']],
            
            ['attribute'=>'ult_fecha_actividad',
                'value'=>'idCproceso.ult_fecha_actividad',
                'header'=>'Fecha Ultima Actividad',
                'format' =>  ['date', 'php:d-m-Y'],
                            'filter' => \yii\jui\DatePicker::widget(
                                                            ['language' => 'es', 
                                                            'model'=>$searchModel,
                                                            'dateFormat' => 'dd-MM-yyyy',
                                                            'class' => 'yii\grid\RangeFilter',
                                                            'attribute'=>'ult_fecha_actividad',
                                                            'clientOptions' => [
                                                                    'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
                                                                    'changeYear' => true,			//Permitir cambio de año
                                                                    'changeMonth' => true			//Permitir cambio de Mes
                                                            ]			
                                                            ]),
                            'options' => ['width' => '200']],
            
            
            ['attribute'=>'ult_fecha_estado',
                'value'=>'idCproceso.ult_fecha_estado',
                'header'=>'Fecha Ultimo Estado',
                'format' =>  ['date', 'php:d-m-Y'],
                            'filter' => \yii\jui\DatePicker::widget(
                                                            ['language' => 'es', 
                                                            'model'=>$searchModel,
                                                            'dateFormat' => 'dd-MM-yyyy',
                                                            'class' => 'yii\grid\RangeFilter',
                                                            'attribute'=>'ult_fecha_estado',
                                                            'clientOptions' => [
                                                                    'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
                                                                    'changeYear' => true,			//Permitir cambio de año
                                                                    'changeMonth' => true			//Permitir cambio de Mes
                                                            ]			
                                                            ]),
                            'options' => ['width' => '200']],


            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                //'template' => ' {view} {update} {delete}',
                'template' => ' {view} {estados}',
                'buttons' => [
                    
                    
                     'view' => function($url, $model){
                                    return Html::button("<span class='glyphicon glyphicon-eye-open' />",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['pqrs/detallepqrs/index','numero' => $model->idCproceso['numero'],'id_pqr'=>$model->id_pqrs]) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            );

                        },

                        'estados' => function($url, $model){
                                    return Html::button("<span class='glyphicon glyphicon-hourglass' />",
                                                ['class'=>'btn btn-default btn-xs',
                                                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/ps-historico-estados/indexestados','id_cproceso' => $model['id_cproceso'],'tipo'=>'3']) . "';",
                                                    'data-toggle'=>'Detalle Proceso',
                                                ]
                                            );
                        },
                    
                    
                    
                    /*'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_pqrs                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['pqrs/deletep','id' => $model->id_pqrs],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                            ]);
                    }*/
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
    
    </div>
</div>
