<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdCaudalAguaPublicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
if (!empty($capitulo)) {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => $capitulo, 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'fuentes' => $fuentes);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
} else {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => '', 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'fuentes' => $fuentes);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}
//$_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista) ;
//$this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="fd-caudal-agua-publicos-index">
        <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <div class="aplicativo">
    <p>
  <?php echo Html::a('Regresar', $_urlmiga, ['class' => 'btn btn-default']); ?>
    <?= ($btnadd === true) ? Html::button('Adicionar',
        ['value' => Url::to(['fdcaudalaguapublicos/createdetcapitulo',
                            'id_fmt' => $id_fmt,
                            'id_version' => $id_version,
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta,
                            'id_capitulo' => $id_capitulo,
                            'id_prta' => $id_prta,
                            'id_rpta' => $id_rpta,
                            'nom_prta' => $nom_prta,
                            'numerar' => $numerar,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos,
                            'antvista' => $antvista,
                            'migadepan' => $migadepan,
                            'focus' => $focus, 
                            'fuentes'=>$fuentes,
                            ]), 'title' => 'Adicionar',
        'class' => 'showModalButton btn btn-success', 'id'=>'boton']) : ''; ?>
       
     
    </p>
   <?php
        if ($botton === false) {
            $_adbutton = '{update}{delete}';
        } else {
            $_adbutton = '';
        }  
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_caudal_agua_publicos',
            'codigo',
            'enero',
            'febrero',
            'marzo',
            'abril',
            'mayo',
            'junio',
            'julio',
            'agosto',
            'septiembre',
            'octubre',
            'noviembre',
            'diciembre',
            //'id_conjunto_respuesta',
            //'id_pregunta',
            //'id_respuesta',
            //'id_capitulo',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => $_adbutton,
                'buttons' => [
                    'update' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$fuentes) {
                        $urlup = Url::toRoute(['fdcaudalaguapublicos/updatedetcapitulo',
                                                        'id' => $model->id_caudal_agua_publicos,
                                                        'id_fmt' => $id_fmt,
                                                        'id_version' => $id_version,
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta,
                                                        'id_capitulo' => $id_capitulo,
                                                        'id_prta' => $id_prta,
                                                        'id_rpta' => $id_rpta,
                                                        'nom_prta' => $nom_prta,
                                                        'numerar' => $numerar,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,
                                                        'migadepan' => $migadepan,
                                                        'focus' => $focus,
                                                        'fuentes'=>$fuentes,
                                                        ]);

                        return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value' => $urlup,
                                            'title' => 'Editar',
                                            'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                    }, 
                    'delete' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$fuentes) {
                        $url2 = Url::toRoute(['fdcaudalaguapublicos/deletep',
                                                        'id' => $model->id_caudal_agua_publicos,
                                                        'id_fmt' => $id_fmt,
                                                        'id_version' => $id_version,
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta,
                                                        'id_capitulo' => $id_capitulo,
                                                        'id_prta' => $id_prta,
                                                        'id_rpta' => $id_rpta,
                                                        'nom_prta' => $nom_prta,
                                                        'numerar' => $numerar,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,
                                                        'migadepan' => $migadepan,
                                                        'focus' => $focus,
                                                        'fuentes'=>$fuentes,], true);

                        return Html::button('<span class="glyphicon glyphicon-trash"></span>', ['value' => $url2,
                                        'title' => Yii::t('app', 'Borrar'),
                                        'data-method' => 'post',
                                        'class' => 'btn btn-default btn-xs',
                                        'data-confirm' => Yii::t('yii', 'Desea eliminar el registro'.'::'.$url2),
                                ]);
                    },
            ],
    ],
        ],
    ]); ?>
</div>
