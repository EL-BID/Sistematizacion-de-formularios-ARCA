<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Detalle PQRS';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cda-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    
    <!------------------div con class="aplicativo"-------------------------------------->
    <div class="aplicativo table-responsive">
        
        <!----------------------------------Boton de Regresar---------------------------->
        <?php echo Html::button("Regresar",
                ['class'=>'btn btn-default btn-xs',
                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['pqrs/pqrs/index']) . "';",
                    'data-toggle'=>'Regresar'
                ]
            ); ?>
        
        <table class="table table-bordered">
            <!----------------------------INICIA CABEZOTE DATOS BASICOS --------------------------------->
            <tr>
                <td class="datosbasicos1"> Numero PQRS </td>
                <td class="datosbasicos2">
                    <table width="100%">
                        <tr>
                            <td width="50%"><?= $encabezado->idCproceso['numero']; ?></td>
                            <td width="50%" align="center"> 
                                <?php
                                  echo Html::button("Ver",
                                            ['class'=>'btn btn-default btn-xs',
                                                'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['pqrs/detallepqrs/datosbasicos','id_pqr'=>$encabezado->id_pqrs]) . "';",
                                                'data-toggle'=>'Datos Basicos'
                                            ]
                                        );
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="datosbasicos1"> Fecha Ingreso </td>
                <td class="datosbasicos2"><?= $encabezado->fecha_recepcion; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Numero de Quipux </td>
                <td class="datosbasicos2"><?= $encabezado->idCproceso['num_quipux']; ?></td>
                <td class="datosbasicos1"> Estado </td>
                <td class="datosbasicos2"><?= $encabezado->estado['nom_eproceso']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado->usuario['nombres']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado->idCproceso['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha Ultima Actividad </td>
                <td class="datosbasicos2"><?= $encabezado->idCproceso['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha Ultimo Estado </td>
                <td class="datosbasicos2"><?= $encabezado->idCproceso['ult_fecha_estado']; ?></td>
            </tr>
      
        <!-----------------------------------FIN CABEZOTE DATOS BASICOS -------------------------------> 
        
        <!----------------------------INICIA ACCIONES GENERALES---------------------------------------->
            <tr>
                <td colspan="4"> 
                    <table width="100%">
                        <tr>
                            
                    <?php 
                            /**************************IMPRIMIENDO BOTON DATOS BASICOS*******************************/
                            if($_showdatosbasicos === TRUE){
                                
                                echo "<td>".yii\helpers\Html::button("EDITAR DATOS BASICOS", 
                                                        ["value"=>yii\helpers\Url::toRoute([$_urldatosbasicos,'id_pqr'=>$encabezado->id_pqrs],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Datos Basicos'
                                                        ])."</td>";
                            }
                            
                            echo "<td>".yii\helpers\Html::button("HISTORICO ESTADOS", 
                                                        ["value"=>yii\helpers\Url::toRoute(['cda/ps-historico-estados/indexestados','id_cproceso' => $encabezado->id_cproceso,'tipo'=>'4'],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Historico'
                                                        ])."</td>";
                            
                            
                           echo "<td>".yii\helpers\Html::button("OFICIOS RELACIONADOS", 
                                                        ["value"=>yii\helpers\Url::toRoute(["cda/ps-actividad-quipux/indexdetproceso",'id_cproceso'=>$encabezado->id_cproceso],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Oficios Relacionados'
                                                        ])."</td>";
                            
                            echo "<td>".yii\helpers\Html::button("RESPONSABLES", 
                                                        ["value"=>yii\helpers\Url::toRoute(["cda/ps-responsables-proceso/indexdetproceso",'id_cproceso'=>$encabezado->id_cproceso],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Responsables'
                                                        ])."</td>";
                            
                           /* if($validaciones['asignarresponable'] === TRUE){
                                echo "<td>".yii\helpers\Html::button("ASIGNAR RESPONSABLES", 
                                                            ["value"=>yii\helpers\Url::toRoute(["cda/ps-responsables-proceso/createdetproceso",'id_cproceso'=>$id_cproceso,'id_cda'=>$id_cda],true),
                                                             "class" => "btn btn-default btn-xs showModalButton"
                                                            ])."</td>";
                            }*/
                    ?>
                        </tr>
                    </table>
                </td>
            </tr>
        
            <!---------------------------------------------INICIA ACTIVIDADES-------------------------------------------------------->
            <!------------------------Los estilos estan en web/css/site------------------------------------------------------------>
            <tr>
                <td colspan="4"> 
                    <table width="100%" class="actividades">
                        <tr>
                            <td>Fecha de Creacion</td><td>Descripcion de la Actividad</td>
                        </tr>
                    
                    <?php
                    foreach($actividades as $_clave){
                    ?>
                        <tr>
                            <td><?= $_clave['fecha_creacion']; ?></td>
                            <td><?= $_clave['idActividad']['nom_actividad']; ?></td>
                        </tr>
                    <?php
                    }
        
                    ?>
                    </table>    
                
                </td>
            </tr>
            
         <!------------------------------INICIA ACCIONES ESTATICAS Y DINAMICAS--------------------------------------------------->
            <tr>
                <td colspan="4">
                    <table width="100%">
                        <tr>
                        <?php
                        if($edicionactividad === TRUE){
                             echo "<td>".yii\helpers\Html::button("EDITAR ACTIVIDAD", 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/updatepqrs",'id_cactividad_proceso'=>$ultimacactividadproceso,'id_pqrs'=>$encabezado->id_pqrs,'numero'=>$encabezado->idCproceso['numero']],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Editar Actividad'
                                    ])."</td>";
                             
                             
                            echo "<td>".yii\helpers\Html::button("ASIGNAR RESPONSABLE DE LA ACTIVIDAD", 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/responsable",'id'=>$ultimacactividadproceso,'tipo'=>'1','id_pqrs'=>$encabezado->id_pqrs,'numero'=>$encabezado->idCproceso['numero']],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Asignar Responsable de la Actividad'
                                    ])."</td>";
                        }
                        


                        
                       if(!empty($encabezado->actividad['subpantalla'])){
                            
                           /*if($validaciones['subpantalla'] == 'cda/cda/analisis'){
                               $_ulrsend = yii\helpers\Url::toRoute([$validaciones['subpantalla'],'id_cda'=>$id_cda,'id_cproceso'=>$id_cproceso],true);
                           }else if($validaciones['subpantalla'] == 'cda/cda/updateproceso'){
                                $_ulrsend = yii\helpers\Url::toRoute([$validaciones['subpantalla'],'id_cda'=>$id_cda,'tipo' =>2,'ult_id_actividad'=>$ult_id_actividad],true);
                           }else{
                               $_ulrsend = yii\helpers\Url::toRoute([$validaciones['subpantalla'],'id_cda'=>$id_cda],true);
                           } */
                           
                           $_ulrsend = yii\helpers\Url::toRoute([$encabezado->actividad['subpantalla'],'id_pqrs'=>$encabezado->id_pqrs,'numero'=>$encabezado->idCproceso['numero'],'id_cproceso'=>$encabezado->id_cproceso]);
                            
                           echo "<td>".yii\helpers\Html::button("DETALLE ACTIVIDAD", 
                                    ["value"=>$_ulrsend,
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Detalle Actividad'
                                    ])."</td>";
                           
                        }
                        
                        
                        if(!empty($encabezado->actividad['id_tactividad'] == 1)){
                        
                           echo "<td>".yii\helpers\Html::button("REGISTRAR GESTION", 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/updatepqrs",'id_cactividad_proceso'=>$ultimacactividadproceso,'id_pqrs'=>$encabezado->id_pqrs,'numero'=>$encabezado->idCproceso['numero']],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Registrar Gestion'
                                    ])."</td>";
                           
                        }
                        
                        
                        //=================================================acciones dinamicas ================================================//
                        if($validaciones['dinamicaguardar'] == TRUE){
                            
                           echo "<td>".yii\helpers\Html::button($validaciones['nom_actividad'], 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/habupdatepqrs",'id_cproceso'=>$encabezado->id_cproceso,'id_pqrs'=>$encabezado->id_pqrs,'id_actividad_destino'=>$validaciones['id_actividad_destino'],'id_cactividad_proceso'=>$ultimacactividadproceso,'id_eproceso'=>$validaciones['id_eproceso'],'id_actividad_origen'=>$validaciones['id_actividad_origen'],'numero'=>$encabezado->idCproceso['numero']],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>$validaciones['nom_actividad']
                                    ])."</td>";
                           
                        }
                        
                        //pscactividadproceso/updatedetproceso
                         if($validaciones['dinamicaactividad'] == TRUE){
                            
                           echo "<td>".yii\helpers\Html::button($validaciones['nom_actividad'], 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/adddestinopqrs",'id_cproceso'=>$encabezado->id_cproceso,'id_pqrs'=>$encabezado->id_pqrs,'id_actividad_destino'=>$validaciones['id_actividad_destino'],'id_cactividad_proceso'=>$ultimacactividadproceso,'id_eproceso'=>$validaciones['id_eproceso'],'id_actividad_origen'=>$validaciones['id_actividad_origen'],'numero'=>$encabezado->idCproceso['numero']],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>$validaciones['nom_actividad']
                                    ])."</td>";
                           
                        }
                        ?>
                        </tr>
                    </table>
                </td>
            </tr>
            
         </table>
        
        
    </div>    
   
</div>
