<?php
$this->breadcrumbs=array(
	'Currency Rates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CurrencyRate', 'url'=>array('index')),
	array('label'=>'Manage CurrencyRate', 'url'=>array('admin')),
);
?>

<h1>Create CurrencyRate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>