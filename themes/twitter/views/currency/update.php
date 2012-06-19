<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Валюты') => array('admin'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app', 'Редактирование валюты'),
);
?>

<h3><?php echo Yii::t('app', 'Редактирование валюты'); ?> <?php echo $model->name; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>