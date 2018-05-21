<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;						//Para Menu Horizontal
use yii\bootstrap\NavBar;					//Para Menu Horizontal
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\sidenav\SideNav;					//Para separacion Menu Vertical
use kartik\popover\PopoverX;
use yii\widgets\Pjax;
use ckarjun\owlcarousel\OwlCarouselWidget;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:200,300,400,700" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    <script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('hourtime').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    
   
    </script>
</head>
<body onload="startTime()">
<?php $this->beginBody() ?>
<div class="wrap">
    <div id="hourtime" class="showTime"></div>
    <?php
    
    //MENU HORIZONTAL LOGO E INDEX =============================================================================================
    NavBar::begin([
        'brandLabel' => 'Inicio',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-light',
        ],
    ]);
    
    
    if (Yii::$app->user->isGuest) {
			$logmodel = new \common\models\LoginForm; 
			$povcontent= Html::beginForm(['/site/login'], 'post')
						.Html::activeLabel($logmodel, 'username')
						.Html::activeInput('text', $logmodel, 'username', ["class" => "form-control"])
						.Html::activeLabel($logmodel, 'password')
						.Html::activepasswordInput($logmodel,'password',["class "=> "form-control"])
						.Html::checkbox('rememberMe', true, ['label' => 'Recordar'])
						.'<div style="color:#999;margin:1em 0">Si olvidó su contraseña, puede '
						.Html::a('restablecerla', ['site/request-password-reset'])
						.Html::submitButton('Iniciar Sesión', ['class'=>'btn btn-sm btn-primary', 'name' => 'login-button'])
						.Html::endForm()
						.'</div>';

				
			$userPopover = '<li class="dropdown"><div class="navbar-form">' . PopoverX::widget([
			'header' => 'Acceso Seguro',
			'placement' => PopoverX::ALIGN_BOTTOM_RIGHT,
			'size' => 'md',
			'content' => $povcontent,
			'toggleButton' => [
				'label' => 'Iniciar Sesión' . Html::tag('span', '', ['class' => 'glyphicon glyphicon-lock', 'style' => 'padding-left: 10px']),
				'class'=>'btn btn-lg btn-primary btn-Login'
			]
			]) . '</div></li>';

		        $menuItems[] ='<li>' . $userPopover . '</li>';
                        
			
    }else{
                    $menuItems[] =  '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Cerrar Sesión (' . Yii::$app->user->identity->usuario . ')',
                        ['class' => 'btn btn-logout']
                    )
                    . Html::endForm()
                    . '</li>';

                    if(common\components\AutoUserCp::getFirstTime( Yii::$app->user->identity->usuario) && Yii::$app->controller->action->id !== 'change-password'){
                        Yii::$app->response->redirect(array('site/change-password'));
                    }     
    }
    
    echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
    ]);
    NavBar::end();
    
    
    //FIN NAVBAR LOGO Y SESSION LOGIN =========================================================================================================//
    
    //INICIO NAVBAR LINKS MENU ================================================================================================================/
    /*$menuItems[] =  '<li><div id="hourtime" class="showTime"></div></li>';*/
    
    $menuItems=array();                     //No borrar OJO!!!!!!!!!!!!!!!!!!!!!============================================================
    $menus=array();
   
    
    $menus['0']=['label' =>'<span class="icMenuTop"><img src="images/customskin/ic_mod4.svg"/><span/> Bandeja de Entrada',
				'items' => [
							['label' => 'Formatos', 'url' => ['/gestorformatos/index','provincia'=>'','cantones'=>'','parroquias'=>'','periodos'=>'','id_fmt'=>'','estado'=>'']],
							],	
				];
    
    $menus['1']=['label' =>'<span class="icMenuTop"><img src="images/customskin/ic_mod0.svg"/><span/> Wiki',
                               'items' => [
                                       ['label' => 'Manual', 'url' => "@web/manual.php"],
                                       ],	
                               ];
    
    /*$menus['2']=['label' =>'<span class="icMenuTop"><img src="images/customskin/ic_mod3.svg"/><span/> R. Hídricos',
                                  'items' => [

                                                          ['label' => 'CDA', 'url' => ['/cda/cda/pantallaprincipal']],
                                                          ],	
                                 ];
    
    $menus['3']=['label' =>'<span class="icMenuTop"><img src="images/customskin/ic_mod6.svg"/><span/> PQRS',
                                        'items' => [

                                                ['label' => 'PQRS', 'url' => ['/pqrs/pqrs/index']],
                                                ],	
                                 ];
    
    $menus['4']=['label' =>'<span class="icMenuTop"><img src="images/customskin/ic_mod5.svg"/><span/> Administración',
				'items' => [
							['label' => 'Usuario', 'url' => ['#']],
							['label' => 'Cantones', 'url' => ['#']],
							['label' => 'Provincias', 'url' => ['#']],
							['label' => 'Demarcaciones', 'url' => ['#']],
					       ],	
                                ];*/
    
    if(empty(Yii::$app->user->isGuest) and in_array(Yii::$app->user->identity->codRols[0]->cod_rol,[28,29,27,21,30,31,32])){
        $_urlpqr = '/pqrs/pqrs/index';
    }else if(!empty(Yii::$app->user->isGuest)){
         $_urlpqr = '/pqrs/pqrs/create';
    }
    
    if(!empty($_urlpqr)){
        
    $menus['5']=['label' =>'<span class="icMenuTop"><img src="images/customskin/ic_mod6.svg"/><span/> PQRS',
                                'items' => [
                                        ['label' => 'PQRS', 'url' => [$_urlpqr]],
                                        ],	
                               ];
    }
    
    
    
    if (empty(Yii::$app->user->isGuest)){
        
        NavBar::begin([
            //'brandLabel' => 'Inicio',
            //'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default',
            ],
        ]);
        
        //Aqui va Hidricos ==============================================================
        if(in_array(Yii::$app->user->identity->codRols[0]->cod_rol,[1,2,25,26,27])){
          $menuItems = $menus;
        }else{
           unset($menus['2']);
           $menuItems = array_values($menus);
        }
        
        	
        echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItems,
        ]);
        
        NavBar::end();
    
    }
    
    

	
    //FIN MENU HORIZONTAL =================================================================================
   ?>

	
    <div class="container">
               <!-- <div class="row clearfix">
                    <div class="col-md-12 column">
                           <?php 
                           OwlCarouselWidget::begin([
                                'container' => 'div',
                                'containerOptions' => [
                                    'id' => 'my-container-id',
                                    'class' => 'my-container-class'
                                ],
                                'pluginOptions' => [
                                    'autoPlay' => 3000,
                                    'items' => 1,
                                    'itemsDesktop' => [1199,1],
                                    'itemsDesktopSmall' => [979,1]
                                ]
                            ]);
                            ?>
                            <div class="my-item-class"><p> Noticia 1: Probando texto en noticia, la noticia no debe contener mas de unos 300 caracteres</p></div>
                            <div class="my-item-class"><p> Noticia 2: Probando texto en noticia, la noticia no debe contener mas de unos 300 caracteres</p></div>
                            <div class="my-item-class"><p> Noticia 3: Probando texto en noticia, la noticia no debe contener mas de unos 300 caracteres</p></div>
                            <div class="my-item-class"><p> Noticia 4: Probando texto en noticia, la noticia no debe contener mas de unos 300 caracteres</p></div>

                            <?php    
                            OwlCarouselWidget::end();                    
                            ?>
                    </div>
                </div>-->
        
        
		<!------------------------------------------------------------------------------------------>
		<!-----------------MIGA DE PAN-------------------------------------------------------------->
		<!------------------------------------------------------------------------------------------>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                
                <?php 
                   foreach (Yii::$app->session->getAllFlashes() as $message):
                      
                       if(!empty($message['type'])){
                           if($message['type'] == 'success'){
                          
                               $this->registerJs( '$("document").ready(function(){ swal({
                                                title: "Datos Guardados con Exito",
                                                type: "warning",
                                                showCancelButton: false,
                                                closeOnConfirm: true,
                                                allowOutsideClick: true,
                                            }, function(isConfirm){
                                                    if (isConfirm) {
                                                            swal.close()
                                                    } else {

                                                              //Funciones adicionales cuando se cancela 

                                                    }
                                            }); });' ); 
                            }else if($message['type'] == 'error'){
                                
                                $this->registerJs( '$("document").ready(function(){ swal({
                                                title: "'.$message['message'].'",
                                                type: "warning",
                                                showCancelButton: false,
                                                closeOnConfirm: true,
                                                allowOutsideClick: true,
                                            }, function(isConfirm){
                                                    if (isConfirm) {
                                                            swal.close()
                                                    } else {

                                                              //Funciones adicionales cuando se cancela 

                                                    }
                                            }); });' ); 
                                
                                
                            }
                       }else{
                          Alert::widget();  
                       }
                   endforeach;
                ?>
		<!------------------------------------------------------------------------------------------>
		<!------------------------------------------------------------------------------------------>
		
		<!------------------------------------------------------------------------------------------>
		<!--ACTIVA LA VENTANA MODAL PARA LOS FORMULARIOS-------------------------------------------->
		<!------------------------------------------------------------------------------------------>
		<?php
			yii\bootstrap\Modal::begin([
            'header' =>  '',   
			'headerOptions' => ['id' => 'modalHeader'],
			'id' => 'modal',
			'size' => 'modal-lg',
            //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
			]);
			echo "<div id='modalContent'></div>";
			yii\bootstrap\Modal::end();
		?>
		<!------------------------------------------------------------------------------------------>
		<!------------------------------------------------------------------------------------------>
		
		<!--PERSONALIZACION A LA PLANTILLA PARA CONTENER MENU VERTICAL-->
		<!--@itemsmn trae los enlaces para agregar en el menu vertical-->
		<?php 
		
			if(isset($this->params['itemsmn'])){		//PRESENTACION DE PLANTILLA CON MENU VERTICAL============================
		?>
			<div class="row">
				<div class="col-xs-12 col-md-12 navOptions">
				
					<?php
						echo SideNav::widget(['items' => $this->params['itemsmn'],'type' => SideNav::TYPE_DEFAULT, 'heading' => false]);
					?>
				</div>
				<div id="content" class="col-xs-12 col-sm-12 col-md-12">
					<?= $content ?>
				</div>
			</div>
		<?php
				
			}else{									//PRESENTACION DE PLANTILLA SIN MENU VERTICAL==================================	
				
				echo $content;
				
			}
		?>
                
                
    </div>
</div>

<footer class="footer">
    <div class="container">
		<div class="row">
			<div class="col-md-6">
			<div class="brandFooter"><img src="../../frontend/web/images/customskin/logoFooter.png"></div>
			<br/><span>Rumipamba E2-128 y República  |  Quito - Ecuador  | Teléfono: 593-2 3944440</span>
			<br/><span>TODOS LOS DERECHOS RESERVADOS</span>
			</div>
			<div class="col-md-6 text-right"><img src="../../frontend/web/images/customskin/logoFooter_BID.png"></div>
		</div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

