
<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Курсы валют')=>array('admin'),
	Yii::t('app', 'Управление курсами'),
);
?>

<h3><?php echo Yii::t('app', 'Управление курсами валют'); ?></h3>

<?php $this->renderPartial('admingrid', array('model'=>$model)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>