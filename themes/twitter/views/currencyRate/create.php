<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Курсы валют')=>array('admin'),
	Yii::t('app', 'Добавление курса'),
);
?>

<h3><?php echo Yii::t('app', 'Добавление курса валюты'); ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>