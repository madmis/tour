<?php
$this->breadcrumbs = array(
	Yii::t('app', 'Пользователи')=>array('admin'),
	$model->id,
);
?>

<h3><?php echo Yii::t('app', 'Просмотр пользователя') ?> #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.BootDetailView', array(
    'data'=>$model,
    'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
    ),
)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>