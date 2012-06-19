<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Заявки')=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Редактирование заявки'),
);
?>

<h3><?php echo Yii::t('app', 'Редактирование заявки'); ?> <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', 
		array(
			'model'=>$model,
		)
); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>