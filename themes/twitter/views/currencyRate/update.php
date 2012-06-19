<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Курсы валют') => array('admin'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Редактирование курса влюты'),
);
?>

<h3><?php echo Yii::t('app', 'Редактирование курса влюты'); ?> <?php echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>
