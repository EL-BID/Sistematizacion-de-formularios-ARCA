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
    <?php
    
    //MENU HORIZONTAL =============================================================================================
    NavBar::begin([
        'brandLabel' => 'Inicio',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
        $menuItems = [
            ['label' => 'ARCA', 'url' => ['/site/index']],
        ];
	$menuItems[]=['label' =>'Recursos Hídricos',
				'items' => [
							['label' => 'Planes de Control', 'url' => ['#']],
							['label' => 'Autocontrol', 'url' => ['#']],
							['label' => 'CDA', 'url' => ['#']],
							['label' => 'Renovaciones', 'url' => ['#']],
							],	
				];
	$menuItems[]=['label' =>'Agua Potable',
				'items' => [
							['label' => 'Autocontrol', 'url' => ['#']],
							['label' => 'Tarifarios', 'url' => ['#']],
					    	],	
				];
	
	$menuItems[]=['label' =>'Riego',
				'items' => [
							['label' => 'Planes de Control', 'url' => ['#']],
							['label' => 'Tarifarios', 'url' => ['#']],
					    	],	
				];
				

	$menuItems[]=['label' =>'Administración',
				'items' => [
							['label' => 'Usuario', 'url' => ['#']],
							['label' => 'Cantones', 'url' => ['#']],
							['label' => 'Provincias', 'url' => ['#']],
							['label' => 'Demarcaciones', 'url' => ['#']],
					       ],	
				];
	
	if (Yii::$app->user->isGuest) {
			$logmodel = new \common\models\LoginForm; 
			$povcontent= Html::beginForm(['/site/login'], 'post')
						.Html::activeLabel($logmodel, 'username')
						.Html::activeInput('text', $logmodel, 'username', ["class" => "form-control"])
						.Html::activeLabel($logmodel, 'password')
						.Html::activepasswordInput($logmodel,'password',["class "=> "form-control"])
						.Html::checkbox('rememberMe', true, ['label' => 'Recordar'])
						.'<div style="color:#999;margin:1em 0">If you forgot your password you can'
						.Html::a('reset it', ['site/request-password-reset'])
						.Html::submitButton('Login', ['class'=>'btn btn-sm btn-primary', 'name' => 'login-button'])
						.Html::endForm()
						.'</div>';

				
			$userPopover = '<li class="dropdown"><div class="navbar-form">' . PopoverX::widget([
			'header' => 'Acceso Seguro',
			'placement' => PopoverX::ALIGN_BOTTOM_RIGHT,
			'size' => 'md',
			'content' => $povcontent,
			'toggleButton' => [
				'label' => 'Iniciar Sesión' . Html::tag('span', '', ['class' => 'glyphicon glyphicon-lock', 'style' => 'padding-left: 10px']),
				'class'=>'btn btn-default'
			]
			]) . '</div></li>';

			
			$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                        
                        $menuItems[] ='<li>' . $userPopover . '</li>';
                        $menuItems[] =  '<li><div id="hourtime"></div></li>';
                        
			
	}else{
			$menuItems[] =  '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
                        
                       $menuItems[] =  '<li><div id="hourtime"></div></li>';
                               
                              
	}
	
	
    
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
	
	//FIN MENU HORIZONTAL =================================================================================
   ?>

	
    <div class="container">
                <div class="row clearfix">
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
                </div>
        
        
		<!------------------------------------------------------------------------------------------>
		<!-----------------MIGA DE PAN-------------------------------------------------------------->
		<!------------------------------------------------------------------------------------------>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
		<!------------------------------------------------------------------------------------------>
		<!------------------------------------------------------------------------------------------>
		
		<!------------------------------------------------------------------------------------------>
		<!--ACTIVA LA VENTANA MODAL PARA LOS FORMULARIOS-------------------------------------------->
		<!------------------------------------------------------------------------------------------>
		<?php
			yii\bootstrap\Modal::begin([
			//'headerOptions' => ['id' => 'modalHeader'],
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
				<div class="col-xs-1 col-md-1">
				
					<?php
						echo SideNav::widget(['items' => $this->params['itemsmn'],'type' => SideNav::TYPE_DEFAULT, 'heading' => false]);
					?>
				</div>
				<div id="content" class="col-xs-10 col-sm-10 col-md-10">
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
        <p>My Company</p>
		<p>Rumipamba E2-128 y República</p>
		<p>Edificio Agencia de regulacion y control de agua</p>
		<p>Quito-Ecuador</p>
		<p>Teléfono: 593-2 3944440</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

