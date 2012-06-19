<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Заявки')=>array('admin'),
	Yii::t('app', 'Добавление заявки'),
);
?>

<h3><?php echo Yii::t('app', 'Добавление заявки'); ?></h3>

<?php echo $this->renderPartial('_form', 
		array(
			'model'=>$model,
		)
); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>