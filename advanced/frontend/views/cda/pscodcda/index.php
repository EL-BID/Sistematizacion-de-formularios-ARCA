<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\PsCodCdaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generar CDA';
$this->params['breadcrumbs'][] = $this->title;
$regresarurl='cda/cdatramite/subproceso';
$_urlregresar = \Yii::$app->urlManager->createUrl([$regresarurl, 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]);

?>
<div class="ps-cod-cda-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
    
    
    <div class="aplicativo table-responsive">
   <!------------------div con class="aplicativo"-------------------------------------->
              <!----------------------------------Boton de Regresar---------------------------->
            <table>
                <tr>
                    <td>
                       <?php echo Html::button("Continuar",
                            ['class'=>'btn btn-default btn-xs',
                                'onclick'=>"window.location.href = '" . $_urlregresar . "';",
                                'data-toggle'=>'Regresar'
                            ]
                        ); ?>
                    </td>
                </tr>
            </table>
            

           <!----------------------------------Encabezado------------------------------------>
            <?= $encabezado ?>
  
           
           <p>
            <?= Html::button('Crear Código CDA', 
                ['value' =>Url::to(['cda/pscodcda/create',
                    'labelmiga'=>$labelmiga,
                    'id_cda_tramite'=>$id_cda_tramite,
                    'id_cproceso'=>$id_cproceso,
                    'actividadactual'=>$actividadactual,
                    'tipo'=>$tipo]), 'title' => 'Crear Código CDA',
                'class' => 'showModalButton btn btn-success']); ?>
           </p>
        
    
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                        'attribute'=>'cod_cda',
                        'label'=>'Código CDA'
                        ],

                        //'cod_cda',
                        [

                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acción',
                            'template' => ' {update}',
                            'buttons' => [
                                
                                'update' => function ($url, $model) use ($id_cda_tramite,$id_cproceso,$actividadactual,$labelmiga,$tipo){
                                        $url2 = Url::toRoute(['cda/pscodcda/update','id' => $model->id_cod_cda,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual,'labelmiga'=>$labelmiga,'tipo'=>$tipo],true);
                                        return Html::button('<span class="glyphicon glyphicon-pencil"/>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton','title'=>'Modificar Código CDA '
                                        ]);
                                }, //Primera columna encontrada cod_cda                    
                               


                        ],


                    ],
                    ],
                ]); ?>
    </div>
</div>
