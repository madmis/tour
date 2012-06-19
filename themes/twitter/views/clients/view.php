<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Клиенты')=>array('admin'),
	$model->id,
);
?>

<h3><?php echo Yii::t('app', 'Просмотр клиента'); ?> #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.BootDetailView', array(
    'data'=>$model,
    'attributes'=>array(
		'id',
		'fio',
		'address',
		'phone',
		'email',
		'comment',
    ),
)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>