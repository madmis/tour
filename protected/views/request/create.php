<?php
$this->breadcrumbs=array(
	'Requests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Request', 'url'=>array('index')),
	array('label'=>'Manage Request', 'url'=>array('admin')),
);
?>

<h1>Create Request</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>