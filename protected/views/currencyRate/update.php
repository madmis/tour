<?php
$this->breadcrumbs=array(
	'Currency Rates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CurrencyRate', 'url'=>array('index')),
	array('label'=>'Create CurrencyRate', 'url'=>array('create')),
	array('label'=>'View CurrencyRate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CurrencyRate', 'url'=>array('admin')),
);
?>

<h1>Update CurrencyRate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>