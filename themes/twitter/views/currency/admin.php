<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Валюты')=>array('admin'),
	Yii::t('app', 'Управление валютами'),
);
?>

<h3><?php echo Yii::t('app', 'Управление валютами'); ?></h3>

<?php $this->widget('bootstrap.widgets.BootAlert'); ?>

<?php $this->renderPartial('admingrid', array('model'=>$model)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>