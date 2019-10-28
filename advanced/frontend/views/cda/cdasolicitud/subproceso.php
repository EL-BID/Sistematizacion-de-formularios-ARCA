<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\CdaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



if($tipo == 'Solicitud'){
    $_tipo = '1';
}else{
    $_tipo = '2';
}

$_urlmiga = array($labelmiga);
$_labelmiga = $labelmiga;

$this->title = 'Detalle '.$tipo;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud', 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>

    <!------------------div con class="aplicativo"-------------------------------------->
    <div class="aplicativo table-responsive">

        <!----------------------------------Boton de Regresar---------------------------->
        <?php echo Html::button('Regresar',
                ['class' => 'btn btn-default btn-xs',
                    'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl([$labelmiga])."';",
                    'data-toggle' => 'Regresar',
                ]
            ); ?>

        <table class="table table-bordered">
            <!----------------------------INICIA CABEZOTE DATOS BASICOS --------------------------------->
            <tr>
                <td class="datosbasicos1"> N&uacute;mero <?= $tipo; ?> </td>
                <td class="datosbasicos2"><?= $encabezado['numero']; ?> </td>
                <td class="datosbasicos1"> Fecha Ingreso </td>
                <td class="datosbasicos2"><?= $encabezado['fecha_ingreso']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> C&oacute;digo ARCA / SENAGUA </td>
                <td class="datosbasicos2"><?= $encabezado['qpxarca'].' / '.$encabezado['qpxsenagua']; ?></td>
                <td class="datosbasicos1"> Estado </td>
                <td class="datosbasicos2"><?= $encabezado['nom_eproceso']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado['nombres']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha &Uacute;ltima Actividad </td>
                <td class="datosbasicos2"><?= $encabezado['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha &Uacute;ltimo Estado </td>
                <td class="datosbasicos2"><?= $encabezado['ult_fecha_estado']; ?></td>
            </tr>
           <!-----------------------------------FIN CABEZOTE DATOS BASICOS ------------------------------->

           <!---------------------------------------------INICIA ACTIVIDADES-------------------------------------------------------->
            <!------------------------Los estilos estan en web/css/site------------------------------------------------------------>
            <tr>
                <td colspan="4">
                    <table width="100%" class="actividades">
                        <thead>
                        <tr class='titulos'>
                            <td>Fecha de Creaci&oacute;n</td><td>Descripci&oacute;n de la Actividad</td><td>Causas</td>
                        </tr>
                        </thead>
                        <tbody>

                    <?php
                    $_nomactividadactual = $actividades[0]['idActividad']['nom_actividad'];
                    $a = 1;
                    foreach ($actividades as $_clave) {
                        $_clase = ($a == 1) ? 'inicial' : 'siguiente'; ?>
                        <tr class='<?php echo $_clase; ?>'>
                            <td><?= $_clave['fecha_creacion']; ?></td>
                            <td><?= $_clave['idActividad']['nom_actividad']; ?></td>
                            <td><?= $_clave['causas']; ?></td>
                        </tr>
                    <?php

                    ++$a;
                    }

                    ?>
                        </tbody>
                    </table>

                </td>
            </tr>
            
            
            <!---------------INICIA ACCIONES DINAMICAS Y ESTATICAS -------------------------->
             <tr>
                <td colspan="4">
                    <table width="100%">
                        <tr>
                        <?php
                        if ($editarActividad === true) {
                            
                            //BOTON DE DETALLE ACTIVIDAD=============================================================================================
                            if(!empty($actividadactual['subpantalla'])){
                                
                                $_ulrsend = yii\helpers\Url::toRoute([$actividadactual['subpantalla'], 
                                                                      'labelmiga' => $labelmiga,
                                                                      'id_cda_solicitud' => $encabezado['id_cda_solicitud'],
                                                                      'id_cproceso'=> $encabezado['id_cproceso'], 
                                                                      'actividadactual' =>$actividadactual['id_actividad'],
                                                                      'tipo'=>$_tipo]);
                                $_actividadindependiente = [6,13];
                                
                                if (in_array($asignaciones['ult_id_actividad'], $_actividadindependiente)) {
                                   
                                    echo '<td>'.Html::button('DETALLE ACTIVIDAD',
                                                            ['class' => 'btn btn-default btn-xs',
                                                                    'onclick' => "window.location.href = '".$_ulrsend."';",
                                                                    'data-toggle' => 'Regresar',
                                                            ]
                                                    ).'</td>';
                                    
                                }else{
                                    
                                    echo '<td>'.yii\helpers\Html::button('DETALLE ACTIVIDAD',
                                    ['value' => $_ulrsend,
                                     'class' => 'btn btn-default btn-xs showModalButton', 'title' => $_nomactividadactual,
                                    ]).'</td>';
                                    
                                }
                            }
                            //FIN BOTON DETALLE ACTIVIDAD==========================================================
                            
                            //Botones para actividad siguientes ===========================================================
                            if($habContinuidad == TRUE){
                                foreach($actividadruta as $clave){

                                    //Variables a pasar ====================================================================
//                                    $_vurlnext = ['cda/ps-cactividad-proceso/responsableactividad', 
//                                                    'var6' => $encabezado['id_cproceso'],
//                                                    'actividadactual' =>$clave['id_actividad_origen'],
//                                                    'var3'=>$clave['id_actividad_destino'],
//                                                    'var5'=>'1',    
//                                                    'var2'=>$labelmiga,
//                                                    'var4'=>$encabezado['id_cda_solicitud']];   
//                                    $_ulrsendnext = yii\helpers\Url::toRoute($_vurlnext);
//                                 
//                                    echo '<td>'.yii\helpers\Html::button($clave['idActividadDestino']['nom_actividad'],
//                                    ['value' => $_ulrsendnext,
//                                     'class' => 'btn btn-default btn-xs showModalButton', 'title' => 'Asigna Responsable',
//                                    ]).'</td>';

                                       echo '<td>'.Html::button($clave['idActividadDestino']['nom_actividad'],
                                                                 ['class' => 'btn btn-default btn-xs',
                                                                         'onclick' => "window.location.href = '".yii\helpers\Url::toRoute(['cda/ps-cactividad-proceso/habupdate', 
                                                                                                                                             'proceso' => $encabezado['id_cproceso'],
                                                                                                                                             'actividadactual' =>$clave['id_actividad_origen'],
                                                                                                                                             'actividadruta'=>$clave['id_actividad_destino'],
                                                                                                                                             'subpantalla'=>$actividadactual['subpantalla'],    
                                                                                                                                             'labelmiga'=>$labelmiga,
                                                                                                                                             'id_cda_solicitud'=>$encabezado['id_cda_solicitud'],
                                                                                                                                             'tipo'=>$_tipo ], true)."';",
                                                                         'data-toggle' => 'Regresar',
                                                                 ]
                                                         ).'</td>';
                                }
                            }
                            
                            
                         }

                        ?>
                        </tr>
                    </table>
                </td>
            </tr>

                        
         </table>
    </div>

</div>
