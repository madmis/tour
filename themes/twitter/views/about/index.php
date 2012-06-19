<?php $this->pageTitle=Yii::app()->name . ' - ' . Yii::t('app', 'О программе'); ?>
<?php $this->breadcrumbs=array(Yii::t('app', 'О программе'),); ?>

<?php $this->widget('bootstrap.widgets.BootDetailView', array(
	'data'=>$data,
	'attributes'=>array(
		array('name'=>'appName', 'label'=>'Приложение'),
		'developer:html',
		array('name'=>'version', 'label'=>'Версия'),
		array('name'=>'phpversion', 'label'=>'PHP'),
		array('name'=>'driver', 'label'=>'Драйвер'),
		array('name'=>'serverDb', 'label'=>'Сервер БД'),
		array('name'=>'tableType', 'label'=>'Тип таблиц'),
		array('name'=>'time', 'label'=>'Время'),
		array('name'=>'memory', 'label'=>'Память'),
		'powered:html',
    ),
)); ?>