<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdCoordenadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
$_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista) ;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="fd-coordenada-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="text-align:right">
        <?= ($btnadd === TRUE )? Html::button('Adicionar', 
        ['value' =>Url::to(['fdcoordenada/createdetcapitulo',
                            'id_fmt'=>$id_fmt,
                            'id_version'=>$id_version,
                            'id_conj_prta'=>$id_conj_prta,
                            'id_cnj_rpta'=>$id_cnj_rpta,
                            'id_capitulo'=>$id_capitulo,
                            'id_prta'=>$id_prta,
                            'id_rpta'=>$id_rpta,
                            'nom_prta'=>$nom_prta,
                            'numerar'=>$numerar, 
                            'estado' => $estado,
                            'capitulo'=>$capitulo,
                            'cantones'=>$cantones,
                            'provincia'=>$provincia,
                            'parroquias'=>$parroquias,
                            'periodos'=>$periodos,
                            'antvista'=>$antvista,
                            'migadepan'=>$migadepan]), 'title' => 'Adicionar',
        'class' => 'showModalButton btn btn-success']):''; ?>
    </p>
    
    
     <!-----habilitando delete con los permisos dle usuario--------------------------------------------------------->
    <?php
        if($botton === FALSE ){
            $_adbutton = "{delete}{update}";
        }else{
            $_adbutton = "";
        }
    
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
			
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'template' => $_adbutton,
                    //'template' => ' {view} {update} {delete}',
                    'buttons' => [
                        /*'view' => function($url, $model){
                                return Html::a('<span class="glyphicon">Ver</span>',Yii::getAlias($url),[
                                        'title' => Yii::t('app', 'View'),
                                        'data-method' => 'post',
                                ]);
                        },*/
                        'update' => function ($url,$model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista) {
                                $urlup = Url::toRoute(['fdcoordenada/updatedetcapitulo',
                                                        'id' => $model->id_coordenada,
                                                        'id_fmt'=>$id_fmt,
                                                        'id_version'=>$id_version,
                                                        'id_conj_prta'=>$id_conj_prta,
                                                        'id_cnj_rpta'=>$id_cnj_rpta,
                                                        'id_capitulo'=>$id_capitulo,
                                                        'id_prta'=>$id_prta,
                                                        'id_rpta'=>$id_rpta,
                                                        'nom_prta'=>$nom_prta,
                                                        'numerar'=>$numerar, 
                                                        'estado' => $estado,
                                                        'capitulo'=>$capitulo,
                                                        'cantones'=>$cantones,
                                                        'provincia'=>$provincia,
                                                        'parroquias'=>$parroquias,
                                                        'periodos'=>$periodos,
                                                        'antvista'=>$antvista,
                                                        'migadepan'=>$migadepan
                                                        ]);

                                return Html::button('<span class="glyphicon">Editar</span>',  ['value'=>$urlup,
                                             'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                        }, //Primera columna encontrada id_ubicacion                    
                        'delete' => function($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista) {
                                $url2 = Url::toRoute(['fdcoordenada/deletep',
                                                        'id' => $model->id_coordenada,
                                                        'id_fmt'=>$id_fmt,
                                                        'id_version'=>$id_version,
                                                        'id_conj_prta'=>$id_conj_prta,
                                                        'id_cnj_rpta'=>$id_cnj_rpta,
                                                        'id_capitulo'=>$id_capitulo,
                                                        'id_prta'=>$id_prta,
                                                        'id_rpta'=>$id_rpta,
                                                        'nom_prta'=>$nom_prta,
                                                        'numerar'=>$numerar, 
                                                        'estado' => $estado,
                                                        'capitulo'=>$capitulo,
                                                        'cantones'=>$cantones,
                                                        'provincia'=>$provincia,
                                                        'parroquias'=>$parroquias,
                                                        'periodos'=>$periodos,
                                                        'antvista'=>$antvista,
                                                        'migadepan'=>$migadepan],true);
                                return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-method' => 'post',
                                        'data-confirm' => Yii::t('yii',  'Desea eliminar el registro'.'::'.$url2),
                                ]);
                        }             
                    ],
			
			
            ],
            //['class' => 'yii\grid\SerialColumn'],

            'id_coordenada',
            'x',
            'y',
            'altura',
            'longitud',
            'latitud',
            // 'id_tcoordenada',
            // 'id_conjunto_respuesta',
            // 'id_pregunta',
            // 'id_respuesta',

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
                    }, //Primera columna encontrada id_coordenada                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['poc/fd-coordenada/deletep','id' => $model->id_coordenada],true);
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
