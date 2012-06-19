<?php
$this->breadcrumbs=array(
	'Currency Rates',
);

$this->menu=array(
	array('label'=>'Create CurrencyRate', 'url'=>array('create')),
	array('label'=>'Manage CurrencyRate', 'url'=>array('admin')),
);
?>

<h1>Currency Rates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
