<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Клиенты')=>array('admin'),
	Yii::t('app', 'Добавление клиента'),
);
?>

<h3><?php echo Yii::t('app', 'Добавление клиента'); ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>