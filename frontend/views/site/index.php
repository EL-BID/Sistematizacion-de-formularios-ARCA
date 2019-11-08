<?php
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */

$this->title = 'POC';

?>
<?php
 echo Carousel::widget([
    'items' => [
        ['content' => '<img src="../../frontend/web/images/customskin/img3.jpg"/>'],
		['content' => '<img src="../../frontend/web/images/customskin/img2.jpg"/>'],
		['content' => '<img src="../../frontend/web/images/customskin/img1.jpg"/>'],
    ]
]);?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido</h1>

        <p class="lead">Presentamos a continuación los módulos con los que podrá planificar, desarrollar y gestionar proyectos regulatorios en multiples ejes de acción</p>

       
    </div>
 
    <div class="body-content">
		
        <div class="row">
            <div class="col-md-4">
				<div class="panel panel-custom c1">
					
					<div class="panel-heading">
						<div class="icModule"><img src="../../frontend/web/images/customskin/ic_mod1.svg"/></div>
						<h2>Agua Potable y Saneamiento </h2> 
					</div> 
				  <div class="panel-body">
					<p>Planifique y gestione proyectos regulatorios (o sus reformas) para los servicios públicos de agua potable y saneamiento suministrados por los prestadores de servicios públicos o comunitarios.</p>
				  </div>
				  
				</div>
             </div>
            <div class="col-md-4">
				<div class="panel panel-custom c2">
					<div class="panel-heading">
						<div class="icModule"><img src="../../frontend/web/images/customskin/ic_mod2.svg"/></div>
						<h2>Riego y Drenaje</h2> 
					</div>
				  <div class="panel-body">
					<p>Desarrolle proyectos de regulaciones (o sus reformas) aplicando mecanismos de control que permitan generar estudios técnicos y económicos, y normar la gestión de Riego y Drenaje a escala nacional. </p>
				  </div>
				  
				</div>
                
            </div>
            <div class="col-md-4">
				<div class="panel panel-custom c3">
					<div class="panel-heading">
						<div class="icModule"><img src="../../frontend/web/images/customskin/ic_mod3.svg"/></div>
						<h2>Recursos Hídricos </h2> 
					</div>
				  <div class="panel-body">
					<p>Consulte normas, criterios técnicos y actuariales para la fijación de tarifas, certificación, control y regulación de disponibilidad del líquido vital</p>
				  </div>
				  
				</div>
            </div>
			<!--<div class="col-md-4">
				<div class="panel panel-custom c4">
					<div class="panel-heading"> <div class="icModule"><img src="../../frontend/web/images/customskin/ic_mod6.svg"/></div>
					<h2>Gestión de PQRS</h2> 
					</div>
				  <div class="panel-body">
					<p>Para nosotros su opinión cuenta, gestione sus peticiones, quejas y reclamos con facilidad </p>
				  </div>
				  
				</div>
            </div>-->
        </div>
		
			
			
			
		</div>
    </div>
</div>
