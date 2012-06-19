<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Журнал действий пользователей')=>array('admin'),
);
?>

<h3><?php echo Yii::t('app', 'Журнал действий пользователей'); ?></h3>

<?php $this->renderPartial('admingrid', array('model'=>$model)); ?>
<?php //$this->renderPartial('viewdialog'); ?>

<?php //$this->renderPartial('menu', array('model'=>$model)); ?>
