<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    /*Se agrega un Mapa de controladores para utilizar la estructura propuesta controllers\poc\...*/
    'controllerMap' => [
        
        //Controller Map para los desarrollo que se encuentran en el proyecto base ***************************//
        'lview' => 'frontend\controllers\wiki\LviewController',
        'clientes' => 'frontend\controllers\wiki\ClientesController',
        'clientev' => 'frontend\controllers\wiki\ClientevController',
        'clientelong' => 'frontend\controllers\wiki\ClientelongController',
        'clienteexpress' => 'frontend\controllers\wiki\ClienteexpressController',
        'tipodato' => 'frontend\controllers\wiki\TipodatoController',
        'clientestring' => 'frontend\controllers\wiki\ClientestringController',
        'tipomoneda' => 'frontend\controllers\wiki\TipomonedaController',
        'tipofechas' => 'frontend\controllers\wiki\TipofechasController',
        'tiponumerico' => 'frontend\controllers\wiki\TiponumericoController',
        'decimalmask' => 'frontend\controllers\wiki\DecimalmaskController',
        'clientesprueba' => 'frontend\controllers\wiki\ClientespruebaController',
        'clientesmodal' => 'frontend\controllers\wiki\ClientesmodalController',
        'graph' => 'frontend\controllers\wiki\GraphController',
        'editor' => 'frontend\controllers\wiki\EditorController',
        'aplicativo' => 'frontend\controllers\wiki\AplicativoController',
        'aplicativonew' => 'frontend\controllers\wiki\AplicativonewController',
        'capitulos' => 'frontend\controllers\wiki\CapitulosController',
        'ciudadesp' => 'frontend\controllers\wiki\CiudadespController',
        'tabs' => 'frontend\controllers\wiki\TabsController',
        'tooltip' => 'frontend\controllers\wiki\TooltipController',
        'clientesauto' => 'frontend\controllers\wiki\ClientesautoController',
        'reloaddata' => 'frontend\controllers\wiki\ReloaddataController',
        'clientesdropdown' => 'frontend\controllers\wiki\ClientesdropdownController',
        'clientesmultiple' => 'frontend\controllers\wiki\ClientesmultipleController',
        'fileupload' => 'frontend\controllers\wiki\FileuploadController',
        'fileuploadmultiple' => 'frontend\controllers\wiki\FileuploadmultipleController',
        'proyectos' => 'frontend\controllers\wiki\ProyectosController',
        'documentopdf' => 'frontend\controllers\wiki\DocumentopdfController',
        'documentoexcel' => 'frontend\controllers\wiki\DocumentoexcelController',
        'documentoword' => 'frontend\controllers\wiki\DocumentowordController',
        
        //Controller Map apra la POC
        'fdubicacion' => 'frontend\controllers\poc\FdUbicacionController',
        'fdcoordenada' => 'frontend\controllers\poc\FdCoordenadaController',
        'fdinvolucrado' => 'frontend\controllers\poc\FdInvolucradoController',
        'fdrespuestaxmes' => 'frontend\controllers\poc\FdRespuestaxmesController',
        'fdbasicosubicacioncoordenadas' => 'frontend\controllers\poc\FdBasicosubicacioncoordenadasController',
        
        
        //Controller MAP para hidricos
        /*'modulocda' => 'frontend\controllers\hidricos\ModulocdaController',
        'detalleproceso' => 'frontend\controllers\hidricos\DetalleprocesoController',
        'pshistoricoestados' => 'frontend\controllers\hidricos\PsHistoricoEstadosController',
        'psactividadquipux' => 'frontend\controllers\hidricos\PsactividadquipuxController',
        'ps-responsablesproceso' => 'frontend\controllers\hidricos\PsResponsablesProcesoController',
        'pscactividadproceso' => 'frontend\controllers\hidricos\PscactividadprocesoController',
        'pscproceso' => 'frontend\controllers\hidricos\PscprocesoController',
        'cdasolicitudinformacion' => 'frontend\controllers\hidricos\CdasolicitudinformacionController',*/
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning','trace','info'],
                    'categories' => '*',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest'],
            ],
        ],*/
    ],
    'params' => $params,
];
