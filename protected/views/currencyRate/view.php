<?php
$this->breadcrumbs=array(
	'Currency Rates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CurrencyRate', 'url'=>array('index')),
	array('label'=>'Create CurrencyRate', 'url'=>array('create')),
	array('label'=>'Update CurrencyRate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CurrencyRate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CurrencyRate', 'url'=>array('admin')),
);
?>

<h1>View CurrencyRate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parentId',
		'rate',
		'currencyId',
		'unit',
		'date',
	),
)); ?>
