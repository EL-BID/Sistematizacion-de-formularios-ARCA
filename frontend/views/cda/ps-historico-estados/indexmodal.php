<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\PsHistoricoEstadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historico Estados CDA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-historico-estados-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <div class="aplicativo table-responsive">
        
        <!----------------------------------Boton de Regresar---------------------------->
        <?php echo Html::button('Regresar',
                ['class' => 'btn btn-default btn-xs',
                    'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/cda/pantallaprincipal'])."';",
                    'data-toggle' => 'Regresar',
                ]
            ); ?>
        
        <!---------------------------------Grilla-------------------------------------->
    <div class="aplicativo" >
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                ['attribute' => 'Nombre', 'value' => 'idEproceso.nom_eproceso'],
                ['attribute' => 'Usuario', 'value' => 'idUsuario.nombres'],
                'fecha_estado',
                'observaciones',
               // 'id_eproceso',
               // 'id_cproceso',
                // 'id_usuario',
                // 'id_actividad',
                // 'id_tgestion',

                /*[

                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'template' => ' {view} {update} {delete}',
                    'buttons' => [
                        'view' => function($url, $model){
                                return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                        'title' => Yii::t('app', 'View'),
                                        'data-method' => 'post',
                                ]);
                        },
                        'update' => function ($url, $model) {
                                return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                             'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                        }, //Primera columna encontrada id_hisotrico_cproceso
                        'delete' => function($url, $model){
                                $url2 = Url::toRoute(['ps-historico-estados/deletep','id' => $model->id_hisotrico_cproceso],true);
                                return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-method' => 'post',
                                        'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                                ]);
                        }


                    ],


                ],*/
            ],
        ]); ?>
    </div>
    
    </div>
</div>
