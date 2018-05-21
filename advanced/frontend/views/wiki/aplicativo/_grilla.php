<?php
    use yii\grid\GridView
?>

<?= GridView::widget([ 
    'dataProvider' => $datos,                       //Objeto de Datos 
    'layout'=>"{pager}\n{summary}\n{items}",        //Modelo de presentacion 
    'columns' => [                                  //Columnas a presentar
        ['class' => 'yii\grid\SerialColumn'],         

        'nombre_entidad', 
        'nom_formato', 
         
    ], 
    ]); ?> 

