<?php
$this->breadcrumbs = array(
	Yii::t('app', 'Пользователи')=>array('admin'),
	$model->id => array('view', 'id'=>$model->id),
	Yii::t('app', 'Редактирование пользователя'),
);
?>

<h3><?php echo Yii::t('app', 'Изменение данных пользователя') ?> <?php echo $model->id; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->renderPartial('menu', array('model'=>$model)); ?>

