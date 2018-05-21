<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdUbicacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
if(!empty($capitulo)){
    $_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus) ;
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
}else{
    $_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>'','cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus) ;
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}

//$_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista) ;
//$this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1>
</div>
<div class="fdubicacion-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="aplicativo">
	<p>
        <?= ($btnadd === TRUE )? Html::button('Adicionar', 
        ['value' =>Url::to(['fdubicacion/createdetcapitulo',
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
                            'migadepan'=>$migadepan,
                            'focus'=>$focus]), 'title' => 'Adicionar',
        'class' => 'showModalButton btn btn-success']):''; ?>
        
         <?php echo Html::a('Regresar', $_urlmiga, ['class'=>'btn btn-default']);  ?>
    </p>
    
    <!-----habilitando delete con los permisos dle usuario--------------------------------------------------------->
    <?php
        if($botton === FALSE ){
            $_adbutton = "{update}{delete}";
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
                    'header' => 'Acción',
                    'template' => $_adbutton,
                    //'template' => ' {view} {update} {delete}',
                    'buttons' => [
                        /*'view' => function($url, $model){
                                return Html::a('<span class="glyphicon">Ver</span>',Yii::getAlias($url),[
                                        'title' => Yii::t('app', 'View'),
                                        'data-method' => 'post',
                                ]);
                        },*/
                        'update' => function ($url,$model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus) {
                                $urlup = Url::toRoute(['fdubicacion/updatedetcapitulo',
                                                        'id' => $model->id_ubicacion,
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
                                                        'migadepan'=>$migadepan,
                                                        'focus'=>$focus
                                                        ]);

                                return Html::button('<span class="glyphicon glyphicon-pencil"></span> Editar',  ['value'=>$urlup,
											'title'=>'Editar',
                                             'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                        }, //Primera columna encontrada id_ubicacion                   
                        'delete' => function($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus) {
                                $url2 = Url::toRoute(['fdubicacion/deletep',
                                                        'id' => $model->id_ubicacion,
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
                                                        'migadepan'=>$migadepan,
                                                        'focus'=>$focus],true);
                                /*return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-method' => 'post',
                                        'data-confirm' => Yii::t('yii',  'Desea eliminar el registro'.'::'.$url2),
                                ]);*/
								return Html::button('<span class="glyphicon glyphicon-trash"></span> Borrar',  ['value'=>$url2,
                                        'title' => Yii::t('app', 'Borrar'),
										'class' => 'btn btn-default btn-xs',
                                        'data-method' => 'post',
                                        'data-confirm' => Yii::t('yii',  'Desea eliminar el registro'.'::'.$url2),
                                ]);
                        }             
                    ],
			
			
	],
                    
        ['class' => 'yii\grid\SerialColumn'],
        [
          'attribute'=>'Provincia',
          'value'=>'codProvincia.nombre_provincia', 
            
        ],
        [
          'attribute'=>'Cantón',
          'value'=>'codCanton.nombre_canton', 
        ],
        [
          'attribute'=>'Parroquia',
          'value'=>'codParroquia.nombre_parroquia',
        ],
        [
          'attribute'=>'Demarcación',
          'value'=>'idDemarcacion.nombre_demarcacion', 
        ],
        [
          'attribute'=>'Centro Atención al Ciudadano',
          'value'=>'codCentroAtencionCiudadano.nom_centro_atencion_ciudadano',
        ],
        //'idDemarcacion.nombre_demarcacion',
        'descripcion_ubicacion',
        // 'id_conjunto_respuesta',
        // 'id_pregunta',
        // 'id_respuesta',
        //'id_ubicacion',            
        ],
    ]); ?>
    </div>
</div>
