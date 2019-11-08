<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;


/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdOperacionplantaApscomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
if (!empty($capitulo)) {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => $capitulo, 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'idjunta' => $idjunta);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
} else {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => '', 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'idjunta' => $idjunta);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-operacionplanta-apscom-index">

     <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1>
    </div>    
<div class="aplicativo">
    <p>
     
        <?= ($btnadd === true) ? Html::button('Adicionar',
        ['value' => Url::to(['fdoperacionplantaapscom/createdetcapitulo',
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
                            'idjunta' => $idjunta,
                            ]), 'title' => 'Adicionar',
        'class' => 'showModalButton btn btn-success', ]) : ''; ?>    
    <?php echo Html::a('Regresar', $_urlmiga, ['class' => 'btn btn-default']); ?>        
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

            //'id_operacionplanta',                               
            ['attribute' => 'manual_operacion', 'label' => 'Manual operación' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->manual_operacion])
                        ->one(); 
                if(count($_nombrevalor)>0)
                 return $_nombrevalor->nom_opcion_select;
                else return $_nombrevalor="";
            }
            ],            
            ['attribute' => 'operacion_planta', 'label' => 'Operación planta' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->operacion_planta])
                        ->one();                 
                if(count($_nombrevalor)>0)
                 return $_nombrevalor->nom_opcion_select;
                else return $_nombrevalor="";
            }
            ],            
            ['attribute' => 'personal_capacitado', 'label' => 'Personal capacitado' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->personal_capacitado])
                        ->one();                 
                if(count($_nombrevalor)>0)
                 return $_nombrevalor->nom_opcion_select;
                else return $_nombrevalor="";
            }
            ],            
            ['attribute' => 'frecuencia_mantenimiento', 'label' => 'Frecuencia mantenimiento' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->frecuencia_mantenimiento])
                        ->one();                 
                if(count($_nombrevalor)>0)
                 return $_nombrevalor->nom_opcion_select;
                else return $_nombrevalor="";
            }
            ],            
            ['attribute' => 'problemas', 'label' => 'Problemas' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->problemas])
                        ->one();                 
                if(count($_nombrevalor)>0)
                 return $_nombrevalor->nom_opcion_select;
                else return $_nombrevalor="";
            }
            ],
            'especifique',
            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$idjunta) {
                     $urlup = Url::toRoute(['fdoperacionplantaapscom/updatedetcapitulo',
                                                        'id' => $model->id_operacionplanta,
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
                                                        'idjunta' => $idjunta,
                                                        ]);

                        return Html::button('<span class="glyphicon glyphicon-pencil"></span> Editar', ['value' => $urlup,
                                            'title' => 'Editar',
                                            'class' => 'btn btn-default btn-xs showModalButton',
                                ]);
                    }, //Primera columna encontrada id_fuentehidrica
                    'delete' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$idjunta) {
                        $url2 = Url::toRoute(['fdoperacionplantaapscom/deletep',
                                                        'id' => $model->id_operacionplanta,
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
                                                        'idjunta' => $idjunta,
                                                        ], true);

                        return Html::button('<span class="glyphicon glyphicon-trash"></span> Borrar', ['value' => $url2,
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
