<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Клиенты') => array('admin'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Редактирование клиента'),
);
?>

<h3><?php echo Yii::t('app', 'Редактирование клиента'); ?> <?php echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>