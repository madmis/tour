<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Валюты')=>array('admin'),
	$model->name,
);
?>

<h3><?php echo Yii::t('app', 'Просмотр валюты'); ?> #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.BootDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'ISOChar',
		'ISONum',
		'base',
	),
)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>