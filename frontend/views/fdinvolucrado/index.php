<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdInvolucradoSearch */
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
<div class="fd-involucrado-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <div class="aplicativo">
	 <p>
        
         <?= ($btnadd === TRUE )? Html::button('Adicionar', 
        ['value' =>Url::to(['fdinvolucrado/createdetcapitulo',
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
    
    <!-----habilitando delete con los permisos del usuario--------------------------------------------------------->
    <?php
        if($botton === FALSE ){
            $_adbutton = "{update}{delete}";
        }else{
            $_adbutton = "";
        }
    
    ?>
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => $_adbutton,
                'buttons' => [
                   /* 'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },*/
                   'update' => function ($url,$model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus) {
                                $urlup = Url::toRoute(['fdinvolucrado/updatedetcapitulo',
                                                        'id' => $model->id_involucrado,
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
											'title' =>'Editar',
                                             'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                        }, //Primera columna encontrada id_ubicacion                    
                        'delete' => function($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus) {
                                $url2 = Url::toRoute(['fdinvolucrado/deletep',
                                                        'id' => $model->id_involucrado,
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
                                        'data-method' => 'post',
										'class' => 'btn btn-default btn-xs',
                                        'data-confirm' => Yii::t('yii',  'Desea eliminar el registro'.'::'.$url2),
                                ]);
                        } 
                                        
                                        
                    ],
            ],
            //['class' => 'yii\grid\SerialColumn'],
            //'id_involucrado',
            'nombre',
            'telefono_convencional',
            'celular',
            'correo_electronico',
            // 'id_conjunto_respuesta',
            // 'id_pregunta',
            // 'id_respuesta',

            		
			
	],

    ]); ?>
    </div>
</div>
