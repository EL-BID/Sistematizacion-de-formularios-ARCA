<?php
use yii\widgets\Pjax;
use yii\helpers\Html;

$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 3000);
});
JS;
$this->registerJs($script);

Pjax::begin(); 
echo Html::a("Refresh", ['reloaddata/index'], ['class' => 'btn btn-lg btn-primary', 'id' => 'refreshButton']);
?>

<h1>Current time: <?= $time ?></h1>

<?php Pjax::end(); ?>

