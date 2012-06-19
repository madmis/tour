<?php
$this->breadcrumbs = array(
	Yii::t('app', 'Пользователи')=>array('admin'),
	Yii::t('app', 'Добавление пользователя'),
);
?>

<h3><?php echo Yii::t('app', 'Добавление пользователя') ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->renderPartial('menu', array('model'=>$model)); ?>